<?php

namespace App\Http\Controllers;

use App\Project;
use App\User;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function isUserRegistered($email){
        $found = User::select()->where('email' , $email)->get()->toArray();
        if (!empty($found))
            return true;
        else
            return false;
    }
}
