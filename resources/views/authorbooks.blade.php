<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    @foreach($authors as $author)

    <h3>{{$author->author_name}}</h3>
    <div>
    @foreach($author->books as $book)
    <h2>{{$book->book_name}}</h2>
    <a href="{{route('user.review.show',$book->id)}}">Discover book</a>
@endforeach
</div>

    @endforeach
</body>
</html>