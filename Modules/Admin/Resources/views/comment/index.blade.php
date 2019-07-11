@extends('admin::layouts.master')
@section('content')
<div id="content-wrapper">
    <div class="container-fluid">
        <!-- Breadcrumbs-->
        <ol class="breadcrumb">
            <li class="breadcrumb-item">
                <a href="#">Dashboard</a>
            </li>
            <li class="breadcrumb-item active">Tables</li>
        </ol>
         <!-- DataTables Example -->
            @if (session('msg'))
                <div class="alert alert-{{session('attribute')}} col-md-12 my-1 text-center">
                    {{ session('msg') }}
                </div>
            @endif
        <!-- DataTables Example -->
        <div class="card mb-3">
            <div class="card-header">
                <div class="card-header row justify-content-between">
                    <div class="col-md-10 col-sm-10"> 
                        <i class="fas fa-table"></i>
                        Comment list
                    </div>
                </div>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered table-striped" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr class="text-info text-center">
                                <th data-sortable="true">Id</th>
                                <th>Customer</th>
                                <th>tittle</th>
                                <th>Content</th>
                                <th>Status</th>
                                <th>Product</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tfoot>
                            <tr class="text-info text-center">
                                <th>Id</th>
                                <th>Customer</th>
                                <th>Tittle</th>
                                <th>Content</th>
                                <th>Status</th>
                                <th>Product</th>
                                <th style="width: 12%;">Action</th>
                            </tr>
                        </tfoot>
                        <tbody>
                            @foreach($commentlist as $comment)
                            <tr>
                                <td class="text-center" id="product_id">{{$comment->id}}</td>
                                <td class="font-weight-bold text-muted">{{$comment->user->name}}</td>
                                <td >{{$comment->title}}</td>
                                <td >{{$comment->content}}</td>
                                @switch($comment->status)
                                @case(0)
                                <td class="text-center" title="waiting"><button class="btn btn-info btn-sm">waiting</button></td>
                                @break
                                @case(1)
                                <td class="text-center" title="checked"><button class="btn btn-success btn-sm">checked</td>
                                @break
                                @case(2)
                                <td class="text-center" title="block"><button class="btn btn-secondary btn-sm">locked</button></td>
                                @break
                                @endswitch
                                <td>{{$comment->product->name}}</td>
                                <td class="text-center">
                                    <a href="{{route('update-status',[$comment->id,1])}}" class="btn-sm btn-success rounded"><i class="fas fa-check-circle"></i></a>
                                    <a href="{{route('update-status',[$comment->id,2])}}" class="btn-sm btn-secondary rounded"><i class="fas fa-lock"></i></a>
                                    <a href="{{route('update-status',[$comment->id,3])}}" class="btn-sm btn-danger rounded" onclick="return confirm('Are you sure delete this comment?')"><i class="fas fa-trash-alt"></i></a>
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
            <div class="card-footer small text-muted">Updated at {{$comment->updated_at}}</div>
        </div>
    </div>
    <!-- /.container-fluid -->
    <!-- Sticky Footer -->
    <footer class="sticky-footer">
        <div class="container my-auto">
            <div class="copyright text-center my-auto">
                <span>Copyright © Your Website 2019</span>
            </div>
        </div>
    </footer>
</div>
@endsection