<?php

namespace App\Http\Controllers\Admin;

use App\Enums\IconGame;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Repositories\SearchRepository;
use App\Repositories\TagRepository;
use App\Services\Chart;

class AdminController extends Controller
{
    private $chart;
    private $iconGame;
    private $searchRepository;
    private $tagRepository;

    public function __construct(Chart $chart, IconGame $iconGame, SearchRepository $searchRepository, TagRepository $tagRepository)
    {
        $this->chart = $chart;
        $this->iconGame = $iconGame;
        $this->searchRepository = $searchRepository;
        $this->tagRepository = $tagRepository;
    }

    public function index()
    {
        return view('admin.homepage');
    }

    public function getChartCountPlay(Request $request)
    {
        if (!empty($request->get('type'))) {
            $type = $request->get('type');
        }

        $chartCountPlay = (object) $this->chart->renderChartCountPlayers($type);

        return $chartCountPlay;
    }

    public function getChartUserRegister(Request $request)
    {
        if (!empty($request->get('type'))) {
            $type = $request->get('type');
        }

        $chartCountUser = (object) $this->chart->renderChartCountUser($type);

        return $chartCountUser;
    }

    public function listSearch()
    {
        $listSearch = $this->searchRepository->get();

        return view('admin.search.list-search', compact('listSearch'));
    }

    public function createSearch(Request $request)
    {
        $keyword = $request->get('keyword');
        $locale = $request->get('locale');
        $status = $request->get('status');

        if (empty($keyword) or empty($locale)) {
            abort(404);
        }

        $isExist = $this->searchRepository->getKeywordWithLocale($keyword, $locale);

        if (!empty($isExist)) {
            return redirect()->route('search.index')->with('alert', 'Keyword already exists on this locale.');
        } else {
            $data = [
                'keyword' => $keyword,
                'locale' => $locale,
                'status' => $status,
            ];

            $this->searchRepository->create($data);

            return redirect()->route('search.index')->with('alert', 'Keyword added successfully.');
        }
    }

    public function editSearch($id)
    {
        $search_id = $id;
        $search = $this->searchRepository->getById($search_id);
        $data = [];

        if (empty($search)) {
            abort(404);
        }

        if ($search['status'] == 1) {
            $data['status'] = 0;
        } else {
            $data['status'] = 1;
        }

        $this->searchRepository->updateStatus($id, $data);

        return redirect()->route('search.index')->with('alert', 'Updated search status successfully.');
    }

    public function listTag()
    {
        $listTag = $this->tagRepository->get();

        return view('admin.tag.list-tag', compact('listTag'));
    }

    public function editTag($id)
    {
        $tag_id = $id;
        $tag = $this->tagRepository->getById($tag_id);
        $data = [];

        if (empty($tag)) {
            abort(404);
        }

        if ($tag['status'] == 1) {
            $data['status'] = 0;
        } else {
            $data['status'] = 1;
        }

        $this->tagRepository->updateStatus($id, $data);

        return redirect()->route('tag.index')->with('alert', 'Updated tag status successfully.');
    }
}
