<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class UserController extends Controller
{
    public function showRegister(){
        return view('register.register');
    }

    public function showLogin(){
        return view('register.login');
    }
}
