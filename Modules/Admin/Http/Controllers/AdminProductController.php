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
use App\Promotion;
use App\ProductPromotion;

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

        $maxid=Product::max('id');
        if($maxid==null){
            $maxid=1;
        }
        else{
            $maxid++; 
        }
        $image=$request->file('main_image');
        $newname=$maxid.'.'.time().'.'.$image->getClientOriginalExtension();
        $image->move(public_path("img/product"), $newname);
        $path='img/product/'.$newname;
        $data=$request->except('_token');
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
        $promotions=Promotion::All();
        $promotionlist=ProductPromotion::where('product_id',$id)->get('promotion_id')->pluck('promotion_id')->toArray();
        //dd($promotionlist);
        $properties=Property::where('category_id', $product->category_id)->get();
        $productdetail=ProductDetail::where('product_id',$id)->get()->toArray();
        if(count($productdetail)==0){
            $profile=array();
        }
        else{
            $profile=($productdetail[0]['properties']);
        } 
        return view('admin::product.edit', compact('product','properties','categories','profile','promotions', 'promotionlist'));
    }

    /**
     * Update the specified resource in storage.
     * @param Request $request
     * @param int $id
     * @return Response
     */
    public function update(UpdateProductRequest $request, $id)
    {   
        $this->storepromotion($request->get('promotion_id'), $id);
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
    public function export($listorderdetail){
        foreach ($listorderdetail as $orderdetail) {
            $product=Product::find($orderdetail->product_id);
            if($product->quantity>=$orderdetail->quantity){
                $product->quantity-=$orderdetail->quantity;
                $product->save();
            }
            else{

                return back()->with('msg','Not enough quantity to export')->with('attribute', 'danger');
            }
        }
    }
    public function getproductso(){
        $productlist=Product::with('category')->where('quantity',0)->get();
        return view('admin::product.index', compact('productlist'));
    }
    public function storepromotion($data, $id){
          $product=Product::find($id);
          $product->Promotions()->sync($data);
    }
    public function destroy($id)
    {
        $product=Product::find($id);
        $product->delete();
        //$product->forceDelete();
        return redirect()->Route('admin.get.listproduct');
    }

}
