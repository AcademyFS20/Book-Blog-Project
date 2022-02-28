<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="{{asset('css/create.css')}}" rel="stylesheet" />
</head>
<body>
<form method="POST" action="{{ route('admin.article.update', $articles->id) }}" enctype="multipart/form-data">
@method('PUT')
@csrf
<small></small>
<div class="wrapper centered">
<article class="letter">
    <div class="side">
      <h1>Edit Article</h1>
      <p>
        <input type="text" placeholder="Author" name="title" value="{{$articles->title}}">
      </p>
      <p>
        <textarea placeholder="Your message" name="body">{{$articles->body}}</textarea>
      </p>
    </div>
    <div class="side">
     <p>
     <input type="file" placeholder="Author image" name="article_image"/>
     <img width="60" height="60" src="{{Storage::url($articles->article_image)}}" alt=""/>
     </p>
     
      <p>
        <button id="sendLetter">Update</button>
      </p>
    </div>
  </article>
  
</div>
</form>
</body>
</html>