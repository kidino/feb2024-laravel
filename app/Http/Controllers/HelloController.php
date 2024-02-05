<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HelloController extends Controller
{
    function index(Request $request, $name = "Saudara") {
        return view("page.hello", ["name"=> $name]);
    }
}
