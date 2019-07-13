<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\ContactRequest;
use App\Image;
use App\Product;
use App\Contact;

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
        $hot_products = Product::where('status',1)->get();
        $images = Image::all();
        $new_laptop_products = Product::where('category_id',1)->where('status',2)->get();
        $new_computer_products = Product::where('category_id',2)->where('status',2)->get();
        $new_al_products = Product::where('category_id',3)->where('status',2)->get();
        $new_ac_products = Product::where('category_id',4)->where('status',2)->get();

        $laptop_products = Product::where('category_id',1)->where('status',3)->get();
        $computer_products = Product::where('category_id',2)->where('status',3)->get();
        $al_products = Product::where('category_id',3)->where('status',3)->get();
        $ac_products = Product::where('category_id',4)->where('status',3)->get();

        return view('home',compact('hot_products','new_laptop_products','new_computer_products','new_al_products','new_ac_products','laptop_products','computer_products','al_products','ac_products','images'));
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
