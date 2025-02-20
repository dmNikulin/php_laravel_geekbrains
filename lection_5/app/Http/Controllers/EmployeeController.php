<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class EmployeeController extends Controller
{   
    public function index()
    {
        return view('form');
    }

    public function store(Request $request)
    {   
        $name = $request->input('username');    
        $secondname = $request->input('secondname');
        $email = $request->input('email');
        $textarea = $request->input('textarea');

        $object = json_decode($textarea);

        $login = $object->name;
        echo $login;

        // {
        //     "name": "Super hero",
        //     "town": "Metro City",
        //     "formed": "2016",
        //     "location": "Super tower"
        //  }

        echo '<br>';
        $newUser = [
            'name' => $name,
            'second name' => $secondname,
            'email' => $email,
        ];

        print_r($newUser);

        $this->getPath($request);
        $this->getUrl($request);
    }

    public function update(Request $request, $id)
    {   
        $id = $request->input('id');
        $name = $request->input('username');    
        $secondname = $request->input('secondname');
        $email = $request->input('email');

        echo $id;
    }

    public function getPath(Request $request) {
        echo $request->path();
    }

    public function getUrl(Request $request) {
        echo $request->url();
    }
}
