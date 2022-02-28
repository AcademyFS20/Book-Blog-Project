<?php

namespace App\Http\Controllers;

use App\Article;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class ArticleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $articles=Article::all();

        return view('admin.article.index', compact('articles'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.article.create');
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
            'title'=>'required',
            'body'=>'required',
            'article_image'=>'required|max:2048',
            
        ],[
            'title.required'=>'Genre is required',
            
            'body.required'=>'description is required',
            'article_image.max'=>'max file upload size is 2M',
            
        ]);

        $path=$request->file('article_image')->store('public/files');

        Article::create([
            'title'=>$request->title,
            'slug'=>Str::slug($request->title),
            'body'=>$request->body,
            'article_image'=>$path,
            
        ]);
        return redirect()->route('admin.article.index')->with('message','Article created successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($param)
    {
        $article=Article::where('id', $param)
            ->orWhere('slug', $param)
            ->firstOrFail();
        return view('admin.article.show', compact('article'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $articles=Article::find($id);
        return view('admin.article.edit', compact('articles', 'id'));
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
        $articles=Article::find($id);
        $image=$articles->article_image;

        if($request->file('article_image')){
            Storage::delete($image);
            $image=$request->file('article_image')->store("public/files");
        }



        $articles->title=$request->title;
        $articles->body=$request->body;
        $articles->article_image=$image;
        $articles->save();

      
        return redirect()->route('admin.article.index')->with('update', 'Article updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $article=Article::find($id);
        $article->delete();
        return redirect()->route('admin.article.index')->with('destroy', 'Article is deleted successfully');
    }

    public function showArticles(){
        $articles=Article::all();
        return view('showarticles', compact('articles'));

    }
    public function showArticle($id){
        $article=Article::find($id);
        return view('showarticle', compact('article','id'));

    }

}
