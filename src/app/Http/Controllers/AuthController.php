<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Http\Requests\AuthRequest;
use App\Http\Requests\LoginRequest;
use App\Models\Contact;
use App\Models\Category;

class AuthController extends Controller
{
    //
    public function index(){
        return view('admin');
    }

    public function create(AuthRequest $request)
    {
        $register = $request->all();
        User::create($register);
        return redirect('/login');
    }

    public function login(LoginRequest $request)
    {
        $contacts = Contact::all();
        $categories = Category::all();
        $credentials = $request->all();
        return view('admin',compact('contacts', 'categories'));

        return back()->withErrors($message);
    }

    public function search(Request $request)
    {
        $contacts = Contact::with('category')->KeywordSearch($request->keyword)->get();
        $categories = Category::all();

        return view('admin', compact('contacts', 'categories'));
    }
}
