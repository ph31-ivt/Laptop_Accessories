@extends('admin::layouts.master')
@section('content')
<div class="container-fluid">
    <!-- Breadcrumbs-->
    <ol class="breadcrumb">
        <li class="breadcrumb-item">
            <a href="#">Dashboard</a>
        </li>
        <li class="breadcrumb-item active">Product Detail</li>
    </ol>
    <!-- DataTables Example -->
    @if (session('msg'))
        <div class="alert alert-{{session('attribute')}} col-md-12 my-1 text-center">
            {{ session('msg') }}
        </div>
    @endif
    <div class="card mb-3 p">
        <div class="card-header row justify-content-between">
            <div class="col-md-10 col-sm-10"> 
                <i class="fas fa-laptop"></i>
                Product Detail Create
            </div>
            <div class="col-md-2 col-sm-12 bg-info rounded pt-1 pb-1 text-center">
                <a href="{{Route('admin.get.listproduct')}}" class="text-white">Productlist</a>
            </div>
        </div>
        <div class="border-bottom mr-4 ml-4 mb-4 ">
            <h3 class="text-info font-weight-bold pt-4 pb-4">Product: {{$product->name}}</h3>
        </div>
        <div class="row ml-2 mr-4 my-2">
            <div class="col-md-6 col-sm-12 mx-auto border border-muted rounded text-center">
                <div class="col-md-12 mb-2">
                    <a href="#">
                    <img src="{{asset($product->main_image)}}" alt="fault image" style="width:100%">
                    </a>
                </div>
                <div class="row">
                    @foreach ($images as $image)
                        <div class="col-md-4 mb-2 border border-darked thumbnail rounded">
                            <a href="#">
                                <img src="{{asset($image->path)}}" alt="Lights" style="width:100%" class="">
                                <form action="{{Route('delete-image',$image->id)}}" method="post">
                                    @method('DELETE')
                                    @csrf
                                    <button type="submit" class="btn-sm btn-secondary rounded"><i class="fas fa-trash-alt"></i></button>
                                </form>
                            </a>
                        </div>
                    @endforeach
                </div>
            </div>
            <div class="col-md-5 col-sm-12 border border-muted">
                <h4 class="text-dark border-bottom py-2">Overview:</h4>
                <ul>
                    <li>Name:<b class="ml-3 text-muted">{{$product->name}}</b></li>
                    <li>Price:<b class="ml-3 text-info" >{{number_format($product->price)}}</b></li>
                    <li>Quantity:<b class="ml-3 text-muted">{{$product->quantity}}</b></li>
                    <li>Producer:<b class="ml-3 text-muted">{{$product->producer}}</b></li>
                    <li>Description:<b class="ml-3 text-muted">{{$product->description}}</b></li>
                </ul>
                <div class="row my-0">
                    <button class="btn btn-warning btn-sm mx-auto mb-2"><a href="{{Route('edit-product-info',$product->id)}}" class="text-white">Edit</a></button>
                </div>
                <h4 class="text-dark border-bottom border-top py-2">Detail:</h4>
                @if(count($profile)==0)
                    <div class="alert alert-danger text-center">
                        Create detail for {{$product->name}}
                    </div>
                @endif
                <ul>
                   @for($i=0; $i <count($profile);$i++)
                    <li>{{$profile[$i]['key']}}: <span class="font-weight-bold text-muted">{{$profile[$i]['value']}}</span></li>
                   @endfor
                </ul>
            </div>
        </div>
        <!--  -->
        <div class="col-md-12 border my-2 mx-0 row">
            <div class="col-md-6 col-sm-12 my-2">
               <h4 class="mx-auto">Add images<span class="text-danger ml-1">&#42;</span></h4>
                @if(session('success'))
                    <div class="alert alert-success">
                        {{ session('success') }}
                    </div>
                @endif

                    <form method="post" action="{{Route('store-image', $product->id)}}" enctype="multipart/form-data">
                        {{csrf_field()}}
                        <div class="form-group" >
                            <input type="file" name="images[]" class="form-control mb-1" multiple="multiple">
                             <span class="text-warning font-weight-bold text-capatalizer">{{$errors->first('images')}}
                        </div>
                        <button type="submit" class="btn btn-info my-2">Add Images</button>
                    </form>
                <!--  -->
            </div>
            @if(count($profile)==0)
                <div class="col-md-6 col-sm-12 my-2">
                    <h4 class="mx-auto">Create detail information<span class="text-danger ml-1">&#42;</span></h4>
                    <form action="{{Route('store-product-detail')}}" method="post">
                        <input type="hidden" name="product_id" value="{{$product->id}}">
                        @csrf
                        <?php $i=0; ?>
                        @foreach($properties as $property)
                            <div class="form-group">
                                <label class="text-info font-weight-bold">{{$property->name}}:</label>
                                <input type="hidden" name="properties[{{ $i }}][key]" class="form-control" 
                                                    value="{{$property->name}}">
                                <input type="text" name="properties[{{$i}}][value]" class="form-control" value="">
                            </div>
                        <?php $i++; ?>
                        @endforeach
                        <div class="form-group text-center">
                               <button type="submit" class="btn-success rounded">Create</button> 
                        </div>
                        <!--  -->
                    </form>
                </div>  
            @endif   
        </div>
        <!--  -->
        <div class="card-footer small text-muted">Updated yesterday at 11:59 PM</div>
    </div>
</div>
@endsection