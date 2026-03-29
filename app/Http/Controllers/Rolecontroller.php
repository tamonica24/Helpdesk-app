<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class Rolecontroller extends Controller
{
    public function index()
    {
        return view('role');
    }
}
