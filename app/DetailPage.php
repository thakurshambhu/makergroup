<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class DetailPage extends Model
{
		use SoftDeletes;
    	protected $table = 'detail_pages';

	// protected $fillable = [
 //        'title', 'description','status'
 //    ];

    protected $guarded = [
        
    ];
}
