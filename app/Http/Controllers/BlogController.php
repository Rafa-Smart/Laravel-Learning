<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class BlogController extends Controller
{
    function index(){
        return view('blog', ['data' => 'This is blog page']);
    }
}
