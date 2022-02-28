
 
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
	
	<img class="round" src="{{Storage::url($user->user_image)}}" width="100px" height="100px" alt="user" />
	<h3>{{$user->name}}</h3>
	<h6>User</h6>
	
	<div class="buttons">
		<button class="primary">
        <a href="{{route('welcome')}}">Home</a>
        <a href="{{route('favoriteslist')}}">Favorites</a>
        <a href="{{route('user.profile.edit', $user->id)}}">Edit Profile</a>
		</button>
		
	</div>
	
</div>
</body>
</html>

