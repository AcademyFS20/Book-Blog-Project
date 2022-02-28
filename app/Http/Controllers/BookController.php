<?php

namespace App\Http\Controllers;

use App\Author;
use App\Book;
use App\Category;
use App\Favorite;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use App\User;
use Illuminate\Database\Eloquent\Relations\Pivot;

class BookController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $books = Book::join('authors','books.author_id','=','authors.id')->join('categories', 'books.category_id', '=', 'categories.id')
        ->select('books.id','books.book_name','books.description','books.publish_date','books.book_image','authors.author_name','categories.category_type')->get();
       
        
        return view('admin.book.index', compact('books'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories=Category::all();
        $authors=Author::all();
        return view('admin.book.create', compact('categories', 'authors'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request,[
            'book_name'=>'required',
            'publish_date'=>'required',
            'book_image'=>'required|max:2048',
            'description'=>'required',
            'category_id'=>'required',
            'author_id'=>'required',
            
        ],[
            'book_name.required'=>'Book name is required',
            
            'publish_date.required'=>'Publishing date is required',
            'book_image.max'=>'max file upload size is 2M',
            'description.required'=>'Description is required',
            'description.string'=>'Description must be only characters',
            'category_id.required'=>'Genre is required',
            'author_id.required'=>'Author is required',
            
           
        ]);

        $path=$request->file('book_image')->store('public/files');
       

        Book::create([
            'book_name'=>$request->book_name,
            'slug'=>Str::slug($request->book_name),
            'publish_date'=>$request->publish_date,
            'book_image'=>$path,
            'description'=>$request->description,
            'category_id'=>$request->category_id,
            'author_id'=>$request->author_id,
            
        ]);
        
       
        return redirect()->route('admin.book.index')->with('message','Book created successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $book=Book::find($id);
        $author=Author::find($id);
        $category=Category::find($id);
        return view('admin.book.show', compact('book','author','category', 'id'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $books=Book::find($id);
        $categories=Category::all();
        $authors=Author::all();
        return view('admin.book.edit', compact('books','authors','categories', 'id'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $books=Book::find($id);
        $image=$books->book_image;

        if($request->file('book_image')){
            Storage::delete($image);
            $image=$request->file('book_image')->store("public/files");
        }



        $books->book_name=$request->book_name;
        $books->publish_date=$request->publish_date;
        $books->book_image=$image;
        $books->description=$request->description;
        $books->category_id=$request->category_id;
        $books->author_id=$request->author_id;
        
        $books->save();

      
        return redirect()->route('admin.book.index')->with('update', 'Book updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $book=Book::find($id);
        $book->delete();
        return redirect()->route('admin.book.index')->with('destroy', 'Book deleted successfully');
    }

    public function addfavorites(Request $book){

        $like=
        Favorite::create([
            'user_id'=>auth()->user()->id,
            'book_id'=>$book->id
        ]);
        return back()-> with('success','Book added to favorites');
    }

    public function showFavorites(){
        $favorites=User::with('books')->get();
        $favorites=Favorite::join('books','favorites.book_id','=','books.id')
        ->select('books.id','books.book_name','books.book_image')->where('user_id',auth()->user()->id)->get();
        
        
        
        return view('favoriteslist', compact('favorites'));
    }

    public function deleteFavorites($id){
        $favorites=Book::find($id);
        $favorites->books()->detach();
        
        return back();
    }
   
}
