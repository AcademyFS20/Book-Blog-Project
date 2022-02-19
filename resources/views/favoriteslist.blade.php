<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    @foreach($favorites as $favorite)
    <h3>{{$favorite->book_name}}</h3>
    <img src="{{Storage::url($favorite->book_image)}}"/>

      <form method="POST" action="{{route('deletefavorite',$favorite->id)}}" enctype="multipart/form-data">
							@csrf
								@method('delete')
								<button type="submit" class="btn btn-danger" class="delete">Delete</button>
								
							</form>
    @endforeach
</body>
</html>