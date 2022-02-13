<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    Review
    
    @forelse($book as $boo)
    <p>{{$boo->id}}</p>
    <p>{{$boo->description}}</p>
    <p>{{$boo->author_name}}</p>
    <a href="{{route('user.review.show', $boo->id)}}">show book</a>
    @empty
    <h5>no book</h5>
    @endforelse
</body>
</html>