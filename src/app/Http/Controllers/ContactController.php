<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Contact;
use App\Models\Category;

use App\Http\Requests\ContactRequest;

class ContactController extends Controller
{
    public function index() {
        $categories = Category::all();
        return view('index', compact('categories'));
    }//

    public function confirm(ContactRequest $request){
        $contacts = Contact::with('category')->get();
        $tel = $request->tel1.$request->tel2.$request->tel3;
        $category = Category::find($request->category_id);
        $contact = $request->only(['last_name','first_name','gender','email', 'tel1', 'tel2', 'tel3', 'address', 'building', 'detail']);
        return view('confirm', compact('contact','tel', 'category'));
    }

    public function store(Request $request){
        $tel = array("tel"=>$request->tel1.$request->tel2.$request->tel3);
        $category = Category::find($request->category_id);
        
        $contact = $request->only(['last_name','first_name','gender','email', 'address', 'building', 'category_id','detail']);
        Contact::create([
            'category_id' => $category['id'],
            'last_name'  => $contact['last_name'],
            'first_name' =>$contact['first_name'],
            'gender' => $contact['gender'],
            'email' => $contact['email'],
            'tel' => $tel['tel'],
            'address' => $contact['address'],
            'building' => $contact['building'],
            'detail' => $contact['detail']]);
        return view('thanks');
    }

    public function thanks(){
        return view('thanks');
    }

    public function register(){
        return view('auth.register');
    }

    public function login(){
        return view('auth.login');
    }
}
