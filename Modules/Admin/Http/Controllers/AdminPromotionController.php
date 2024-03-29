<?php

namespace Modules\Admin\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use App\Http\Requests\CreatePromotionRequest;
use App\Promotion;

class AdminPromotionController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Response
     */
    public function index()
    {   
        $promotionlist=Promotion::All();
        return view('admin::promotion.index', compact('promotionlist'));
    }

    /**
     * Show the form for creating a new resource.
     * @return Response
     */
    public function create()
    {
        return view('admin::promotion.create');
    }

    /**
     * Store a newly created resource in storage.
     * @param Request $request
     * @return Response
     */
    public function store(CreatePromotionRequest $request)
    {
       $newpromotion=$request->only('content');
       Promotion::create($newpromotion);
       return back()->with('msg', 'Create promotion is successful')->with('attribute', 'success');
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
        $promotion= Promotion::find($id);
        $promotion->delete();
        $promotion->forceDelete();
        return back()->with('msg','delete promotion is successfull!')->with('attribute', 'success');
    }
}
