<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Review extends Model
{
    protected $guarded=[];

    public function books(){
        return $this->belongsTo(Book::class, 'book_id');
    }
}
