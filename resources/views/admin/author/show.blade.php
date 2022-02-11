<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h3>{{$authors->author_name}}</h3>
    <p>{{$authors->about_author}}</p>
    <img width="60" height="60" src="{{Storage::url($authors->author_image)}}" alt="Author_image"/>

</body>
</html>