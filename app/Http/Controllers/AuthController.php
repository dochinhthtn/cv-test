<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use Exception;

class AuthController extends Controller {
    public function showLoginForm() {
        return view('login');
    }

    public function showRegisterForm() {
        return view('register');
    }

    public function handleLogin(Request $request) {
        // return "i";
        $data = $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        if(Auth::attempt($data)) {
            return redirect('/');
        }
    }

    public function handleRegister(Request $request) {
        $data = $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users,email',
            'password' => 'required',
            'passwordConfirmation' => 'required|same:password',
        ]);

        $data['password'] = Hash::make($data['password']);
        // try {
            User::create($data);
        // } catch(Exception $exception) {
        //     return redirect()->back()->withErrors([
        //         'email' => 'This email already has been registed by another account!'
        //     ])->withInput($data);
        // }

        return redirect('/auth/login');
    }
}
