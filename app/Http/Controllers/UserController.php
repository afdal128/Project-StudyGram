<?php

namespace App\Http\Controllers;

use App\Models\tugas;
use App\Http\Requests\StoretugasRequest;
use App\Http\Requests\UpdatetugasRequest;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function daftar()
    {
        return view('signup.daftar');
    }

    public function store(Request $request ){

        $request->validate([
            'name'=> 'required|string|max:255',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:5|max:255'
        ]);

        dd($request);
    }
}
