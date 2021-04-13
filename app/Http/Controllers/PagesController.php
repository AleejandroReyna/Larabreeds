<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\Breed;
use App\Models\User;

class PagesController extends Controller
{
    public function dashboard() 
    {
        $breeds = Breed::get();
        return view('dashboard', ['breeds' => $breeds]);
    }

    public function login(Request $request) 
    {
        return view('auth/login');
    }

    public function register(Request $request) 
    {
        return view('auth/register');
    }

    public function store_user(Request $request) {
        $this->validate(request(), [
            'name' => 'required',
            'email' => 'required|email',
            'password' => 'required'
        ]);

        $user = User::create(request(['name', 'email', 'password']));

        return redirect()->to('/login');
    }

    public function authenticate(Request $request)
    {
        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();

            return redirect()->intended('dashboard');
        }

        return back()->withErrors([
            'email' => 'The provided credentials do not match our records.',
        ]);
    }
}
