<?php

namespace Modules\Admin\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use App\Comment;
use App\User;
use App\Product;

class AdminCommentController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Response
     */
    public function index()
    {
        $commentlist=Comment::with('user', 'product')->get();
        return view('admin::comment.index',compact('commentlist'));
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
    public function store(Request $request)
    {
        //
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
    public function getnewcomment(){

         $commentlist=Comment::with('user', 'product')->where('status',0)->get();
         if(count($commentlist)==0){
            return redirect()->route('admin.get.dashboard');
         }
         return view('admin::comment.index',compact('commentlist'));
    }

    /**
     * Remove the specified resource from storage.
     * @param int $id
     * @return Response
     */
    public function changestatus($id,$index){
       $comment=Comment::find($id);
       if($index>=1 && $index<=3){
            if($index<3){
                $comment->status=$index;
                $comment->save();
                return back()->with('msg', 'update is successful!')->with('attribute', 'success');
            }
            if($index==3){
                $comment->delete();
                return back()->with('msg', 'delete is successful!')->with('attribute', 'danger');
            }
       }
    }
    public function destroy($id)
    {
        //
    }
}
