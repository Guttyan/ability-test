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
        return view('contact',compact('categories'));
    }

    public function confirm(ContactRequest $request){
        $contact = $request->only(['last_name', 'first_name', 'gender', 'email', 'tel_first', 'tel_second', 'tel_third', 'address', 'building', 'category_id', 'detail']);
        $categories = Category::all();
        return view('confirm', compact('contact', 'categories'));
    }

    public function store(Request $request){
        $contact = $request->only(['last_name', 'first_name', 'gender', 'email', 'tel', 'address', 'building','category_id', 'detail']);

        $contact_back = $request->only(['last_name', 'first_name', 'gender', 'email', 'tel_first','tel_second', 'tel_third', 'address', 'building','category_id', 'detail']);

        if($request->has("back")){
            return redirect('/')->withInput($contact_back);
        }

        Contact::create($contact);
        return view('thanks');
    }

    public function admin(){
        $contacts = Contact::with('category')->simplePaginate(10);
        $categories = Category::all();
        return view ('admin', compact('contacts', 'categories'));
    }

    public function destroy(Request $request){
        Contact::find($request->id)->delete();
        return redirect('/admin');
    }

    public function search(Request $request){
        $contacts = Contact::with('category')->FirstNameSearch($request->keyword)->LastNameSearch($request->keyword)->EmailSearch($request->keyword)->GenderSearch($request->gender)->CategorySearch($request->category_id)->CreatedSearch($request->created_at)->get();
        $categories = Category::all();
        return view('admin', compact('contacts', 'categories'));
    }
}

