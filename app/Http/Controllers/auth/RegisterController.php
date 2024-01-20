<?php

namespace App\Http\Controllers\auth;

use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;

class RegisterController extends Controller
{
    public function index() {
        return view('auth.register');
    }
    public function store(Request $request ){

        //Modificamos el request para que el username sea el slug del username y valide con el slug
        $request->request->add(['username' => Str::slug($request->username)]);

        $this->validate($request, [
            'name' => 'required|max:255',
            'username' => 'required|unique:users|max:255',
            'email' => 'required|unique:users|email|max:255',
            'password' => 'required|confirmed|min:8|max:255'
        ]);

        $user=User::create([
            'name' => $request->name,
            'username' => $request->username,
            'email'=> $request->email,
            'password' => Hash::make($request->password)
        ]);
        // forma 1 de loguear al usuario
        auth()->attempt($request->only('email', 'password'));
        // forma 2 de loguear al usuario
        // auth()->attempt([
        //     'email' => $request->email,
        //     'password' => $request->password
        // ]);
        // forma 3 de loguear al usuario
        // auth()->login($user);

        return redirect()->route('profile', $user->username);
    }
}
