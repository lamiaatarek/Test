@extends('layouts.app')
@section('content')
<h1>Edit Post</h1>
{!! Form::open(['action'=>['postsController@update',$post->id],'method'=>'post','enctype'=>'multipart/form-data']) !!}
   
    <div class="form-group">
    	{{Form::label('title', 'Title')}}
    	{{Form::text('title', '',['class' => 'form-control'])}}
    </div>
    <div class="form-group">
    	{{Form::label('content', 'Content')}}
    	{{Form::textarea('content', '',['class' => 'form-control'])}}
    </div>
     <div class="form-group">
        {{Form::file('img')}}
    </div>
    {{Form::hidden('_method','PUT')}}
    {{Form::submit('edit', ['class' => 'btn btn-primary'])}}
{!! Form::close() !!}

@endsection