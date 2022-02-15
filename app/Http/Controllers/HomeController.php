<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Book;
use App\Author;
use App\Category;
class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home');
    }
    public function indexx()
    {
        return view('welcome');
    }

    public function index1()
    {
        $books = Book::join('authors','books.author_id','=','authors.id')->join('categories', 'books.category_id', '=', 'categories.id')
        ->select('books.id','books.book_name','books.description','books.publish_date','books.book_image','authors.author_name','categories.category_type','authors.author_image')->get();
        
        return view('books', compact('books'));
    }

    public function index2()
    {
        $authors=Author::withCount('books')->orderBy('books_count','desc')->get();
        return view('authors',compact('authors'));
    }

    public function index3()
    {
        $categories=Category::withCount('books')->orderBy('books_count','desc')->get();
        
        return view('genres', compact('categories'));
    }

}
