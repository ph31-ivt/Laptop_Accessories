@extends('admin::layouts.master')
@section('content')
<div id="content-wrapper">
    <div class="container-fluid">
        <!-- Breadcrumbs-->
        <ol class="breadcrumb">
            <li class="breadcrumb-item">
                <a href="#">Dashboard</a>
            </li>
            <li class="breadcrumb-item active">Order detail table</li>
        </ol>
        <!-- DataTables Example -->
        <div class="card mb-3">
            <div class="card-header">
                <div class="card-header row justify-content-between">
                    <div class="col-md-10 col-sm-10"> 
                        <i class="fas fa-cart-arrow-down mr-1"></i>
                        Order: 
                    </div>
                </div>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr class="text-info">
                                <th>Id</th>
                                <th><i class="fas fa-user mr-1"></i>Product</th>
                                <th><i class="fas fa-phone-square-alt mr-1"></i>Quantity</th>
                                <th><i class="fas fa-history mr-1"></i>Unit price</th>
                                <th><i class="fas fa-info-circle mr-1"></i>Discount</th>
                                <th><i class="fas fa-money-check-alt mr-1"></i>Total price</th>
                                <th><i class="fas fa-tools mr-1"></i>Action</th>
                            </tr>
                        </thead>
                        <tfoot>
                            <tr class="text-muted font-weight-bold">
                                <th colspan="2" class="text-center">Total</th>
                                <th colspan="5" class="text-center">{{number_format($total)}} đ</th>
                                
                            </tr>
                        </tfoot>
                        <tbody>
                           @foreach($orderdetails as $orderdetail)
                                <tr class="">
                                    <td class="text-center">{{$orderdetail->id}}</td>
                                    <td class="font-weight-bold text-muted">{{$orderdetail->product->name}}</td>
                                    <td class="text-left">{{$orderdetail->quantity}}</td>
                                    <td>{{number_format($orderdetail->product->price)}} đ</td>
                                    <td class="text-center">{{0}}</td>
                                    <td class="text-center"><?php $total=($orderdetail->quantity)*($orderdetail->product->price);
                                     ?>{{number_format($total)}} đ</td>
                                        
                                    <td class="row">
                                        <a href="" class="btn btn-danger btn-sm ml-1 ml-4"><i class="fas fa-window-close"></i></a>
                                    </td>
                                </tr>
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
                <span>Copyright © Thinhdang 2019</span>
            </div>
        </div>
    </footer>
</div>
@endsection