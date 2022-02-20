<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Book;
use App\Author;
use App\Category;
use phpDocumentor\Reflection\Types\Null_;

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


    public function index4(Request $request){
        $book=Book::where([
            ['book_name', '!=', Null],
            ['publish_date', '!=', Null],
            [function($query) use($request){
                if(($term=$request->term)){
                    $query->orWhere('book_name','LIKE','%'.$term.'%');
                }
                if(($term=$request->term)){
                    $query->orWhere('publish_date','LIKE','%'.$term.'%');
                }
               
            }]
        ])->orderBy('id','desc')->paginate(10);
        
        $boo=Author::withCount('books')->where([
            ['author_name', '!=', Null],
            [function($query) use($request){
                if(($term=$request->term)){
                    $query->orWhere('author_name','LIKE','%'.$term.'%');
                }
               
            }]
        ])->orderBy('books_count','desc')->paginate(10);

        $genres=Category::withCount('books')->where([
            ['category_type', '!=', Null],
            [function($query) use($request){
                if(($term=$request->term)){
                    $query->orWhere('category_type','LIKE','%'.$term.'%');
                }
               
            }]
        ])->orderBy('books_count','desc')->paginate(10);
     
        return view('booksearch',compact('book','boo','genres'))->with('i',(request()->input('page',1)-1)*5);
    }


    public function index5($category_type)
    {
        // $categoriez = Category::with('books')->has('books')->get();
   
        // $categoriez=Category::find($id)->books;
        
        $categoriez=Category::where([['category_type', '=', $category_type]])
        ->with('books')->has('books')->get();
       
        return view('categorybooks', compact('categoriez'));
    }


    public function index6($author_name)
    {
       
        
        $authors=Author::where([['author_name', '=', $author_name]])
        ->with('books')->has('books')->get();
       
        return view('authorbooks', compact('authors'));
    }







}
