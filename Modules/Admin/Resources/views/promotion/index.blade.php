@extends('admin::layouts.master')
@section('content')
	 <div class="container-fluid">
                    <!-- Breadcrumbs-->
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item">
                            <a href="#">Dashboard</a>
                        </li>
                        <li class="breadcrumb-item active">Promotion</li>
                    </ol>
                    <!-- DataTables Example -->
                    @if (session('msg'))
                            <div class="alert alert-{{session('attribute')}} col-md-12 my-1 text-center">
                                {{ session('msg') }}
                            </div>
                    @endif
                    <div class="card mb-3">
                        <div class="card-header justify-content-between">
                            <div class="col-md-10 col-sm-10"> 
                                <i class="fas fa-table"></i>
                                    Promtion list
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered " id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr class="text-info">
                                            <th class="text-center">Id</th>
                                            <th><i class="fas fa-file-alt mr-1"></i>Content</th>
                                            <th><i class="far fa-clock mr-1"></i>Created_at</th>
                                            <th><i class="fas fa-tools mr-1"></i>Action</th>
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr class="text-info text-center">
                                            <th class="text-center">Id</th>
                                            <th>Content</th>
                                            <th>Created_at</th>
                                            <th class="text-center">Action</th>
                                        </tr>
                                    </tfoot>
                                    <tbody>
                                       
                                            @foreach($promotionlist as $promotion)
                                             <tr>
                                                 <td class="text-center">{{$promotion->id}}</td>
                                                 <td>{{$promotion->content}}</td>
                                                 <td>{{$promotion->created_at}}</td>
                                                 <td class="text-center">
                                                    <form action="{{Route('delete-promotion',$promotion->id)}}" method="post">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="subtmit" class="btn btn-danger btn-sm rounded"><i class="fas fa-trash-alt"></i></button>
                                                    </form>
                                                </td>
                                            </tr>
                                            @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <div class="card-footer small text-muted">Updated yesterday at 11:59 PM</div>
                    </div>
                </div>
		
@endsection