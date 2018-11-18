<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\Project;
class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (Auth::user()->hasRole('Admin')){
            $user_id = Auth::user()->id;
            $projects = Project::select('project.id','project.name','project.description')
                ->join('user_project', 'user_project.project_id' ,'=', 'project.id')
                ->join('users', 'users.id' ,'=', 'user_project.user_id')
                ->where('users.id', '=' , $user_id)->get()->toArray();

            return view('home')->with(compact('projects'));
        }
        else{
            $projects = Project::select('project.id','project.name','project.description')
                ->join('project_invitation', 'project_invitation.project_id' , 'project.id')->get()->toArray();
            return view('home')->with(compact('projects'));
        }

    }
}
