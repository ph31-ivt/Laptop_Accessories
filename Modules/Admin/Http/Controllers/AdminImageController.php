<?php

namespace Modules\Admin\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use App\Image;
use App\Http\Requests\CreateImageRequest;

class AdminImageController extends Controller
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
    public function create()
    {
        return view('admin::create');
    }

    /**
     * Store a newly created resource in storage.
     * @param Request $request
     * @return Response
     */
    public function store(CreateImageRequest $request, $id)
    {
        if($request->hasfile('images'))
         {   $i=0;
            foreach($request->file('images') as $image)
            {   
                $newname=time().rand(1000,9999).'.'.$image->getClientOriginalExtension();
                $image->move(public_path("img/product"), $newname);
                $path='img/product/'.$newname;
                $data[$i]['path']=$path;
                $data[$i]['product_id']=$id;
                $i++;
            }
            Image::insert($data);
         }
        return back()->with('success', 'Your images has been successfully');
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
        //
    }
}
