<?php

namespace Modules\Admin\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use App\Comment;
use App\Order;
use App\User;
use App\UserProfile;
use App\Product;

class AdminDashboardController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Response
     */
    public function __construct(){
        
         $this->middleware('auth');
    }
    public function index()
    {   $newcomments=Comment::where('status', 0)->get();
        $commentnum=count($newcomments);
        $ordernotcompleted=Order::where('status','<',2)->get();
        $userprofile=UserProfile::All();
        $users=User::All();
        $notprofilenum= count($users)-count($userprofile);
        $productsempty=Product::where('quantity',0)->get();
        $productsemptynum=count($productsempty);
        return view('admin::dashboard.index', compact('commentnum','ordernotcompleted','notprofilenum','productsemptynum'));
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
