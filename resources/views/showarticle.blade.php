<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
   
    <img src="{{Storage::url($article->article_image)}}"/>
    <h3>{{$article->title}}</h3>
    <p>{{$article->body}}</p>
   
</body>
</html>