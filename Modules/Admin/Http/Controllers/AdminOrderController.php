<?php

namespace Modules\Admin\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use App\Order;
use App\User;
use Modules\Admin\Http\Controllers\AdminOrderDetailController;

class AdminOrderController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Response
     */
    public function index()
    {   
        $orders=Order::with('user')->get();
        return view('admin::order.index', compact('orders'));
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
    public function check($id, $index){
        $order=Order::find($id);
        if($index>=1 && $index<=3 && $order->status<$index){
            if($order->status!=2){
                if($index==2){
                    $linkorder_id= new AdminOrderDetailController();
                    $linkorder_id->exportproduct($id); 
                }
                $order->status=$index;
                $order->save();
                return back()->with('msg', 'update order is successful!!')->with('attribute', 'success');
            }
            else{
                return back()->with('msg', 'This order was paid, not changes!!!')->with('attribute', 'warning');
            }
        }
        else{
                return back()->with('msg', 'Check order fails!!!')->with('attribute', 'danger');
            }
        $order->status=1;
        $order->save();
        return back()->with('msg','xác nhận thành công')->with('attribute','success');
    }
}
