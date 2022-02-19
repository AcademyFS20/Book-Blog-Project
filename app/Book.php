<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;

class Book extends Model
{

    
    protected $guarded=[];

    public function authors(){
        return $this->belongsTo(Author::class, 'author_id');
    }

    public function reviews(){
        return $this->hasMany(Review::class, 'book_id');
    }
    public function categories(){
        return $this->belongsTo(Category::class,'category_id');
    }

    public function books(){
        return $this->belongsToMany(User::class,'favorites', 'book_id', 'user_id');
    }

    public function isLiked(Request $book){
        if(auth()->check()){
            return ([auth()->user()->id,
            $book->id]);
        }
        
    }
    
}
