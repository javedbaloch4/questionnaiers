<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SessionController extends Controller
{
    public function __construct()
    {
        return $this->middleware('guest')->except('logout');
    }

    public function index() {
        return view('sessions.index');
    }

    public function store(Request $request) {

        $request->validate([
            'email' => 'required',
            'password' => 'required'
        ]);

        $credentials = $request->only('email', 'password');

        if (!auth()->attempt($credentials) ) {
            return redirect()->back()->withErrors(['msg' => 'Wrong credentials']);
        }

        return redirect('/');

    }

    public function logout() {
        auth()->logout();

        session()->flash('msg','Logged out successfully');

        return redirect('/login');
    }
}
