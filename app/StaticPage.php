<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class StaticPage extends Model
{
	protected $table = 'home_page_content';

	// protected $fillable = [
 //        'title', 'description','status'
 //    ];

    protected $guarded = [
        
    ];
}
