<?php

namespace Modules\Admin\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use App\Category;
use App\Slide;
use App\Http\Requests\CreateSlideRequest;
use Illuminate\Support\Facades\File;

class AdminSlideController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Response
     */
    public function index()
    {   $categorylist=Category::with('slides')->where('parent_id',0)->get();
        return view('admin::slide.index', compact('categorylist'));
    }

    /**
     * Show the form for creating a new resource.
     * @return Response
     */
    public function create()
    {   
        $categorylist=Category::where('parent_id', 0)->get();
        return view('admin::slide.create',compact('categorylist'));
    }

    /**
     * Store a newly created resource in storage.
     * @param Request $request
     * @return Response
     */
    public function store(CreateSlideRequest $request)
    {   
        $category_id=$request->only('category_id')['category_id'];
        $image=$request->file('path');
        $newname=$category_id.'.'.time().'.'.$image->getClientOriginalExtension();
        $image->move(public_path("img/slide"), $newname);
        $path='img/slide/'.$newname;
        $data=$request->only('category_id');
        $data['path']=$path;
        Slide::insert($data);
        return back()->with('msg', 'Create slide is successful')->with('attribute', 'success');
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
        //
    }

    /**
     * Remove the specified resource from storage.
     * @param int $id
     * @return Response
     */
    public function destroy($id)
    {
        $slide=Slide::find($id);
        $path=$slide->path;
        if(File::exists($path)){
             File::delete($path);
        }
        $slide->delete();
        $slide->forceDelete();
        return back()->with('msg', 'Deteted item of selected main category')->with('attribute', 'success');
    }
}
