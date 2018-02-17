@extends('layouts.app')
@section('content')


<div class="well">
<h1>{{$post->title}}</h1>
<small>written on{{$post->created_at}}</small>
<p>{{$post->content}}</p>
</div>
<div>
	<img src="/storage/images/{{$post->img}}" width="300" height="300">
</div>
<a class="btn btn-primary btn-lg" href="/posts" role="button">Go Back </a>
@if(!Auth::guest())
@if(Auth::user()->id == $post->user_id)
<a class="btn btn-primary btn-lg" href="/posts/{{$post->id}}/edit" role="button">Edit </a>
{!! Form::open(['action'=>['postsController@destroy',$post->id],'method'=>'post','class'=>'pull-right']) !!}
{{Form::hidden('_method','DELETE')}}
    {{Form::submit('delete', ['class' => 'btn btn-primary'])}}
{!! Form::close() !!}
@endif
@endif
@endsection