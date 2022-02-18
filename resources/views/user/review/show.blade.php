<html lang="en">

<head>
  <title>Aura Shelf</title>
  <link href="{{asset('css/cardbook.css')}}" rel="stylesheet">
</head>

<body>
<style>
    .display-comment .display-comment {
        margin-left: 40px
    }
</style>
  <div class="wrapper">
    <div class="product-img">
      <img src="{{Storage::url($book->book_image)}}" height="420" width="327">
    </div>
    <div class="product-info">
      <div class="product-text">
        <h1>{{ $book->book_name }}</h1>
        <h2>{{ $book->author_name }}</h2>
        <p>{{ $book->description }} </p>
      </div>
      
    </div>
    <button class="primary">
        <a href="{{route('welcome')}}">Homepage</a>
		</button>
  </div>

  <div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                
      
               <div class="card-body">
                <h5>Display Comments</h5>
            
                @include('user.review.reply', ['reviews'=>$book->reviews,'book_id'=>$book->id])
                

                <hr />
               </div>
              

               <div class="card-body">
                <h5>Leave a comment</h5>
                <form method="post" action="{{ route('user.review.store') }}">
                    @csrf
                    <div class="form-group">
                        <input type="text" name="review" class="form-control" />
                        <input type="hidden" name="book_id" value="{{ $book->id }}" />
                        
                    </div>
                    <div class="form-group">
                        <input type="submit" class="btn btn-sm btn-outline-danger py-0" style="font-size: 0.8em;" value="Add Comment" />
                    </div>
                </form>
               </div>
              

            </div>
        </div>
    </div>
</div>

</body>

</html>

