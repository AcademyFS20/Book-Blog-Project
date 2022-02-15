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
  
 @forelse($categories as $category)
  <div class="card">
    <div class="card-header">
      <img src="{{asset('images/paige.jpg')}}" alt="city" />
    </div>
    <div class="card-body">
      <span class="tag tag-pink">Genre</span>
      <h4>
      {{$category->category_type}}
      </h4>
      <p>
      {{$category->description}}
      </p>
      <div class="user">
        
        <div class="user-info">
          <h5>Number of books {{$category->books_count}}</h5>
          
        </div>
      </div>
    </div>
  </div>
</div>
@empty
<h4>No genres available</h4>
@endforelse

</body>
</html>