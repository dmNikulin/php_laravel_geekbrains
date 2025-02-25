<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\DB;

class UserController extends Controller
{
    public function index() 
    {
        return view('form');
    }

    public function adduser(Request $request)
    {
        $request->validate([
            'name' => ['required', 'max:100'],
            'surname' => ['required', 'max:100'],
            'email' => ['required', 'max:100']
        ]);

        $user = new User($request->all());
        $user->save();

        return Redirect::route('show-form');
    }

    public function getall()
    {
       $allUsers = DB::select('select * from users');
       return $allUsers;
    }

    public function getuser($id)
    {
        $sql = "SELECT * FROM users WHERE id = '" . $id . "'";
       $user = DB::select($sql);

       return $user;
    }
}