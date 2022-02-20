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
      <div>
        <a href="{{route('favorites', $book->id)}}">
          <input type="hidden" name="book_id" value="{{$book->id}}"/>
      <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"  id="empty" style="display:block" class="bi bi-heart" viewBox="0 0 16 16">
  <path d="m8 2.748-.717-.737C5.6.281 2.514.878 1.4 3.053c-.523 1.023-.641 2.5.314 4.385.92 1.815 2.834 3.989 6.286 6.357 3.452-2.368 5.365-4.542 6.286-6.357.955-1.886.838-3.362.314-4.385C13.486.878 10.4.28 8.717 2.01L8 2.748zM8 15C-7.333 4.868 3.279-3.04 7.824 1.143c.06.055.119.112.176.171a3.12 3.12 0 0 1 .176-.17C12.72-3.042 23.333 4.867 8 15z"/>
</svg>
<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-heart-fill" id="filled" style="display:none" viewBox="0 0 16 16">
  <path fill-rule="evenodd" d="M8 1.314C12.438-3.248 23.534 4.735 8 15-7.534 4.736 3.562-3.248 8 1.314z"/>
</svg>
</button>
</a>

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




<script>
$('#empty').on('change', function () {
  $('#filled').css('display', 'none');
  if ( $(this).val() === 'Filled' ) {
    $('#filled').css('display', 'block');
  }
});

</script>
</body>
</html>

