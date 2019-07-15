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
                                <i class="fas fa-inbox"></i>
                                Create Promotion
                            </div>
                        </div>
                        <div class="card-body">
                            <form action="{{Route('store-promotion')}}" method="post">
                                @csrf
                                <div class="row">
                                    <div class="col-md-6 col-sm-12 my-2">
                                        <div class="form-group">
                                            <label for="content" class="text-info font-weight-bold"><i class="fas fa-ad mr-2"></i>Add promotion<span class="text-danger ml-1">&#42;</span></label>
                                            <input type="text" name="content" class="form-control">
                                            <span class="text-warning font-weight-bold text-capatalizer">{{$errors->first('content')}}</span>
                                        </div>
                                    </div>
                                    <div class="form-group row col-md-12 justify-content-center my-2">
                                        <button type="submit" class="rounded bg-info text-white form-control col-md-2 col-sm-12">Create</button>
                                        <a href="{{Route('get.list.promotion')}}" class="rounded bg-secondary text-white form-control col-md-2 col-sm-10 mb-2 text-center">Promotion list</a>
                                    </div>
                                </div>
							</form>
                        </div>
                        <div class="card-footer small text-muted">Updated yesterday at 11:59 PM</div>
                    </div>
                </div>
@endsection