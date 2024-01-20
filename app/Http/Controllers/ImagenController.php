<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Intervention\Image\Drivers\Gd\Driver;
use Intervention\Image\ImageManager;
use Intervention\Image\Laravel\Facades\Image;

class ImagenController extends Controller
{
    public function store(Request $request){
        $file = $request->file('file');
        $name = Str::uuid() . '.' . $file->extension();
    
        $manager = new ImageManager(new Driver());

        $image=$manager->read($file);
        $image->resize(400,400);
        $image->save(public_path('img/posts/' . $name));

        return response()->json(['imagen' => $name]);
    }
}
