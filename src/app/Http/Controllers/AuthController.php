<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Contact;
use App\Models\Category;


class AuthController extends Controller
{
    public function admin(){
        // $contacts = Contact::with('category')->simplePaginate(10);
        $contacts = Contact::with('category')->get();
        $categories = Category::all();
        return view ('admin', compact('contacts', 'categories'));
    }
}
