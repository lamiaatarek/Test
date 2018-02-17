@extends('layouts.app')
@section('content')
<h1>Create Post</h1>
{!! Form::open(['action'=>'postsController@store','method'=>'post','enctype'=>'multipart/form-data']) !!}
   
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

    {{Form::submit('submit', ['class' => 'btn btn-primary'])}}
{!! Form::close() !!}

@endsection


