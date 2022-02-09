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
<form method="POST" action="{{ route('admin.category.store') }}" enctype="multipart/form-data">
@csrf
<small></small>
<div class="wrapper centered">
<article class="letter">
    <div class="side">
      <h1>Add Genre</h1>
      <p>
        <input type="text" placeholder="Genre" name="category_type" >
      </p>
      <p>
        <textarea placeholder="Your message" name="description"></textarea>
      </p>
    </div>
    <div class="side">
     
     <p>       </p>
      <p>
        <button id="sendLetter">Send</button>
      </p>
    </div>
  </article>
  
</div>
</form>
</body>
</html>