<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use PDF;

class PdfGeneratorController extends Controller
{
    public function index($id)
    {
        $sql = "SELECT * FROM users WHERE id = '" . $id . "'";
       $user = DB::select($sql);

       $foo = 'asdasdfasdfsadfasd';

       $strObj = json_encode($user[0]);
       $json = json_decode($strObj);

       $data = [
        'name' => $json->name,
        'surname' => $json->surname,
        'email' => $json->email
       ];

       view('resume', ['name' => $json->name, 'surname' => $json->surname,'email' => $json->email,]);
    // view('resume', compact('foo'))->render();

       $pdf = PDF::loadView('resume', $data);

       return $pdf->stream('resume.pdf');
    }
}
