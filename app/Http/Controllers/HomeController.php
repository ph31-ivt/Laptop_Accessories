<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\ContactRequest;
use App\Image;
use App\Product;
use App\Contact;
use App\Category;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        // $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $products = Product::all();
        $categories = Category::all();
        return view('home',compact('products','categories'));
    }

    public function about()
    {
        return view('pages.about');
    }

    public function contact()
    {
        return view('pages.contact');
    }

    public function postContact(ContactRequest $request)
    {
        $contacts = new Contact();
        $contacts->fullname = $request->fullname;
        $contacts->email = $request->email;
        $contacts->phone = $request->phone;
        $contacts->subject = $request->subject;
        $contacts->content = $request->content;
        $contacts->save();

        return redirect()->route('home')->with(['flast'=>'success','alert-message'=>'Gửi thành công']);
    }


}
