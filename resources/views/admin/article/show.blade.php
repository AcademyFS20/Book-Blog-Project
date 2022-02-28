<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Aura Shelf</title>
</head>
<body>
    <h3>{{$article->title}}</h3>
    <p>{{$article->body}}</p>
    <p>Published at: {{$article->created_at->format('d/m/Y')}}</p>
    <img width="60" height="60" src="{{Storage::url($article->article_image)}}" alt="Article_image"/>

</body>
</html>