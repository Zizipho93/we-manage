<?php

namespace App\Http\Controllers;
use App\Project;
use Illuminate\Http\Request;
use Auth;
use Mail;
use App\Http\Controllers\Auth\RegisterController;

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
        //$this->sendEmailInvites($request->toArray(),$projectId);
        $this->build($projectId);
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

    public function build($projectId)
    {

        $ap_url = route('invites',['tera','tembinkosi@gmail.com',$projectId]);
//        $data['url'] = $ap_url;
//        $data['name'] = 'tera fumba';
//        $data['email'] = 'mazishna@gmail.com';

        Mail::send('invites', ['data' => $ap_url], function ($message) {
            $message->to('thembinkosi@sacap.edu.za');
        });
    }
    public function visitors($name,$email,$projectId){
        $data['name'] = 'Amazing';
        $data['email']= 'thembinkosi@sacap.edu.za';
        $data['project_id'] = $projectId;
        $data['invite'] = true;
        $data['password'] = 'secret';
        $visitor = new RegisterController();
        $user = $visitor->createVisitors($data);
        Auth::login($user);
        return redirect('home');
    }

    public function delete($projectId)
    {
        $project = Project::find($projectId);
        $project->delete();
        return redirect('home')->with('success','successfully deleted project');
    }
}
