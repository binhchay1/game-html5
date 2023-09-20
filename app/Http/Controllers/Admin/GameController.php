<?php

namespace App\Http\Controllers\Admin;

use App\Enums\Ultity;
use App\Services\SendMail;
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
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;

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
        $status = config('game.status');
        $dataCategory = $this->categoryRepository->listCategory();
        $getGame = $this->gameRepository->get();
        $sourceGame = Storage::disk('public-source-game')->allFiles($dataGame['name']);
        $listTag = [];

        foreach ($getGame as $record) {
            $arrTags = json_decode($record->tag);
            foreach ($arrTags as $tag) {
                if (!in_array($tag, $listTag)) {
                    $listTag[] = $tag;
                }
            }
        }

        return view('admin.game.show-game', compact('dataGame', 'dataCategory', 'status', 'listTag', 'sourceGame'));
    }

    public function create()
    {
        $status = config('game.status');
        $dataCategory = $this->categoryRepository->listCategory();
        $getGame = $this->gameRepository->get();
        $listTag = [];

        foreach ($getGame as $record) {
            $arrTags = json_decode($record->tag);
            foreach ($arrTags as $tag) {
                if (!in_array($tag, $listTag)) {
                    $listTag[] = $tag;
                }
            }
        }

        return view('admin.game.create-game', compact('dataCategory', 'status', 'listTag'));
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
            'tag' => json_encode($input['tag']),
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
                $alert = 'Successfully to store!';
            } else {
                $alert = 'Failed to store!';
            }
        } else {
            $alert = 'Failed to store!';
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
        $getGame = $this->gameRepository->get();
        $listTag = [];
        $gameName = '8-pool-balls';
        $sourceGame = Storage::disk('public-source-game')->allFiles($gameName);

        foreach ($getGame as $record) {
            $arrTags = json_decode($record->tag);
            foreach ($arrTags as $tag) {
                if (!in_array($tag, $listTag)) {
                    $listTag[] = $tag;
                }
            }
        }

        return view('admin.game.edit-game', compact('dataGame', 'dataCategory', 'status', 'listTag', 'sourceGame'));
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
            $alert = 'Successfully to update!';
        } else {
            $alert = 'Failed to update!';
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

        $pathGame = public_path()  . '/source-game//' . $game['name'];

        $statusDelFile = File::deleteDirectory($pathGame);
        $statusDelDB = $this->gameRepository->deleteById($idGame);

        if ($statusDelFile == 1 and $statusDelDB) {
            $alert = 'Successfully to delete!';
        } else {
            $alert = 'Failed to delete!';
        }

        return redirect()->route('game.index')->with('alert', $alert);
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
