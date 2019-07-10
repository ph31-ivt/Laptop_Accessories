<?php

namespace Modules\Admin\Http\Controllers;
use App\Product;
use App\ProductDetail;
use App\Property;
use Modules\Admin\Http\Controllers\AdminProductDetailController;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use App\Http\Requests\CreateProductRequest;
use App\Http\Requests\UpdateProductRequest;
use App\Http\Requests\UpdateQuantityRequest;
use Illuminate\Support\Facades\File;
use App\Category;

class AdminProductController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Response
     */
    public function index()
    {   
        $productlist=Product::with('category')->get();
        return view('admin::product.index', compact('productlist'));
    }

    /**
     * Show the form for creating a new resource.
     * @return Response
     */
    public function create()
    {
        $categorylist=Category::All();
         if(count($categorylist)==0){
            return back()->with('msg','Please create a category for product please!')->with('attribute','danger');
        }
        return view('admin::product.create', compact('categorylist'));
    }

    /**
     * Store a newly created resource in storage.
     * @param Request $request
     * @return Response
     */
    public function store(CreateProductRequest $request)
    {   
        $image=$request->file('main_image');
        $newname=time().rand(1000,9999).'.'.$image->getClientOriginalExtension();
        $image->move(public_path("img/product"), $newname);
        $path='img/product/'.$newname;
        $data=$request->except('_token');
        //dd($data);
        $data['main_image']=$path;
        Product::insert($data);
        return redirect()->Route('admin.get.listproduct');  
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
        $product=Product::find($id);
        $categories=Category::All();
        $properties=Property::where('category_id', $product->category_id)->get();
        $productdetail=ProductDetail::where('product_id',$id)->get()->toArray();
        if(count($productdetail)==0){
            $profile=array();
        }
        else{
            $profile=($productdetail[0]['properties']);
        } 
        //dd($profile);
        return view('admin::product.edit', compact('product','properties','categories','profile'));
    }

    /**
     * Update the specified resource in storage.
     * @param Request $request
     * @param int $id
     * @return Response
     */
    public function update(UpdateProductRequest $request, $id)
    {   
        if($request->hasfile('main_image')){
            $old_img_path=Product::find($id)->main_image;
            if(File::exists($old_img_path)){
                File::delete($old_img_path);
            }
            $name=$request->file('main_image');
            $newname=$id.'.'.time().'.'.$name->getClientOriginalExtension();
            $name->move(public_path("img/product"), $newname);
            $path='img/product/'.$newname;
            $data=$request->only('name','price','quantity','producer','status','category_id','description');
            $data['main_image']=$path;
            $product=Product::find($id);
            $product->update($data);
            
       }
       else{
             $product=Product::find($id);
             $data=$request->only('name','price','quantity','producer','status','category_id','description');
             $data['main_image']=$product->main_image;
             $product->update($data);
            
       }
            $transfer= new AdminProductDetailController();
            $transfer->update($request, $id);
            //dd($transfer);
         return back()->with('attribute','success')->with('prt','product has been updated');
        
    }

    /**
     * Remove the specified resource from storage.
     * @param int $id
     * @return Response
     */
    public function addquantity(UpdateQuantityRequest $request){
        $array=$request->only('id');
        $product=Product::find($array['id']);
        $array=$request->only('quantity');
        $product->quantity+=$array['quantity'];
        $product->save();
        return back()->with('msg','Add quantity is successful for '.$product->name)->with('attribute','success');
    }
    public function getdetail($id){
        dd(true);
    }
    public function destroy($id)
    {
        $product=Product::find($id);
        $product->delete();
        $product->forceDelete();
        return redirect()->Route('admin.get.listproduct');
    }
}
