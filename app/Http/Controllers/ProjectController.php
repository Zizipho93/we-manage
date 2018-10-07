<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Auth;

class ProjectController extends Controller
{
    public function newProject(){
        return view('newProject');
    }
    public function store(Request $request){
        $projectId = \DB::table('project')->insertGetId([
            'name' => $request->name,
            'description' => $request->description,
            'invitations' => $request->email_invites,
        ]);
        $user_id = Auth::user()->id;

        \DB::table('user_project')->insert([
            'user_id' => $user_id,
            'project_id' => $projectId
        ]);

        return redirect('home')->with('success','successfully created project');
    }

    public function newTasks($id){
        $project  = \DB::table('project')->select('id','name')->where('id', '=' , $id)->get();
        return view('tasksBreakDown')->with(compact('project'));
    }
}
