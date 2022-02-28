@extends('layouts.app')
@section('content')
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="{{asset('css/profile.css')}}" rel="stylesheet">
	
</head>
<body>


<div class="card-container">
	
	<img class="round" src="{{Storage::url($user->user_image)}}" alt="user" />
	<h3>{{$user->name}}</h3>
	<h6>Admin</h6>
	
	<div class="buttons">
		<button class="primary">
        <a href="{{route('admin.home')}}">Dashboard</a>
		</button>
		<a href="{{route('admin.profile.edit', $user->id)}}">Edit Profile</a>
		<button class="primary ghost"><a href="{{route('welcome')}}">Home</a>
			
		</button>
	</div>
	
</div>

</body>
</html>
@endsection

