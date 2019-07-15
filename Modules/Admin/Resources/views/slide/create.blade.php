@extends('admin::layouts.master')
@section('content')
		 <div class="container-fluid">
                    <!-- Breadcrumbs-->
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item">
                            <a href="#">Dashboard</a>
                        </li>
                        <li class="breadcrumb-item active">Category</li>
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
                                Create Slide
                            </div>
                        </div>
                        <div class="card-body">
                            <form action="{{Route('store-slide-images')}}" method="post" enctype="multipart/form-data">
                                @csrf
                                <div class="row">
                                    @if(count($categorylist)!=0)
                                        <div class="col-md-6 col-sm-12 my-2">
                                            <div class="form-group">
                                                <label for="name" class="text-info font-weight-bold"><i class="fas fa-layer-group mr-2"></i>Choose category<span class="text-danger ml-1">&#42;</span></label>
                                               
                                                    <select name="category_id" class="form-control">
                                                        @foreach($categorylist as $category)
                                                        <option value="{{$category->id}}">{{$category->name}}</option>
                                                        @endforeach
                                                    </select>
                                                    <span class="text-warning font-weight-bold text-capatalizer">{{$errors->first('category_id')}}</span>
                                               
                                            </div>
                                        </div>
                                    @else
                                        <div class="col-md-6 col-sm-12 bg-warning border rounded text-center py-4 my-2">
                                            <p class="font-weight-bold text-white">Create Category before add slide</p>
                                        </div>
                                    @endif
                                    <div class="col-md-6 col-sm-12 my-2">
                                        <div class="form-group">
                                            <div class="row">
                                                <label for="path" class="col-md-10 text-info font-weight-bold"><i class="far fa-file-image mr-1"></i>Upload Slide<span class="text-danger ml-1">&#42;</span></label>
                                                <input type="file" name="path" class="col-md-10">
                                            </div>
                                            <span class="text-warning font-weight-bold text-capatalizer">{{$errors->first('path')}}</span>
                                        </div>    
                                    </div>
                                    <div class="form-group row col-md-12 justify-content-center my-2">
                                        <button type="submit" class="rounded bg-info text-white form-control col-md-2 col-sm-12">Create</button>
                                        <a href="{{Route('show-slide-images')}}" class="rounded bg-secondary text-white form-control col-md-2 col-sm-10 mb-2 text-center">Slide Show</a>
                                    </div>
                                </div>
							</form>
                        </div>
                        <div class="card-footer small text-muted">Updated yesterday at 11:59 PM</div>
                    </div>
                </div>
@endsection