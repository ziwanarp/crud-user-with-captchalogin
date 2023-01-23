<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class LoginController extends Controller
{
    public function index()
    {
        return view('login.index');
    }

    public function register()
    {
        return view('register.index');
    }

    public function registerStore(Request $request)
    {
        $rules = [
            'name' => 'required|min:5',
            'username' => 'required|min:5|unique:users',
            'email' => 'required|unique:users',
            'password' => 'required|min:5|max:8',
        ];

        $validatedData = $request->validate($rules);

        $validatedData['password'] = Hash::make($validatedData['password']);

        User::create($validatedData);

        return redirect('/register')->with('success', 'Register berhasil, silahkan login !');
    }

    public function login(Request $request)
    {
        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required',
            'captcha' => 'required|captcha'
        ]);

        $valid = [
            'email' => $credentials['email'],
            'password' => $credentials['password']
        ];

        if (Auth::attempt($valid)) {
            return redirect()->intended('/user')->with('success', 'Login berhasil !');
        }
        return redirect('/')->with('error', 'Email / Password salah !');
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/')->with('success', 'Berhasil logout !');
    }

    public function reloadCaptcha()
    {
        return response()->json(['captcha' => captcha_img('math')]);
    }
}
