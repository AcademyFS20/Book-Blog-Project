<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Aura Shelf</title>
    <link href="{{asset('css/create.css')}}" rel="stylesheet" />
</head>
<body>
<form method="POST" action="{{ route('admin.article.store') }}" enctype="multipart/form-data">
@csrf
<small></small>
<div class="wrapper centered">
<article class="letter">
    <div class="side">
      <h1>Write Article</h1>
      <p>
        <input type="text" placeholder="Article" name="title" >
      </p>
      <p>
        <textarea placeholder="text" name="body"></textarea>
      </p>
      <p>
     <input type="file" placeholder="Article image" name="article_image"/>
     </p>
    </div>
    <div class="side">
     
     <p>       </p>
      <p>
        <button id="sendLetter">Add Article</button>
      </p>
    </div>
  </article>
  
</div>
</form>
</body>
</html>