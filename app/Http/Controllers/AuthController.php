<?php

namespace App\Http\Controllers;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    //función para registrar usuarios co validación
    public function register(Request $request){
        $request->validate([
            'username' => 'required|unique:users',
            'name' => 'required',
            'surename' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:6',
            'rol' => 'required'
        ]);

        User::create([
            'username' => $request->username,
            'name' => $request->name,
            'surename' => $request->surename,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'rol' => $request->rol,
        ]);

        return redirect('/login');
    }

    //función para hacer login
    public function login(Request $request){
        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)){
            $request->session()->regenerate();

            return auth()->user()->rol === 'admin' ? redirect('/admin/users') : redirect('/perfil');    
        }

        return back()->withErrors([
            'email' => 'Login incorrecto',
        ]);
    }

    //función de logout
    public function logout(Request $request){
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/login');
    }
}
