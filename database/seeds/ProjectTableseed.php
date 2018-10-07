<?php

use Illuminate\Database\Seeder;

class ProjectTableseed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $project  = new \App\Project();
        $project->name = 'first on';
        $project->invitations = 'tgas@gmail.com.za';
        $project->save();


    }
}
