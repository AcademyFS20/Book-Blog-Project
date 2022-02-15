@foreach($reviewss as $review)

<div class="display-comment" @if($review->parent_id != null) style="margin-left:40px;" @endif>

   <div>
  <h5>{{$review->users->name}}</h5>
  
   <img width="60" height="60" src="{{Storage::url($review->users->user_image)}}" alt=""/>

    <p>{{ $review->review }}</p>
    <a href="" id="reply"></a>
    <form method="post" action="{{route('user.review.stor')}}">
        @csrf
        <div class="form-group">
            <input type="text" name="review" class="form-control" />
            <input type="hidden" name="book_id" value="{{ $review->book_id }}" />
            <input type="hidden" name="parent_id" value="{{ $review->id }}" />
        </div>
      
        <div class="form-group">
            <input type="submit" class="btn btn-sm btn-outline-danger py-0" style="font-size: 0.8em;" value="Reply" />
        </div>
    </form>
     @include('user.review.reply', ['reviewss' => $review->replies])
   </div>
   

</div>


@endforeach 

