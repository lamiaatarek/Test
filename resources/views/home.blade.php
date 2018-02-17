@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Dashboard</div>
               <table>
                  <tr>
                   <th text-align="center">Title</th>
                
                   </tr>
                   @forelse($posts as $post)
                   <tr>
                       <td>{{$post->title}}</td>
                    
                       
                        <td><div>
  <img src="/storage/images/{{$post->img}}" width="100" height="100">
</div></td>
                   </tr>
                   <tr>
                      <td><a href="/posts/{{$post->id}}/edit">Edit</a></td>
                   </tr>
               
                       @empty
                     no posts yet
                  
                   @endforelse
               </table>
               
            </div>
        </div>
    </div>
</div>
@endsection
