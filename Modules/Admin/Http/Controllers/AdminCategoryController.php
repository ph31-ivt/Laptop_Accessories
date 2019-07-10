<?php

namespace Modules\Admin\Http\Controllers;
use App\Http\Requests\CreateCategory;
use App\Http\Requests\UpdateCategory;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\File;
use App\Category;
use App\Product;
use App\Property;

class AdminCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Response
     */
    public function index($direction=0)
    {   $categorylist=Category::All();
        return view('admin::category.index',compact('categorylist'));
    }

    /**
     * Show the form for creating a new resource.
     * @return Response
     */
    public function create()
    {
        return view('admin::category.create');
    }

    /**
     * Store a newly created resource in storage.
     * @param Request $request
     * @return Response
     */
    public function store(CreateCategory $request)
    {   
        
        $image=$request->file('icon');
        $newname=time().rand(1000,9999).'.'.$image->getClientOriginalExtension();
        $image->move(public_path("img/category"), $newname);
        $path='img/category/'.$newname;
        $data=$request->only('name', 'group');
        $data['icon']=$path;
        Category::insert($data);
        $data=$request->only('properties')['properties'];
            $maxid=Category::max('id');
            for($i=0; $i<count($data); $i++){
              if($data[$i]!=null){
                $properties[$i]['name']=$data[$i];
                $properties[$i]['category_id']=$maxid;
              } 
            }
        if(isset($properties)){
             Property::insert($properties);
            }
        return redirect()->Route('admin.get.listcategory');
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
        $category=Category::find($id);
        $propertylist=Property::where('category_id', $id)->get();
        return view('admin::category.edit', compact('category','propertylist'));
    }

    /**
     * Update the specified resource in storage.
     * @param Request $request
     * @param int $id
     * @return Response
     */
    public function update(UpdateCategory $request, $id)
    {
        //dd($request);
       if($request->hasfile('icon')){
            $old_img_path=Category::find($id)->icon;
            if(File::exists($old_img_path)){
                File::delete($old_img_path);
            }
            $name=$request->file('icon');
            $newname=$id.'.'.time().'.'.$name->getClientOriginalExtension();
            $name->move(public_path("img/category"), $newname);
            $path='img/category/'.$newname;
            $data=$request->only('name');
            $data['icon']=$path;
            $category=Category::find($id);
            $category->update($data);
            
       }
       else{
             $category=Category::find($id);
             $category->name=$request->only('name')['name'];
             $category->save();
       }
       //
       if($request->only('properties')){
            $temp=$request->only('properties','category_id', 'delete');
            for($i=0; $i<count($temp['properties']);$i++){
                if(($temp['properties'][$i]==null)){
                    return back()->with('prt','All cells of properties must be fill')->with('attribute','success')->with('msg','product has been updated');
                }
            }
            for($i=0; $i<count($temp['properties']);$i++){
                $property=Property::find($temp['category_id'][$i]);
                $property->name=$temp['properties'][$i];
                $property->save();
            }
            if(!empty($temp['delete'])){
                for($i=0; $i<count($temp['delete']);$i++){
                    Property::destroy($temp['delete'][$i]);  
                }
            }

       }  
       //
       return back()->with('msg','Update category is successul')->with('attribute', 'success');

    } 

    /**
     * Remove the specified resource from storage.
     * @param int $id
     * @return Response
     */
    public function destroy($id)
    {
        $category=Category::find($id);
        $old_img_path=Category::find($id)->icon;
            if(File::exists($old_img_path)){
                File::delete($old_img_path);
            }
        $category->delete();
        // $category->forceDelete();
        return redirect()->Route('admin.get.listcategory');
    }
}
