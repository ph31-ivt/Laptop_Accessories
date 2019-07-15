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
    <div class="card mb-3">
        <div class="card-header justify-content-between">
            <div class="col-md-10 col-sm-10"> 
                <i class="fas fa-inbox"></i>
                Slide Show
            </div>
        </div>
        <div class="card-body">
             @if (session('msg'))
                <div class="alert alert-{{session('attribute')}} col-md-12 my-1 text-center">
                    {{ session('msg') }}
                </div>
            @endif
            <div class="row text-center">
                <!--  -->
                @if(count($categorylist)!=0)
                    @foreach($categorylist as $category)
                        <div class="col-md-5 col-sm-12 border border-darked rounded mx-auto my-2 px-0">
                            <div class="card-header">
                                <p class="font-weight-bold text-muted">{{$category->name}} slide</p>
                            </div>
                            <div id="{{$category->name}}" class="carousel slide bg-secondary" data-ride="carousel">
                                <ol class="carousel-indicators">
                                    <?php $i=0; ?>
                                    @foreach($category->slides as $slide)
                                        <li data-target="#{{$category->name}}" class="bg-secondary" data-slide-to="{{$i}}" class="<?php if($i==0) echo 'active'; else echo null; ?>"></li>
                                        <?php $i++; ?>
                                    @endforeach
                                    
                                </ol>
                                <div class="carousel-inner">
                                    <?php $i=0; ?>
                                    @foreach($category->slides as $slide)
                                        <div class="carousel-item <?php if($i==0) echo 'active'; else echo null; ?>">
                                            <img class="d-block w-100" src="{{asset($slide->path)}}" alt="First slide">
                                            <div class="carousel-caption d-none d-md-block">
                                                <form action="{{Route('delete-slide',$slide->id)}}" method="post">
                                                    @method('DELETE')
                                                    @csrf
                                                    <button type="submit" class="btn-danger btn-sm rounded" ><i class="fas fa-trash-alt"></i></button>
                                                </form>
                                            </div>
                                        </div>
                                    <?php $i++; ?>
                                    @endforeach  
                                </div>
                                <a class="carousel-control-prev" href="#{{$category->name}}" role="button" data-slide="prev">
                                <span class="carousel-control-prev-icon bg-info rounded" aria-hidden="true"></span>
                                <span class="sr-only">Previous</span>
                                </a>
                                <a class="carousel-control-next" href="#{{$category->name}}" role="button" data-slide="next">
                                <span class="carousel-control-next-icon bg-info rounded" aria-hidden="true"></span>
                                <span class="sr-only">Next</span>
                                </a>
                            </div>
                        <!--  -->
                        </div>
                     @endforeach
                @endif
            </div>
        </div>
        <div class="card-footer small text-muted">Updated yesterday at 11:59 PM</div>
    </div>
</div>
@endsection