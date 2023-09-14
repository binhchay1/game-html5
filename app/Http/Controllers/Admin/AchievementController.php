<?php

namespace App\Http\Controllers\Admin;

use App\Repositories\AchievementRepository;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AchievementController extends Controller
{
    protected $achievementRepository;
    protected $gameRepository;

    public function __construct(AchievementRepository $achievementRepository, GameRepository $gameRepository)
    {
        $this->achievementRepository = $achievementRepository;
        $this->gameRepository = $gameRepository;
    }

    public function index()
    {
        $dataAchievement = $this->achievementRepository->listAchievement();

        return view('admin.achievement.list-achievement', compact('dataAchievement'));
    }

    public function showComment($id)
    {
        $dataAchievement = $this->achievementRepository->showAchievement($id);

        return view('admin.achievement.show-achievement', compact('dataAchievement'));
    }

    public function create()
    {
        return view('admin.achievement.create-achievement');
    }

    public function store(StoreCategoryRequest $request)
    {
        $input = $request->all();
        $result = $this->achievementRepository->store($input);

        if ($result) {
            $alert = 'Successfully to store!';
        } else {
            $alert = 'Failed to store!';
        }

        return redirect('list-achievement')->with('alert', $alert);
    }

    public function edit($id)
    {
        $dataAchievement = $this->achievementRepository->showAchievement($id);

        if ($dataAchievement) {
            $alert = 'Successfully to edit!';
        } else {
            $alert = 'Failed to edit!';
        }

        return view('admin.achievement.edit-achievement', ['dataAchievement' => $dataAchievement])->with('alert', $alert);
    }

    public function update(StoreCategoryRequest $request, $id)
    {
        $input = $request->except(['_token']);
        $result = $this->achievementRepository->update($input, $id);

        if ($result) {
            $alert = 'Successfully to edit!';
        } else {
            $alert = 'Failed to edit!';
        }

        return redirect('list-achievement')->with('alert', $alert);
    }

    public function delete(Request $request)
    {
        $idAchievement = $request->get('id-achievement');
        $statusDelDB = $this->gameRepository->deleteById($idAchievement);

        if ($statusDelDB) {
            $alert = 'Successfully to delete!';
        } else {
            $alert = 'Failed to delete!';
        }

        return redirect('list-achievement')->with('alert', $alert);
    }
}
