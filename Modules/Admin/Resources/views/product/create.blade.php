@extends('admin::layouts.master')
@section('content')
<div class="container-fluid">
    <!-- Breadcrumbs-->
    <ol class="breadcrumb">
        <li class="breadcrumb-item">
            <a href="#">Dashboard</a>
        </li>
        <li class="breadcrumb-item active">Product</li>
    </ol>
    <!-- DataTables Example -->
    <div class="card mb-3">
        <div class="card-header row justify-content-between">
            <div class="col-md-10 col-sm-10"> 
                <i class="fas fa-laptop"></i>
                Product create
            </div>
        </div>
        <div class="card-body">
            <form action="{{Route('product-store')}}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="row">
                    <div class="col-md-7 col-sm-12">
                        <div class="form-group" >
                            <label for="name" class="text-info font-weight-bold"><i class="fas fa-laptop mr-2"></i>Product Name<span class="text-danger ml-1">&#42;</span></label>
                            <input type="text" class="form-control" id="name" name="name" placeholder="Fill name for category" value="{{old('name')}}">
                            <span class="text-danger font-weight-bold text-capitalize">{{$errors->first('name')}}</span>
                        </div>
                        <div class="form-group">
                            <label for="price" class="text-info font-weight-bold"><i class="fas fa-dollar-sign mr-2"></i>Price<span class="text-danger ml-1">&#42;</span></label>
                            <input type="number" class="form-control" id="price" name="price" placeholder="Fill price for unit product" value="{{old('price')}}">
                             <span class="text-danger font-weight-bold text-capitalize">{{$errors->first('price')}}</span>
                        </div>
                        <div class="form-group">
                            <label for="quantity" class="text-info font-weight-bold"><i class="fas fa-database mr-2"></i>Quantity<span class="text-danger ml-1">&#42;</span></label>
                            <input type="number" class="form-control" id="quantity" name="quantity" placeholder="Number of product" value="{{old('quantity')}}">
                             <span class="text-danger font-weight-bold text-capitalize">{{$errors->first('quantity')}}</span>
                        </div>
                        <div class="form-group">
                            <label for="producer" class="text-info font-weight-bold"><i class="fas fa-address-card mr-2"></i>Producer<span class="text-danger ml-1">&#42;</span></label>
                            <input type="text" class="form-control" id="producer" name="producer" placeholder="Number of product" value="{{old('producer')}}">
                             <span class="text-danger font-weight-bold text-capitalize">{{$errors->first('producer')}}</span>
                        </div>
                    </div>
                    <div class="col-md-5 col-sm-12">
                        <div class="form-group">
                            <label for="status" class="text-info font-weight-bold"><i class="fas fa-info-circle mr-2"></i>Status product<span class="text-danger ml-1">&#42;</span></label>
                            <select class="form-control" id="status" name="status" value="{{old('status')}}">
                                <option value="0">--------------</option>
                                <option value="1">Hàng mới</option>
                                <option value="2">Hàng hót</option>
                                <option value="2">Hàng cũ</option>
                            </select>
                             <span class="text-danger font-weight-bold text-capitalize">{{$errors->first('status')}}</span>
                        </div>
                        <div class="form-group">
                            <label for="category_id" class="text-info font-weight-bold"><i class="fas fa-layer-group mr-2"></i>Category<span class="text-danger ml-1">&#42;</span></label>
                            <select class="form-control" id="category_id" name="category_id" value="{{old('category_id')}}">
                                <option>---select category for product----</option>
                                @foreach($categorylist as $category)
                                    <option value="{{$category->id}}">{{$category->name}}</option>
                                @endforeach
                            </select>
                             <span class="text-danger font-weight-bold text-capitalize">{{$errors->first('category_id')}}</span>
                        </div>
                        <div class="form-group">
                            <label for="description" class="text-info font-weight-bold">Description Product</label>
                            <textarea class="form-control" id="description" name="description" rows="4"></textarea>
                            <span class="text-danger font-weight-bold text-capitalize">{{$errors->first('description')}}</span>
                        </div>
                        <div class="form-group">
                            <div class="row">
                                <label for="category_id" class="text-info font-weight-bold"><i class="fas fa-image mr-2"></i>Upload Main Image<span class="text-danger ml-1">&#42;</span></label>
                                <input type="file" name="main_image" class="col-md-10">
                            </div>
                            <span class="text-warning font-weight-bold text-capatalizer">{{$errors->first('main_image')}}</span>
                        </div>
                    </div>
                </div>
                <div class="form-group row col-md-12 justify-content-center">
                    <button type="submit" class="rounded bg-info text-white form-control col-md-2 col-sm-12 mr-4">Save</button>
                    <!-- <a href="{{Route('admin.get.listproduct')}}" class="btn btn-warning">back</a> -->
                </div>
            </form>
        </div>
        <div class="card-footer small text-muted">Updated yesterday at 11:59 PM</div>
    </div>
</div>
@endsection