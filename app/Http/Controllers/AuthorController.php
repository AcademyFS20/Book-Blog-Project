<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Author;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
class AuthorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $authors=Author::all();
        return view('admin.author.index', compact('authors'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.author.create');
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
            'author_name'=>'required|unique:authors',
            'about_author'=>'required',
            'author_image'=>'required|max:2048',
            
        ],[
            'author_name.required'=>'Author name is required',
            'author_name.unique'=>'Author is unique',
            'about_author.required'=>'Biography is required',
            'about_author.string'=>'The biography must be only characters',
            'author_image.max'=>'max file upload size is 2M',
           
        ]);

        $path=$request->file('author_image')->store('public/files');
       

        Author::create([
            'author_name'=>$request->author_name,
            'slug'=>Str::slug($request->author_name),
            'about_author'=>$request->about_author,
            'author_image'=>$path,
            
        ]);
        
        // $request->session()->put('message', 'category is created');
        return redirect()->route('admin.author.index')->with('message','Author created successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $authors=Author::find($id);
        return view('admin.author.show', compact('authors', 'id'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $authors=Author::find($id);
        return view('admin.author.edit', compact('authors', 'id'));
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
        $authors=Author::find($id);
        $image=$authors->author_image;

        if($request->file('author_image')){
            Storage::delete($image);
            $image=$request->file('author_image')->store("public/files");
        }



        $authors->author_name=$request->author_name;
        $authors->about_author=$request->about_author;
        $authors->author_image=$image;
        $authors->save();

      
        return redirect()->route('admin.author.index')->with('update', 'Author updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $author=Author::find($id);
        $author->delete();
        return redirect()->route('admin.author.index')->with('destroy', 'Author is deleted successfully');
    }
}
