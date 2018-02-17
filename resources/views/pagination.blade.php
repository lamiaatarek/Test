<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
<section class="content">
          <div class="row">
         
            <div class="col-xs-12 col-lg-offset-12">
          <table id="example2" class="table table-bordered table-hover">
          
          <thead>
          	<tr>
          		<th>num</th>
          		<th>lastname</th>
          		<th>mail</th>
          	</tr>
          </thead>
          <tbody>
          @foreach($users->test() as $user)
          	<tr>
          	   <td>{{$loop->index+1}}</td>
          		<td>{{$user->lastname}}</td>
          		<td>{{$user->email}}</td>
          	</tr>
          	@endforeach
          </tbody>
          </table>
         {{$users->test()->links()}}
         

          </div></div></section>
</body>
</html>