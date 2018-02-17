<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Storage;
use App\post;
use DB;
class postsController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth',['except'=>['index','show']]);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response

     */
    public function index()
    {   
       $posts= post::all();
      // $posts=DB::select('select * from posts');
       // return post::where('title','commerce')->get();
       // $posts=post::orderBy('title','desc')->paginate(1);
        return view('posts.index')->with('posts',$posts);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('posts.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $this->validate($request,[
           'title'=>'required',
           'content'=>'required',
           'img'=>'image|nullable|max:1999'
            ]);
        //بتتأكد ان اليوزر ضغط على الupload ولا لا
       if($request->hasFile('img')){

        $filenamewithextension=$request->file('img')->getClientOriginalName();
        //getfilename
       $filename=pathinfo( $filenamewithextension,PATHINFO_FILENAME);
        //getextension
       $getextension=$request->file('img')->getClientOriginalExtension();
       $filenamedefaullt=  $filename.'_' .time().'.'. $getextension;
       $path=$request->file('img')->storeAs('public/images', $filenamedefaullt);
       }
       else{
        $filenamedefaullt='noimage.jpg';
       }
     
        $post=new post;
        $post->title=$request->input('title');
         $post->content=$request->input('content');
         $post->user_id=auth()->user()->id;
         $post->img=$filenamedefaullt;
          $post->save();
        
         return redirect('/posts')->with('success','post created');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
       $post = post::find($id);
       return view('posts.show',compact('post'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $post=post::find($id);
        if(auth()->user()->id !== $post->user_id ){
           return redirect('/posts')->with('error','unauthorized page');
         }
        return view('posts.edit')->with('post',$post);
        
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        $this->validate($request,[
          'title'=>'required',
          'content'=>'required'
            ]);
            
       if($request->hasFile('img')){

        $filenamewithextension=$request->file('img')->getClientOriginalName();
        //getfilename
       $filename=pathinfo( $filenamewithextension,PATHINFO_FILENAME);
        //getextension
       $getextension=$request->file('img')->getClientOriginalExtension();
       $filenamedefaullt=  $filename.'_' .time().'.'. $getextension;
       $path=$request->file('img')->storeAs('public/images', $filenamedefaullt);
       }
         
        $post=post::find($id);
        $post->title=$request->input('title');
        $post->content=$request->input('content');
         if($request->hasFile('img')){
            $post->img= $filenamedefaullt;
         }
        $post->save();
        return redirect('posts')->with('success','post updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        
        $post=post::find($id);
        if(auth()->user()->id !== $post->user_id ){
           return redirect('/posts')->with('error','unauthorized page');
         }
         if($post->img != 'noimage.jpg'){
        storage::delete('public/images/'.$post->img);
         }
        $post->delete();
        return redirect('posts')->with('success','post deleted');
    }
}
