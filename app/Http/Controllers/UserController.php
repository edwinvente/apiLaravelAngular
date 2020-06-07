<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserController extends Controller
{
    public function register(Request $request)
    {
        return 'register user';
    }

    public function login(Request $request)
    {
        return 'login user';
    }
}
