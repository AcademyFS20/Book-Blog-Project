<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h3>{{$book->book_name}}</h3>
    <p>{{$author->author_name}}</p>
    <p>{{$book->description}}</p>
    <img width="60" height="60" src="{{Storage::url($author->author_image)}}" alt="author_image"/>
    <p>{{$category->category_type}}</p>
    
    <img width="60" height="60" src="{{Storage::url($book->book_image)}}" alt="book_image"/>

</body>
</html>