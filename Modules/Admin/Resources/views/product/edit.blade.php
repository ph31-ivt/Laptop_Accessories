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
                Product Edit
            </div>
        </div>
        <div class="card-body">
            <div class="col-sm-12 text-center text-info">
                <h3>{{$product->name}}</h3>
            </div>
            @if (session('prt'))
            <div class="alert alert-success col-md-12 my-1 text-center">
                {{ session('prt') }}
            </div>
            @endif
            <form action="{{Route('update-product', $product->id)}}" method="post" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="row">
                    <!--  -->
                    <div class="col-md-7 col-sm-12">
                        <div class="form-group" >
                            <label for="name" class="text-info font-weight-bold"><i class="fas fa-laptop mr-2"></i>Product Name<span class="text-danger ml-1">&#42;</span></label>
                            <input type="text" class="form-control" id="name" name="name" placeholder="Fill name for category" value="{{$product->name}}">
                            <span class="text-danger font-weight-bold text-capitalize">{{$errors->first('name')}}</span>
                        </div>
                        <div class="form-group">
                            <label for="price" class="text-info font-weight-bold"><i class="fas fa-dollar-sign mr-2"></i>Price<span class="text-danger ml-1">&#42;</span></label>
                            <input type="number" class="form-control" id="price" name="price" placeholder="Fill price for unit product" value="{{$product->price}}">
                            <span class="text-danger font-weight-bold text-capitalize">{{$errors->first('price')}}</span>
                        </div>
                        <div class="form-group">
                            <label for="quantity" class="text-info font-weight-bold"><i class="fas fa-database mr-2"></i>Quantity<span class="text-danger ml-1">&#42;</span></label>
                            <input type="number" class="form-control" id="quantity" name="quantity" placeholder="Number of product" value="{{$product->quantity}}">
                            <span class="text-danger font-weight-bold text-capitalize">{{$errors->first('quantity')}}</span>
                        </div>
                        <div class="form-group">
                            <label for="producer" class="text-info font-weight-bold"><i class="fas fa-address-card mr-2"></i>Producer<span class="text-danger ml-1">&#42;</span></label>
                            <input type="text" class="form-control" id="producer" name="producer" placeholder="Number of product" value="{{$product->producer}}">
                            <span class="text-danger font-weight-bold text-capitalize">{{$errors->first('producer')}}</span>
                        </div>
                        <div class="form-group">
                            <label for="product_type" class="text-info font-weight-bold"><i class="fas fa-code-branch mr-2"></i>Product type<span class="text-danger ml-1">&#42;</span></label>
                            <input type="text" class="form-control" id="product_type" name="product_type" placeholder="Fill type for product" value="{{$product->product_type}}">
                            <span class="text-danger font-weight-bold text-capitalize">{{$errors->first('product_type')}}</span>
                        </div>
                    </div>
                    <!--  -->
                    <!--  -->
                    <div class="col-md-5 col-sm-12">
                       
                        <div class="form-group">
                            <label for="status" class="text-info font-weight-bold"><i class="fas fa-info-circle mr-2"></i>Status product<span class="text-danger ml-1">&#42;</span></label>
                            <select class="form-control" id="status" name="status">
                                <option value="1">Hàng mới</option>
                                <option value="2">Hàng hot</option>
                                <option value="3">Hàng cũ</option>
                            </select>
                            <span class="text-danger font-weight-bold text-capitalize"></span>
                        </div>
                        <div class="form-group">
                            <label for="category_id" class="text-info font-weight-bold"><i class="fas fa-layer-group mr-2"></i>Category<span class="text-danger ml-1">&#42;</span></label>
                            <select class="form-control" id="category_id" name="category_id" value="">
                                <option>---select category for product----</option>
                                @foreach($categories as $category)
                                <option value="{{$category->id}}" {{$category->id==$product->category_id ? 'selected':''}}>{{$category->name}}</option>
                                @endforeach
                            </select>
                            <span class="text-danger font-weight-bold text-capitalize"></span>
                        </div>
                        <div class="form-group">
                            <label for="description" class="text-info font-weight-bold"><i class="fas fa-info-circle mr-2"></i>Description Product</label>
                            <textarea class="form-control" id="description" name="description" rows="4">{{$product->description}}</textarea>
                            <span class="text-danger font-weight-bold text-capitalize"></span>
                        </div>
                    </div>
                    <!--  -->
                    <!--  -->
                      <div class="col-md-7 col-sm-12">
                        <div class="form-group">
                            <label for="" class="text-info font-weight-bold"><i class="fas fa-image mr-2"></i>Change main image</label>
                            <div class="col-md-8 col-sm-12 text-center border border muted mx-auto my-2">
                                <img src="{{asset($product->main_image)}}" alt="failure" style="width: 90%;">
                            </div>
                            <input type="file" name="main_image" class="col-md-10">
                            <span class="text-warning font-weight-bold text-capatalizer"></span>
                        </div>
                    </div>
                    <!--  -->
                    <!--  -->
                 
                    <div class="col-md-5 col-sm-12">
                        <div>
                            <label class="text-info font-weight-bold"><i class="fas fa-info-circle mr-2"></i>Change detail information<span class="text-danger ml-1">&#42;</span></label>
                        </div>
                        @if (session('result'))
                            <div class="alert alert-danger col-md-12 my-1 text-center">
                                {{ session('result') }}
                            </div>
                        @endif
                        <div>
                            <input type="hidden" name="product_id" value="{{$product->id}}">
                            <?php $i=0; $j=0; ?>
                            @foreach($properties as $property)
                            <div class="form-group">
                                <label class="text-info font-weight-bold">{{$property->name}}:</label>
                                <input type="hidden" name="properties[{{ $i }}][key]" class="form-control" 
                                    value="{{$property->name}}">
                                @if(count($profile)!=0 && !empty($profile[$j]['key']))
                                    @if($profile[$j]['key']==$property->name)
                                        <input type="text" name="properties[{{$i}}][value]" class="form-control" value="{{$profile[$j]['value']}}">
                                        <?php $j++; ?>
                                    @else
                                        <input type="text" name="properties[{{$i}}][value]" class="form-control" value="">
                                    @endif   
                                @else 
                                    <input type="text" name="properties[{{$i}}][value]" class="form-control" value="">
                                @endif
                            </div>
                            <?php $i++; ?>
                            @endforeach
                        </div>
                    </div>
                    <!--  -->
                   
                    <!--  -->
                    <div class="form-group row col-md-12 justify-content-center">
                        <button type="submit" class="rounded bg-info text-white form-control col-md-2 col-sm-10 mb-2">Save change</button>
                        <a href="{{Route('admin.get.listproduct')}}" class="rounded bg-secondary text-white form-control col-md-2 col-sm-10 mb-2 text-center">Back</a>
                    </div>
                    <!--  -->
                </div>
            </form>
        </div>
        <div class="card-footer small text-muted">Updated yesterday at 11:59 PM</div>
    </div>
</div>
@endsection