<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Repositories\GameRepository;
use Illuminate\Http\Request;

class GameController extends Controller
{
    protected $gameRepository;
    public function __construct
    (
       GameRepository $gameRepository
    )
    {
        $this->gameRepository = $gameRepository;
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $dataGame = $this->gameRepository->listGame();
        return view('page.admin.game.list-game', ['dataGame'=> $dataGame]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
