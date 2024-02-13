<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CommentController extends Controller
{
    public function store(Request $request)
    {   
        $this->validate($request, [
            'content' => 'required|max:255',
            'post_id' => 'required|exists:posts,id'
        ]);
        $request->user()->comments()->create([
            'content' => $request->content,
            'post_id' => $request->post_id,
            'user_id' => auth()->user()->id
        ]);
        return back()->with('status', 'Comentario creado');
    }
}
