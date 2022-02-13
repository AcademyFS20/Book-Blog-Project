
@extends('layouts.app')
<style>
    .display-comment .display-comment {
        margin-left: 40px
    }
</style>
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-body">
                    <p>{{ $book->description }}</p>
                </div>
      
               <div class="card-body">
                <h5>Display Comments</h5>
            
                @include('user.review.reply', ['reviews' => $book->reviews, 'book_id' => $book->id])

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
@endsection 