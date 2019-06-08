<?php

namespace App\Http\Controllers;

use App\Player;
use App\Team;
use Illuminate\Http\Request;

class SearchController extends Controller
{
    public function search($name){
        $team=Team::where('name','like','%'.$name.'%')->get();
        $player=Player::where('fname','like','%'.$name.'%')->orWhere('lname','like','%'.$name.'%')->get();

        return response()->json([
            'team'=>$team,
            'player'=>$player
        ]);
    }
}
