<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function __construct(Request $request){
        $this->request = $request;
    }


    public function showDashboard(){
    	return view('dashboard');
    }
}
