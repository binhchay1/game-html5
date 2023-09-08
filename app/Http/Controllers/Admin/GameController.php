<?php

namespace App\Http\Controllers\Admin;

use App\Enums\Ultity;
use App\Http\Requests\GameRequest;
use App\Repositories\CategoryRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Repositories\GameCollectionRepository;
use App\Repositories\GameRepository;
use App\Repositories\SubscribleRepository;
use App\Repositories\VoteByUserRepository;
use App\Repositories\VoteRepository;
use Illuminate\Support\Facades\Auth;
use App\Services\SendMail;

class GameController extends Controller
{
    protected $gameRepository;
    protected $voteRepository;
    protected $voteByUserRepository;
    protected $categoryRepository;
    protected $gameCollectionRepository;
    protected $ultity;
    protected $subscribleRepository;
    protected $sendMail;

    public function __construct(
        GameRepository $gameRepository,
        VoteRepository $voteRepository,
        VoteByUserRepository $voteByUserRepository,
        CategoryRepository $categoryRepository,
        GameCollectionRepository $gameCollectionRepository,
        Ultity $ultity,
        SubscribleRepository $subscribleRepository,
        SendMail $sendMail
    ) {
        $this->gameRepository = $gameRepository;
        $this->voteRepository = $voteRepository;
        $this->voteByUserRepository = $voteByUserRepository;
        $this->categoryRepository = $categoryRepository;
        $this->gameCollectionRepository = $gameCollectionRepository;
        $this->ultity = $ultity;
        $this->subscribleRepository = $subscribleRepository;
        $this->sendMail = $sendMail;
    }

    public function index()
    {
        $dataGame = $this->gameRepository->listGame();

        foreach ($dataGame as $game) {
            $tags = json_decode($game['tag']);
            if (!empty($tags)) {
                $game['tag'] = implode(', ', $tags);
            }
        }

        return view('admin.game.list-game', ['dataGame' => $dataGame]);
    }

    public function voteByUser(Request $request)
    {
        $vote = $request->get('vote');

        if ($vote != 'like' and $vote != 'unlike') {
            return '-1';
        }

        $gameName = $request->get('gameName');
        $getVote = $this->voteRepository->getVoteByGame($gameName);
        $getGame = $this->gameRepository->getGameByName($gameName);

        if (empty($getGame)) {
            return '-1';
        }

        $checkVoteByUser = $this->voteByUserRepository->getVoteByUserAndGame($getGame->id, Auth::user()->id);
        if (empty($checkVoteByUser)) {
            $dataVoteByUser = [
                'users_id' => Auth::user()->id,
                'games_id' => $getGame->id,
                'status' => 0
            ];

            if ($vote == 'like') {
                $dataVote = [
                    'like' => ($getVote['like'] + 1),
                ];

                $dataVoteByUser['status'] = 1;
            }

            if ($vote == 'unlike') {
                $dataVote = [
                    'un_like' => ($getVote['un_like'] + 1),
                ];

                $dataVoteByUser['status'] = 0;
            }

            $this->voteRepository->updateByGame($gameName, $dataVote);
            $this->voteByUserRepository->create($dataVoteByUser);
        } else {
            if ($vote == 'like') {
                $dataVote = [
                    'like' => ($getVote['like'] + 1),
                    'un_like' => ($getVote['un_like'] - 1)
                ];

                $dataVoteByUser['status'] = 1;
            }

            if ($vote == 'unlike') {
                $dataVote = [
                    'like' => ($getVote['like'] - 1),
                    'un_like' => ($getVote['un_like'] + 1)
                ];

                $dataVoteByUser['status'] = 0;
            }

            $this->voteByUserRepository->updateByUser(Auth::user()->id, $getGame->id, $dataVoteByUser);
        }

        return $vote;
    }

    public function showGame($id)
    {
        $dataGame = $this->gameRepository->showGame($id);
        return view('admin.game.show-game', ['dataGame' => $dataGame]);
    }

    public function create()
    {
        $status = config('game.status');
        $dataCategory = $this->categoryRepository->listCategory();
        if ($dataCategory) {
            $alert = 'Successfully created';
        } else {
            $alert = 'Failed to create';
        }

        return view('admin.game.create-game', ['dataCategory' => $dataCategory, 'status' => $status])->with('alert', $alert);
    }

    public function store(GameRequest $request)
    {
        $input = $request->all();
        $getGame = $this->gameRepository->getGameByName($input['name']);
        if ($getGame) {
            $alert = 'Failed! Game exist.';

            return redirect()->route('game.index')->with('alert', $alert);
        }

        $data = [
            'name' => $input['name'],
            'category' => $input['category'],
            'tag' => $input['tag'],
            'count_play' => $input['count_play'],
            'color' => $input['color'],
            'text_color' => $input['text_color'],
            'author' => array_key_exists('author', $input) ? $input['author'] : 'unknown',
            'status' => 1
        ];

        if (array_key_exists('thumbs', $input)) {
            $path = $input['thumbs']->getClientOriginalName();
            $url = $this->ultity->saveImageGame($path, file_get_contents($input['thumbs']), 'thumb');
            $data['thumbs'] = $url;
        }

        if (array_key_exists('icon', $input)) {
            $path = $input['icon']->getClientOriginalName();
            $url = $this->ultity->saveImageGame($path, file_get_contents($input['icon']), 'icon');
            $data['icon'] = $url;
        }

        if (array_key_exists('background', $input)) {
            $path = $input['background']->getClientOriginalName();
            $url = $this->ultity->saveImageGame($path, file_get_contents($input['background']), 'background');
            $data['background'] = $url;
        }

        if ($request->hasFile('source')) {
            $data['source'] = $input['source'];
        }

        $result = $this->ultity->storeGame($data);

        if ($result['status']) {
            $data['link'] = $result['index'];
            $queryResult = $this->gameRepository->store($data);
            if ($queryResult) {
                $alert = 'Successfully stored';
            } else {
                $alert = 'Failed to store';
            }
        } else {
            $alert = 'Failed to store';
        }

        $subscrible = $this->subscribleRepository->getSubscribleWithStatus();
        $type = 'new-game';
        $dataSendMail = [
            'game_name' => $data['name'],
            'link' => $data['link'],
        ];

        if (!empty($data['author'])) {
            $dataSendMail['author'] = $data['author'];
        }

        if (!empty($data['thumbs'])) {
            $dataSendMail['game_thumb'] = $data['thumbs'];
        }

        foreach ($subscrible as $email) {
            $this->sendMail->send($email['email'], $type);
        }

        return redirect()->route('game.index')->with('alert', $alert);
    }

    public function edit($id)
    {
        $status = config('game.status');
        $dataGame = $this->gameRepository->showGame($id);
        $dataCategory = $this->categoryRepository->listCategory();
        if ($dataGame and $dataCategory) {
            $alert = 'Successfully';
        } else {
            $alert = 'Failed to edit';
        }

        return view('admin.game.edit-game', [
            'dataGame' => $dataGame,
            'dataCategory' => $dataCategory,
            'status' => $status
        ])->with('alert', $alert);
    }

    public function update(GameRequest $request, $id)
    {
        $input = $request->except(['_token']);

        if (array_key_exists('thumbs', $input)) {
            $path = $input['thumbs']->getClientOriginalName();
            $url = $this->ultity->saveImageGame($path, file_get_contents($input['thumbs']), 'thumb');
            $input['thumbs'] = $url;
        }

        if (array_key_exists('icon', $input)) {
            $path = $input['icon']->getClientOriginalName();
            $url = $this->ultity->saveImageGame($path, file_get_contents($input['icon']), 'icon');
            $input['icon'] = $url;
        }

        if (array_key_exists('background', $input)) {
            $path = $input['background']->getClientOriginalName();
            $url = $this->ultity->saveImageGame($path, file_get_contents($input['background']), 'background');
            $input['background'] = $url;
        }

        $result = $this->gameRepository->update($input, $id);
        if ($result) {
            $alert = 'Successfully updated';
        } else {
            $alert = 'Failed to update';
        }

        return redirect()->route('game.index')->with('alert', $alert);
    }

    public function delete(Request $request)
    {
        $idGame = $request->get('id-game');
        $game = $this->gameRepository->getById($idGame);

        if (!empty($game['icon'])) {
            $pathIcon = public_path() . $game['icon'];
            if (file_exists($pathIcon)) {
                unlink($pathIcon);
            }
        }

        if (!empty($game['background'])) {
            $pathBackground = public_path() . $game['background'];
            if (file_exists($pathBackground)) {
                unlink($pathBackground);
            }
        }

        if (!empty($game['thumbs'])) {
            $pathThumb = public_path() . $game['thumbs'];
            if (file_exists($pathThumb)) {
                unlink($pathThumb);
            }
        }

        $this->gameRepository->deleteById($idGame);

        return redirect()->route('game.index')->with('alert', 'Delete successfully!');
    }

    public function saveCollection(Request $request)
    {
        if (!empty($request->get('gameName'))) {
            $gameName = $request->get('gameName');

            $checkGame = $this->gameCollectionRepository->getByGameNameAndUserId($gameName, Auth::user()->id);
            $data = [
                'game_name' => $gameName,
                'users_id' => Auth::user()->id
            ];

            if (empty($checkGame)) {
                $this->gameCollectionRepository->create($data);
            }

            return 'success';
        }

        return '-1';
    }
}
