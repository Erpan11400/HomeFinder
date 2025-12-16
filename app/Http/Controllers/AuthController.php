<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Property;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class AuthController extends Controller
{

    // login form
    public function showLoginForm()
    {
        return view('Login');
    }

    public function login(Request $request)
    {
        $request->validate([
            'email'    => 'required|email',
            'password' => 'required',
        ]);

        if (Auth::attempt($request->only('email', 'password'))) {

            
            if (Auth::user()->role === 'admin') {
                return redirect('/admin/dashboard');
            }

            return redirect('/property');
        }

        return back()->withErrors([
            'email' => 'Email atau password salah.'
        ]);
    }


    // register form
    public function showRegisterForm()
    {
        return view('Register');
    }

    public function register(Request $request)
    {
        $request->validate([
            'name'     => 'required|string|max:255',
            'email'    => 'required|email|unique:users,email',
            'password' => 'required|confirmed|min:6',
        ]);

        $countUser = User::where('user_id', 'like', 'US%')->count() + 1;

        $user = User::create([
            'user_id' => 'US' . $countUser,
            'name'     => $request->name,
            'email'    => $request->email,
            'password' => Hash::make($request->password),
            'role'     => 'user', // ✅ DEFAULT ROLE
        ]);

        Auth::login($user);

        return redirect('/property')->with('success', 'Akun berhasil dibuat!');
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        session()->forget('prop');

        return redirect('/login');
    }
}
