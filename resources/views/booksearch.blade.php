<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    @foreach($book as $bo)
    <h3>{{$bo->book_name}}</h3>
    <h3>{{$bo->publish_date}}</h3>
    <a href="{{route('user.review.show',$bo->id)}}">Discover book</a>
    @endforeach

    @foreach($boo as $b)
    <h2>{{$b->author_name}}</h2>
    <h3>{{$b->books_count}}</h3>
    <a href="{{route('authorbooks',['author_name'=>$b->author_name])}}">Click me</a>

    @endforeach

    @foreach($genres as $genre)
    <h2>{{$genre->category_type}}</h2>
    <h3>{{$genre->books_count}}</h3>
    <a href="{{route('categorybooks',['category_type'=>$genre->category_type])}}">Click me</a>
    @endforeach
</body>
</html>