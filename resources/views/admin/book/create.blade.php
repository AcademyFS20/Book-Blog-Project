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
<form method="POST" action="{{ route('admin.book.store') }}" enctype="multipart/form-data">
@csrf
<small></small>
<div class="wrapper centered">
<article class="letter">
    <div class="side">
      <h1>Add Book</h1>
      <p>
        <input type="text" placeholder="Book" name="book_name">
      </p>
     
      <p>
        <input type="text" placeholder="Publish Date" name="publish_date">
      </p>
      <p>
        <textarea placeholder="Your message" name="description"></textarea>
      </p>
    </div>
    <div class="side">
     <p>
     <input type="file" placeholder="Author image" name="book_image"/>
     </p>
     <p>
     <select name="category_id">
  @foreach($categories as $category)
  <option value="{{ $category->id }}">
    {{$category->category_type}}
  </option>
  @endforeach
</select>
      </p>
      <p>
      <select name="author_id">
  @foreach($authors as $author)
  <option value="{{ $author->id }}">
    {{$author->author_name}}
  </option>
  @endforeach
</select>
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