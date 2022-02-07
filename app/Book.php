<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    protected $guarded=[];

    public function authors(){
        return $this->belongsTo(Author::class, 'book_id');
    }

    public function reviews(){
        return $this->hasMany(Review::class, 'book_id');
    }
    public function categories(){
        return $this->belongsTo(Category::class,'book_id');
    }

    public function users(){
        return $this->belongsToMany(User::class,'users_books', 'book_id', 'user_id');
    }
}
