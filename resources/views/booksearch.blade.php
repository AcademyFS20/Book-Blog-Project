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
    
    @endforeach

    @foreach($boo as $b)
    <h2>{{$b->author_name}}</h2>
    <h3>{{$b->books_count}}</h3>
    @endforeach

    @foreach($genres as $genre)
    <h2>{{$genre->category_type}}</h2>
    <h3>{{$genre->books_count}}</h3>
    @endforeach
</body>
</html>