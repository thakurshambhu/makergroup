<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Workflow extends Model
{
   	protected $table = "workflow";
    protected $fillable = ['id','user_id','name'];


    public function workflow_user()
    {
        return $this->belongsTo('App\User','user_id','id');
    }

}
