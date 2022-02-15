<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="{{asset('css/cards.css')}}" rel="stylesheet">
</head>
<body>
    

<div class="container">
  
 @forelse($books as $book)
 
  <div class="card">
    <div class="card-header">
      <img src="{{Storage::url($book->book_image)}}" alt="city" />
    </div>
    <div class="card-body">
      <span class="tag tag-pink">{{$book->category_type}}</span>
      <h4>
      {{$book->book_name}}
      </h4>
      <p>
      <a href="{{route('user.review.show',$book->id)}}">
        Click to read more about this book
      </a>
      </p>

      <div class="user">
        <img src="{{Storage::url($book->author_image)}}" alt="user" />
        <div class="user-info">
          <h5>{{$book->author_name}}</h5>
          
        </div>
      </div>
    </div>
  </div>

</div>
@empty
<h4>No books available</h4>
@endforelse

</body>
</html>

