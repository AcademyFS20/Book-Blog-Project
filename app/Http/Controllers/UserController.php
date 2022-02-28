<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use App\Article;
class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('user');
    }
    public function index()
    {
        $user = Auth::user();
       
        return view('home', compact('user'));
    }
 public function indexing(){
    $user = Auth::user();
    $articles=Article::paginate(4);
     return view('welcome', compact('user','articles'));
 }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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
            'name'=>'required',
            'email'=>'required|unique:users',
            'password'=>'required',
            'password_confirmation'=>'required|confirmed|min:8',
            'user_image'=>'required|max:2048',

        ],[
            'name.required'=>'User name is required',
            'email.required'=>'Email is required',
            'email.unique'=>'Email is unique',
            'password.required'=>'passwprd is required',
            'password_confirmation.required'=>'password is required',
            'user_image.max'=>'max file upload size is 2M',
            
            
        ]);
        $path=$request->file('user_image')->store('public/files');

        
        
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $user=User::find($id);
        return view('user.profile', compact('user','id'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $users=User::find($id);
        return view('user.profile.edit', compact('users'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
   
        protected function update(Request $request, $id)
    {
        $users=User::find($id);
        $image=$users->user_image;

        if($request->file('user_image')){
            Storage::delete($image);
            $image=$request->file('user_image')->store("public/assets");
        }



        $users->name=$request->name;
        $users->email=$request->email;
        $users->password=$request->password;
        $users->password_confirmation=$request->password_confirmation;
        $users->user_image=$image;
        $users->save();

      
        return redirect()->route('user.profile',compact('users','id'))->with('update', 'User updated successfully!');
    }
    

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
