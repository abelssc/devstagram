<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class LikeController extends Controller
{
    public function store(Post $post){
        $post->likes()->create([
            'user_id'=>auth()->user()->id
        ]);
        return back();
    }
    public function destroy(Request $request,Post $post){
        #tomar atencion que likes() lleva parentesis para apuntar al modelo y no a las instancias
        $request->user()->likes()->where('post_id',$post->id)->delete();
        #segunda forma
        // $post->likes()->where('user_id',9)->delete();
        return back();
    }
}
