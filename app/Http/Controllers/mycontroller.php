<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class mycontroller extends Controller
{
    public function index(){
        $title='welcome to laravel';
        return view('pages.index',compact('title'));
    }
    public function services(){
         $data=array(
        'title'=>'services',
       'services'=>['webdesign','programming','seo'] );
        return view('pages.services')->with($data);
    }
    public function about(){
          $title='welcome to about';
        return view('about')->with('title',$title);
    }
}
