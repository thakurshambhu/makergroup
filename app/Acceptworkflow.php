<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Acceptworkflow extends Model
{
    protected $table = "accepted_workflow";
    protected $fillable = ['id','user_added_by','user_id','workflow_id','email','registration_status','readaccess','writeaccess'];

    public function workflow_user()
    {
        return $this->belongsTo('App\User','user_id','id');
    }
}
