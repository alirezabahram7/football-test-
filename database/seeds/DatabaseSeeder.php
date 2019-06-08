<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $teams = factory('App\Team', 4000)->create();
        $teams->each(function ($team) {
            factory('App\Player', 11)->create(['team_id' => $team->id]);
        });
    }
}
