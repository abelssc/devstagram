<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\User;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class PostController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth'])->except(['show']);
    }
    public function index(){
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
        return redirect()->route('profile.index', auth()->user()->username);
    }
    public function destroy(Post $post){
        #if authorize is false, this method will throw an exception
        try{
           $this->authorize('delete',$post);
           $post->delete();
            //now we delete the img
            $img_path=public_path('img/posts/'.$post->imagen);
            // if(is_file($img_path)){
            //     unlink($img_path);
            // }
            if(File::exists($img_path))
                unlink($img_path);
                // File::unlink($img_path);
                // File::delete($img_path);

           return redirect()->route('profile.index',auth()->user()->username);
        }catch(Exception $error){
            dd($error);
        }
    }
}
