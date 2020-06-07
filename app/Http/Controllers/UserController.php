<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserController extends Controller
{
    public function register(Request $request)
    {
        var_dump($request->all());
    }

    public function login(Request $request)
    {
        var_dump($request->all());
    }
}
