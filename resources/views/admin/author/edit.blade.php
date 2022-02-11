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
<form method="POST" action="{{ route('admin.author.update', $authors->id) }}" enctype="multipart/form-data">
@method('PUT')
@csrf
<small></small>
<div class="wrapper centered">
<article class="letter">
    <div class="side">
      <h1>Add Author</h1>
      <p>
        <input type="text" placeholder="Author" name="author_name" value="{{$authors->author_name}}">
      </p>
      <p>
        <textarea placeholder="Your message" name="about_author">{{$authors->about_author}}</textarea>
      </p>
    </div>
    <div class="side">
     <p>
     <input type="file" placeholder="Author image" name="author_image"/>
     <img width="60" height="60" src="{{Storage::url($authors->author_image)}}" alt=""/>
     </p>
     
      <p>
        <button id="sendLetter">Send</button>
      </p>
    </div>
  </article>
  
</div>
</form>
</body>
</html>