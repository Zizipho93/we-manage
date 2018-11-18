<?php

namespace App\Http\Controllers;
use App\Http\Requests\NewProject;
use App\Http\Requests\TaskRequest;
use App\Project;
use App\User;
use Illuminate\Http\Request;
use Auth;
use Mail;
use App\Http\Controllers\Auth\RegisterController;

class ProjectController extends Controller
{
    protected $email = '';

    public function newProject(){
        return view('newProject');
    }
    public function store(NewProject $request){
        $comaSeparatedMails  = '';
        foreach ($request->project as $invite){
            $comaSeparatedMails .= $invite['email_invites'] . ', ';
        }
        $comaSeparatedMails = substr($comaSeparatedMails, 0, -2);
        $projectId = \DB::table('project')->insertGetId([
            'name' => $request->project[0]['name'],
            'description' => $request->project[0]['description'],
            'invitations' => $comaSeparatedMails,
        ]);

        foreach ($request->project as $record){
            $this->build($projectId,$record['email_name'],$record['email_invites']);
        }

        $user_id = Auth::user()->id;

        \DB::table('user_project')->insert([
            'user_id' => $user_id,
            'project_id' => $projectId
        ]);

        return redirect('home')->with('success','successfully created project');
    }

    public function changeTaskStatus($id){
        \DB::table('task')->where('id',$id)->update([
            'status' => 1
        ]);
        return 'successfully updated';
    }

    public function getAllTasks($id)
    {
        $tasks  = \DB::table('task')->select('task.id','users.name','task_name','start_date','due_date')
            ->join('users', 'users.id', 'task.user_id')
            ->where('project_id', '=' , $id)
            ->where('status', '=' , 0)->get()->toArray();

        $completedtasks  = \DB::table('task')->select('users.name','task_name','start_date','due_date')
            ->join('users', 'users.id', 'task.user_id')
            ->where('project_id', '=' , $id)
            ->where('status', '=' , 1)->get()->toArray();
        return array([$tasks,$completedtasks]);
    }

    public function newTasks($id){
        $tasks  = \DB::table('task')->select('task.id','users.name','task_name','start_date','due_date')
            ->join('users', 'users.id', 'task.user_id')
            ->where('project_id', '=' , $id)
            ->where('status', '=' , 0)->get();

        $completedtasks  = \DB::table('task')->select('users.name','task_name','start_date','due_date')
            ->join('users', 'users.id', 'task.user_id')
            ->where('project_id', '=' , $id)
            ->where('status', '=' , 1)->get();

        $invites = \DB::table('project_invitation')->select('users.id','users.name','project.id as project_id')
                ->join('users','users.id', 'project_invitation.user_id')
                ->join('project', 'project.id', 'project_invitation.project_id')
                ->where('project_invitation.project_id', $id)
                ->get();

        $invites = json_encode($invites);
        $tasks = json_encode($tasks);
        $completedtasks = json_encode($completedtasks);

        return view('tasksBreakDown')->with(compact('invites')
        ) ->with(compact('tasks'))
            ->with(compact('completedtasks'));
    }

    public function build($projectId,$name,$email)
    {

            $ap_url = route('invites',[$name,$email,$projectId]);

            $this->email = $email;

            Mail::send('invites', ['data' => $ap_url], function ($message) {
                $message->to($this->email);
            });

    }

    public function visitors($name,$email,$projectId){
        $data['name'] = $name;
        $data['email']= $email;
        $data['project_id'] = $projectId;
        $data['invite'] = true;
        $data['password'] = 'secret';


        // find if emailalready exists if exists redirect to login page
        $registered = $this->isUserRegistered($email);

        if($registered == true){
            return redirect('home');
        }
        else{
            $visitor = new RegisterController();
            $user = $visitor->createVisitors($data);
            Auth::login($user);

            $this->projectInvite($email,$projectId,Auth::user()->id);
            return redirect('home');
        }
    }
    public function projectInvite($email,$projectId,$userId){
        \DB::table('project_invitation')->insert([
            'project_id'=> $projectId,
            'user_email' =>$email,
            'user_id' => $userId
        ]);
    }

    public function delete($projectId)
    {
        $project = Project::find($projectId);
        $project->delete();
        return redirect('home')->with('success','successfully deleted project');
    }
    public function allusers(){
        $user = User::all();
        return view('admin',['users'=> $user]);
    }
    public function storeTask(TaskRequest $request){
        \DB::table('task')->insert([
            'task_name' => $request['task_name'],
            'start_date' =>$request['start_date'] ,
            'due_date' => $request['end_date'],
            'user_id'   =>$request['user_id'],
            'project_id' => $request['project_id'],
            'status' => 0
        ]);
        return 'successfully inserted';
    }

    public function hasAdminPower(){
        if(Auth::user()->hasRole('Admin'))
            return 'true';
        else
            return 'false';
    }
}
