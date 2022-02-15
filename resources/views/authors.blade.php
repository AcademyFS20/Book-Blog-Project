

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
  
 @forelse($authors as $author)
  <div class="card">
    <div class="card-header">
      <img src="{{Storage::url($author->author_image)}}" alt="city" />
    </div>
    <div class="card-body">
      <span class="tag tag-pink">Writer</span>
      <h4>
      {{$author->author_name}}
      </h4>
      <p>
      {{$author->about_author}}
      </p>
      <div class="user">
        
        <div class="user-info">
          <h5>Number of books {{$author->books_count}}</h5>
          
        </div>
      </div>
    </div>
  </div>
</div>
@empty
<h4>No writers available</h4>
@endforelse

</body>
</html>
