<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Team;

class Player extends Model
{
    protected $fillable = ['team_id','fname','lname'];

    public function team()
    {
        return $this->belongsTo(Team::class);
    }
}
