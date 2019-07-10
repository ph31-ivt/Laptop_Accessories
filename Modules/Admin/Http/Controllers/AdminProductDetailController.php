<?php

namespace Modules\Admin\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use App\Http\Requests\CreateProductDetailRequest;
use App\Product;
use App\ProductDetail;
use App\Image;
use App\Property;

class AdminProductDetailController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Response
     */
    public function index()
    {
        return view('admin::index');
    }

    /**
     * Show the form for creating a new resource.
     * @return Response
     */
    public function create($id)
    {   
        $product=Product::find($id);
        $images=Image::where('product_id', $id)->get();
        $properties=Property::where('category_id',$product->category_id)->get();
        $productdetail=ProductDetail::where('product_id',$id)->get()->toArray();
        if(count($productdetail)==0){
            $profile=array();
            return view('admin::productdetail.create',compact('product','profile','images', 'properties'));
        }
        else{
            $profile=($productdetail[0]['properties']);
            $properties=Property::where('category_id',$product->category_id)->get();
            return view('admin::productdetail.create',compact('product','profile','images', 'properties'));
        } 
    }

    /**
     * Store a newly created resource in storage.
     * @param Request $request
     * @return Response
     */
    public function store(CreateProductDetailRequest $request)
    {   
        //dd($request->except('_token'));
        $productdetail=$request->except('_token');
        $productdetail = ProductDetail::create($request->except('_token'));
        return redirect()->route('admin.create.productdetail', $productdetail->product_id);
    }

    /**
     * Show the specified resource.
     * @param int $id
     * @return Response
     */
    public function show($id)
    {
        return view('admin::show');
    }

    /**
     * Show the form for editing the specified resource.
     * @param int $id
     * @return Response
     */
    public function edit($id)
    {
        return view('admin::edit');
    }

    /**
     * Update the specified resource in storage.
     * @param Request $request
     * @param int $id
     * @return Response
     */
    public function update(Request $request, $id)
    {  
       if(count(ProductDetail::where('product_id',$id)->get())==0){
        return back()->with('result','create details on detail page ');
       }
       else{
        ProductDetail::where('product_id',$id)->first()->update($request->only('_method','product_id','properties'));
       }  
    }

    /**
     * Remove the specified resource from storage.
     * @param int $id
     * @return Response
     */
    public function destroy($id)
    {
        //
    } 
}
