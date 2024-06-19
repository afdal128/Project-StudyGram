<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class RegisterController extends Controller
{
    public function daftar()
    {
        return view('signup');
    }

    public function store(Request $request ){

         $validated = $request->validate([
            'name'=> 'required|string|max:255',
            'email' => 'required|email:dns|unique:users',
            'password' => 'required|min:5|max:255'
        ]);

        $validated['password'] = Hash::make($validated['password']);
        
        User::create($validated);

        //$request->session()->flash('success','Registrasi berhasil silahkan login');

        return redirect('/login')->with('success','Registrasi berhasil silahkan login');
    }
}
