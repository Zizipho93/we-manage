<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    protected $table = 'project';
    protected $fillable = ['name', 'description', 'invitations'];

    public function users(){
        return $this->belongsToMany('App\User','user','project_id','user_id');
    }
}
