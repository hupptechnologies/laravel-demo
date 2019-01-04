<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request; 
use App\Http\Controllers\Controller; 
use App\User;
use Illuminate\Support\Facades\Hash; 
use Illuminate\Support\Facades\Auth; 
use Validator;
use DB;

class UserController extends Controller
{
    public $successStatus = 200;

    /**
     * Remove the session and logout.
     *
     * @return \Illuminate\Http\Response
     */
    public function logout()
    {
    	Auth::logout();
        return redirect('/');
    }
}
