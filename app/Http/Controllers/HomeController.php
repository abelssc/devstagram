<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function __invoke()
    {
        #obtenemos a quienes seguimos
        $followings=auth()->user()->followings;
        // $posts=[];
        // foreach($followings as $following){
        //     $posts=[$posts,...Post::where('user_id',$following->id)->get()];
        // }
        $posts=Post::whereIn('user_id',$followings->pluck('id'))->latest()->paginate(2);
        // dd($posts);
        return view('home',["posts"=>$posts]);
    }
}
