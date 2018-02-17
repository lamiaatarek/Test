<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Mail;
use App\Mail\sendmail;
class mailcontroller extends Controller
{
    function send(){

    	 Mail::send(new sendmail());
    /*	Mail::send(['text'=>'mail'],['name','lamia'],function($message){

    		$message->to('lolohadidi999@gmail.com',' To lolo')->subject('test email');
    		$message->from('lolohadidi999@gmail.com','lamia');
    	});*/
    }
   /* function mid(){
    	return view('welcome');
    }
     function midd(){
    	return view('about');
    }*/

   
}
