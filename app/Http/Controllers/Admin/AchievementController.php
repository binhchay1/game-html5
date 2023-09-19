<?php

namespace App\Http\Controllers\Admin;

use App\Enums\Ultity;
use App\Repositories\AchievementRepository;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\StoreAchievementRequest;

class AchievementController extends Controller
{
    protected $achievementRepository;
    protected $ultity;

    public function __construct(AchievementRepository $achievementRepository, Ultity $ultity)
    {
        $this->achievementRepository = $achievementRepository;
        $this->ultity = $ultity;
    }

    public function index()
    {
        $dataAchievement = $this->achievementRepository->listAchievement();

        return view('admin.achievement.list-achievement', compact('dataAchievement'));
    }

    public function showAchievement($id)
    {
        $dataAchievement = $this->achievementRepository->showAchievement($id);

        return view('admin.achievement.show-achievement', compact('dataAchievement'));
    }

    public function create()
    {
        return view('admin.achievement.create-achievement');
    }

    public function store(StoreAchievementRequest $request)
    {
        $input = $request->all();
        if (isset($input['icon'])) {
            $img = $this->ultity->saveImageIconAchievement($input);
            if ($img) {
                $path = 'images/achievement/icon/' . $input['icon']->getClientOriginalName();
                $input['icon'] = $path;
            }
        }
        $result = $this->achievementRepository->create($input);

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

        return view('admin.achievement.edit-achievement', compact('dataAchievement'));
    }

    public function update(StoreAchievementRequest $request, $id)
    {
        $input = $request->except(['_token']);
        if (isset($input['icon'])) {
            $img = $this->ultity->saveImageIconAchievement($input);
            if ($img) {
                $path = 'images/achievement/icon/' . $input['icon']->getClientOriginalName();
                $input['icon'] = $path;
            }
        }
        $result = $this->achievementRepository->updateById($id, $input);

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

        if ($statusDelFile == 1 and $statusDelDB) {
            $alert = 'Successfully to delete!';
        } else {
            $alert = 'Failed to delete!';
        }

        return redirect('list-achievement')->with('alert', $alert);
    }

    public function formerSlug(Request $request)
    {
        $slug = $request->get('slug');
        $type = $request->get('type');

        if (empty($slug) or empty($type)) {
            abort(404);
        }

        if ($type == 'create') {
            $query = $this->achievementRepository->getBySlug($slug);

            if (empty($query)) {
                $status = true;
            } else {
                $status = false;
            }
        } else {
            $idSlug = $request->get('id');
            $getSlugById = $this->achievementRepository->getById($idSlug);

            if ($getSlugById->slug == $slug) {
                $status = true;
            } else {
                $query = $this->achievementRepository->getBySlug($slug);
                if (empty($query)) {
                    $status = true;
                } else {
                    $status = false;
                }
            }
        }

        return $status;
    }
}
