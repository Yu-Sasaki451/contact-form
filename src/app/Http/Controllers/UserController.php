<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Contact;

class UserController extends Controller
{

    public function showAdmin(){
        $contacts = Contact::with('category')->latest()->paginate(7);

        return view('admin',compact('contacts'));
    }
}
