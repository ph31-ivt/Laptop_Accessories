@extends('admin::layouts.master')
@section('content')
<div id="content-wrapper">
    <div class="container-fluid">
        <!-- Breadcrumbs-->
        <ol class="breadcrumb">
            <li class="breadcrumb-item">
                <a href="#">Dashboard</a>
            </li>
            <li class="breadcrumb-item active">Table Order</li>
        </ol>
        <!-- DataTables Example -->
        @if (session('msg'))
            <div class="alert alert-{{session('attribute')}} col-md-12 my-1 text-center">
                {{ session('msg') }}
            </div>
        @endif
        <div class="card mb-3">
            <div class="card-header">
                <div class="card-header row justify-content-between">
                    <div class="col-md-10 col-sm-10"> 
                        <i class="fas fa-cart-arrow-down mr-1"></i>
                        Order list
                    </div>
                </div>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered table-striped" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr class="text-info">
                                <th>Id</th>
                                <th><i class="fas fa-user mr-1"></i>Customer</th>
                                <th><i class="fas fa-phone-square-alt mr-1"></i>Phone</th>
                                <th><i class="fas fa-history mr-1"></i>Order Time</th>
                                <th><i class="fas fa-info-circle mr-1"></i>Status</th>
                                <th><i class="fas fa-money-check-alt mr-1"></i>Total price</th>
                                <th><i class="fas fa-tools mr-1"></i>Action</th>
                            </tr>
                        </thead>
                        <tfoot>
                            <tr class="text-info">
                                <th>Id</th>
                                <th>Customer</th>
                                <th>Phone</th>
                                <th>Order Time</th>
                                <th>Status</th>
                                <th>Total Price</th>
                                <th>Action</th>
                            </tr>
                        </tfoot>
                        <tbody>
                            <?php $i=1; ?>
                           @foreach($orders as $order)
                                <tr class="">
                                    <td class="text-center">{{$i}}</td>
                                    <td class="font-weight-bold text-muted">{{$order->user->name}}</td>
                                    <td class="text-left">{{$order->phone}}</td>
                                    <td>{{$order->created_at}}</td>
                                     @switch($order->status)
                                            @case(0)
                                                    <td class="text-center text-warning font-weight-bold" title="waiting">waiting</td>
                                            @break
                                            @case(1)
                                                    <td class="text-center text-info font-weight-bold" title="checked">Confirm</td>
                                            @break
                                            @case(2)
                                                    <td class="text-center text-success font-weight-bold" title="paid">Paid</td>
                                            @break
                                            @case(3)
                                                    <td class="text-center text-muted font-weight-bold" title="block">Cancelled</td>
                                            @break
                                            @endswitch
                                        <td class="text-center">{{number_format($order->total_price)}}</td>
                                        <td class="row">
                                        <a href="{{Route('check-order',[$order->id,1])}}" class="btn btn-info btn-sm ml-4" title="approve" onclick="return confirm('Do you want to approve this order!')"><i class="fas fa-thumbs-up"></i></a>
                                        <a href="{{Route('check-order',[$order->id,2])}}" class="btn btn-info btn-sm ml-1" title="approve" onclick="return confirm('Do you want to pay this order!')"><i class="far fa-check-circle"></i></a>
                                        <a href="{{Route('get-order-detail', $order->id)}}" class="btn btn-info btn-sm ml-1" title="show detail "><i class="far fa-file-alt"></i></a>
                                        <a href="{{Route('check-order',[$order->id,3])}}" class="btn btn-danger btn-sm ml-1" title="cancel order" onclick="return confirm('Do you want to Cancel this order!')"><i class="fas fa-window-close"></i></a>
                                        
                                    </td>
                                </tr>
                                <?php $i++; ?>
                            @endforeach
                            <script>
                                $(document).ready(function() {
                                    $('#dataTable').DataTable( {
                                     "order": [[ 0, "desc" ]]
                                         } );
                                    } );
                            </script>
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="card-footer small text-muted">Updated yesterday at 11:59 PM</div>
        </div>
    </div>
    <!-- /.container-fluid -->
    <!-- Sticky Footer -->
    <footer class="sticky-footer">
        <div class="container my-auto">
            <div class="copyright text-center my-auto">
                <span>Copyright © Mr.Thinhdang 2019</span>
            </div>
        </div>
    </footer>
</div>
@endsection