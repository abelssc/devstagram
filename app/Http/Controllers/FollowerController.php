<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class FollowerController extends Controller
{
    public function store(Request $request,User $user){
        // $user->followers()->create(["follower_id"=>$request->user()->id]);
        $user->followers()->attach($request->user()->id);
        return back();
    }
    public function destroy(Request $request,User $user){
        // $user->followers()->where('follower_id',$request->user()->id)->delete();
        $user->followers()->detach($request->user()->id);
        return back();
    }
}
