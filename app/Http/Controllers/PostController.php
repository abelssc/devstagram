<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\User;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth'])->except(['index','show']);
    }
    public function index(User $user){
        $posts=Post::where('user_id', $user->id)->paginate(20);


        return view('profile', [
            'user' => $user,
            'posts' => $posts,
        ]);
    }
    public function show(User $user,Post $post){
        return view('posts.show', [
            'user' => $user,
            'post' => $post,
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
        // Post::create([
        //     'title' => $request->title,
        //     'description' => $request->description,
        //     'imagen' => $request->imagen,
        //     'user_id' => auth()->user()->id,
        // ]);

        //OTRA FORMA
        // $post=new Post([
        //     'title' => $request->title,
        //     'description' => $request->description,
        //     'imagen' => $request->imagen,
        //     'user_id' => auth()->user()->id,
        // ]);
        // $post->save();
        // OTRA FORMA
        $request->user()->posts()->create([
            'title' => $request->title,
            'description' => $request->description,
            'imagen' => $request->imagen,
            'user_id' => auth()->user()->id,    
        ]);        
        return redirect()->route('profile', auth()->user()->username);
    }
}
