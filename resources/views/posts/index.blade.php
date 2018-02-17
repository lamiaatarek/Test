@extends('layouts.app')
@section('content')

@foreach($posts as $post)
<div class="well">
<h3><a href="/posts/{{$post->id}}">{{$post->title}}</a></h3>
<small>written on{{$post->created_at}} by {{$post->user->name}}</small>
</div>
<div>
	<img src="/storage/images/{{$post->img}}" width="100" height="100">
</div>
@endforeach



@endsection