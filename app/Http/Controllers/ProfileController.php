<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rule;
use Illuminate\Support\Str;
use Intervention\Image\Drivers\Gd\Driver;
use Intervention\Image\ImageManager;

class ProfileController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth')->except(['index','show']);
    }
    /**
     * Display a listing of the resource.
     */
    public function index(User $user){
        $posts=$user->posts()->paginate(20);

        return view('profile.index', [
            'user' => $user,
            'posts' => $posts,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(User $user)
    {
        $this->authorizeForUser(auth()->user(),'view',$user);
        return view('profile.edit',compact("user"));
    }


    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, User $user)
    {
        $this->validate($request,[
            'name'=>'required|max:255',
            'username'=>['required',Rule::unique('users')->ignore($user->id),'max:255'],
        ]);
        $this->authorizeForUser(auth()->user(),'view',$user);
        //save img
        if($file=$request->file('imagen')){
            $file_name=Str::uuid().'.'.$file->extension();
            $manager=New ImageManager(new Driver());
            $image=$manager->read($file);
            $image->resize(1000,1000);
            $image->save(public_path('img/users/'.$file_name));
            //now destroy the prev img
            if(is_file(public_path('img/users/'.$user->imagen))){
                unlink(public_path('img/users/'.$user->imagen));
            }
        }
        //save user
        $user->name=$request->name;
        $user->username=$request->username;
        $user->password=Hash::make($request->password);
        $user->imagen=$file_name??$user->imagen;
        $user->save();
       
        // reset credenciales
        
        //return
        return redirect()->route('profile.index',$user->username);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
