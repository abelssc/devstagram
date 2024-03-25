<?php
namespace App\Http\Controllers\auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    public function index() {
        return view('auth.login');
    }
    public function store(Request $request ){
        $this->validate($request,[
            'email' => 'required|email',
            'password' => 'required']
        );
        if(!auth()->attempt($request->only('email', 'password'), $request->remember)){
            return back()->with('status', 'Credenciales incorrectas');
        }
        return redirect()->route('profile.index', auth()->user()->username);
    }

    public function logout(){
        auth()->logout();
        return redirect()->route('home');
    }
}
