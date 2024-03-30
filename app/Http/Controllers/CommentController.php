<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    // ESTAS FUNCIONALIDADES FUERON ENVIADAS A LIVEWIRE 
    public function store(Request $request)
    {   
        // $this->validate($request, [
        //     'content' => 'required|max:255',
        //     'post_id' => 'required|exists:posts,id'
        // ]);
        // $request->user()->comments()->create([
        //     'content' => $request->content,
        //     'post_id' => $request->post_id,
        //     'user_id' => auth()->user()->id
        // ]);
        // return back()->with('status', 'Comentario creado');
    }
    public function destroy(Request $request,Comment $comment){
        // if($comment->user_id===$request->user()->id){
        //     $comment->delete();
        // }else if($request->user()->id===$comment->post->user_id){
        //     $comment->delete();
        // }else{
        //     return back()->with('error',"No puedes realizar esta acción");
        // }
        // return back();
    }
}
