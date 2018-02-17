<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use  App\User;

class paginationcontroller extends Controller
{
    //
    function pag(){
      $users=User::find(12);
    	return view('pagination',compact('users'));
    }
}
