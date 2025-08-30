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
        $tel = $request->tel1.$request->tel2.$request->tel3;
        $category = Category::find($request->category_id);
        $contact = $request->all();
        return view('confirm', compact('contact','tel', 'category'));
    }

    public function store(Request $request){

        if ($request->has('back')){
            return redirect('/')->withInput();
        }

        Contact::create(
            $request->only([
            'category_id',
            'last_name',
            'first_name',
            'gender',
            'email',
            'tel',
            'address',
            'building',
            'detail'])
        );
        return view('thanks');
    }

}
