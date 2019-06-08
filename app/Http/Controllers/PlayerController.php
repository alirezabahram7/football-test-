<?php

namespace App\Http\Controllers;

use App\Player;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\Request;

class PlayerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $players = Player::all();
        return response($players, 201);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Player::create($request);
        return response('player stored', 201);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Player $player
     * @return \Illuminate\Http\Response
     */
    public function show(Player $player)
    {
        if (!$player) {
            throw new ModelNotFoundException();
        }
        return response($player, 201);
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  \App\Player $player
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Player $player)
    {
        if (!$player) {
            throw new ModelNotFoundException();
        }
        $player->update($request);
        return response('player updated', 201);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Player $player
     * @return \Illuminate\Contracts\Routing\ResponseFactory|\Illuminate\Http\Response
     * @throws \Exception
     */
    public function destroy(Player $player)
    {
        if (!$player) {
            throw new ModelNotFoundException();
        }
        $player->delete();
        return response('deleted', 204);
    }
}
