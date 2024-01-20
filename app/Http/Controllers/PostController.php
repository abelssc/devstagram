<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\User;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth']);
    }
    public function index(User $user){
        return view('profile', [
            'user' => $user
        ]);
    }
    public function create(){
       return view('posts.create');
    }
    public function store(Request $request){

        $this->validate($request, [
            'title'=> 'required|max:255',
            'description'=> 'required|max:255',
            'imagen'=> 'required',

        ]);
        Post::create([
            'title' => $request->title,
            'description' => $request->description,
            'imagen' => $request->imagen,
            'user_id' => auth()->user()->id,
        ]);
        return redirect()->route('profile', auth()->user()->username);
    }
}
