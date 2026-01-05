<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Contact;
use App\Models\Category;
use App\Http\Requests\ContactRequest;

class ContactController extends Controller
{
    public function index(){
        $categories = Category::all();
        $contacts = session('contact-input', []);

        return view('index',compact('categories','contacts'));
    }

    public function confirm(ContactRequest $request){
        $contacts = $request->only([
        'category_id',
        'first_name',
        'last_name',
        'gender',
        'email',
        'tel_1',
        'tel_2',
        'tel_3',
        'address',
        'building',
        'detail'
    ]);

    session(['contact-input' => $contacts]);

    $category = Category::find($contacts['category_id']);
    $contacts['category_content'] = $category?->content;
    $contacts['tel'] = $contacts['tel_1'].'-'.$contacts['tel_2'].'-'.$contacts['tel_3'];

    return view('confirm',compact('contacts'));
    }

    public function store(Request $request){
        $contacts = $request->input('contacts',[]);

    unset($contacts['tel_1'], $contacts['tel_2'], $contacts['tel_3'], $contacts['category_content']);
    Contact::create($contacts);

    session()->forget('contact-input');

    return redirect('/contact/thanks');
    }

    public function thanks(){
        return view('thanks');
    }
}

