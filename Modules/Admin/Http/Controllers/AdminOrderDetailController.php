<?php

namespace Modules\Admin\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use Modules\Admin\Http\Controllers\AdminProductController;
use App\Order;
use App\OrderDetail;
use App\Product;

class AdminOrderDetailController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Response
     */
    public function index($id)
    {   $orderdetails=OrderDetail::with('product')->where('order_id',$id)->get();
        $total=0;
        foreach ($orderdetails as $orderdetail) {
            $total+=$orderdetail->quantity*$orderdetail->product->price;
        }
        return view('admin::orderdetail.index',compact('orderdetails','total'));
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
    public function exportproduct($order_id){
        $orderdetaillist=OrderDetail::where('order_id', $order_id)->get();
        $linkexportproduct= new AdminProductController();
        $linkexportproduct->export($orderdetaillist);
        //sdd($linkexportproduct);
    }
    public function destroy($id)
    {
        //
    }
}
