<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index()
    {
        return view('form');
    }

    public function store(Request $request)
    {
        $userData = ['User name' => $request->username, 'User second name' => $request->secondname, 'User email' => $request->email];
        
        return response()->json($userData);
    }
}
