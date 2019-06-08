<?php

namespace App\Http\Controllers;

use App\Team;
use App\Player;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\Request;

/**
 * Class TeamController
 * @package App\Http\Controllers
 */
class TeamController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $teams = Team::all();
        return response($teams, 201);
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Team::create($request);
        return response('team stored', 201);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Team $team
     * @return \Illuminate\Http\Response
     */
    public function show(Team $team)
    {
        if (!$team) {
            throw new ModelNotFoundException();
        }
        return response($team->with('players'), 201);
    }


    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param Team $team
     */
    public function update(Request $request, Team $team)
    {
        if (!$team) {
            throw new ModelNotFoundException();
        }
        $team->update($request);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Team $team
     * @return \Illuminate\Contracts\Routing\ResponseFactory|\Illuminate\Http\Response
     * @throws \Exception
     */
    public function destroy(Team $team)
    {
        if (!$team) {
            throw new ModelNotFoundException();
        }
        $team->delete();
        return response('deleted', 204);
    }
}
