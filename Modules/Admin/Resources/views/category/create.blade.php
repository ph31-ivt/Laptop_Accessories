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
                        <div class="card-header row justify-content-between">
                            <div class="col-md-10 col-sm-10"> 
                                <i class="fas fa-inbox"></i>
                                Category create
                            </div>
                        </div>
                        <div class="card-body">
                            <form action="{{Route('category-store')}}" method="post" enctype="multipart/form-data">
                                @csrf
                                <div class="row">
                                    <div class="col-md-6 col-sm-12">
                                        <div class="form-group">
                                            <label for="name" class="text-info font-weight-bold"><i class="fas fa-layer-group mr-2"></i>Category Name<span class="text-danger ml-1">&#42;</span></label>
                                            <input type="text" class="form-control" id="name" name="name" placeholder="Fill name for category" value="{{old('name')}}">
                                            <span class="text-warning font-weight-bold text-capatalizer">{{$errors->first('name')}}</span>
                                        </div>
                                        <div class="form-group">
                                            <label for="parent_id" class="text-info font-weight-bold"><i class="fas fa-code-branch mr-2"></i>Category Branch<span class="text-danger ml-1">&#42;</span></label>
                                            <select class="form-control" id="parent_id" name="parent_id">
                                                <option value="0" class="font-weight-bold text-muted">Main Category</option>
                                                @if(count($listcategory)!=0)
                                                    @foreach($listcategory as $list)
                                                        <option value="{{$list->id}}">{{$list->name}}</option>
                                                    @endforeach
                                                @endif
                                            </select>
                                             <span class="text-danger font-weight-bold text-capitalize"></span>
                                        </div>
                                        <div class="form-group">
                                            <div class="row">
                                                <label for="name" class="col-md-10 text-info font-weight-bold"><i class="far fa-file-image mr-1"></i>Upload icon<span class="text-danger ml-1">&#42;</span></label>
                                                <input type="file" name="icon" class="col-md-10">
                                            </div>
                                            <span class="text-warning font-weight-bold text-capatalizer">{{$errors->first('icon')}}</span>
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-sm-12">
                                         <!--  -->
                                            <div>
                                                <label class="text-info font-weight-bold"><i class="fas fa-info-circle mr-1"></i>Add Properties for category</label>
                                            </div>
                                            <div class="table-responsive">
                                                <span class="text-warning font-weight-bold text-capatalizer">{{$errors->first('properties.*')}}</span>
                                                <table class="table table-bordered table-striped" id="user_table">
                                                        <thead>
                                                        <tr class="text-center text-info font-weight-bold">
                                                            <th width="75%">Properties</th>
                                                            <th width="15%">Action</th>
                                                        </tr>
                                                        </thead>
                                                        <tbody>
                                                        </tbody>
                                                </table>
                                            </div>
                                            <script>
                                                $(document).ready(function(){
                                                 var count = 1;
                                                 dynamic_field(count);
                                                 function dynamic_field(number)
                                                 {
                                                  html = '<tr>';
                                                        html += '<td><input type="text" name="properties[]" class="form-control" /></td>';
                                                        if(number > 1)
                                                        {
                                                            html += '<td><button type="button" name="remove" id="" class="btn btn-danger remove"><i class="fas fa-minus-circle"></i></button></td></tr>';
                                                            $('tbody').append(html);
                                                        }
                                                        else
                                                        {   
                                                            html += '<td class="text-center"><button type="button" name="add" id="add" class="btn btn-success"><i class="fas fa-plus-circle"></i></button></td></tr>';
                                                            $('tbody').html(html);
                                                        }
                                                 }
                                                 $(document).on('click', '#add', function(){
                                                  count++;
                                                  dynamic_field(count);
                                                 });
                                                 $(document).on('click', '.remove', function(){
                                                  count--;
                                                  $(this).closest("tr").remove();
                                                 });
                                                });
                                            </script>
                                         <!--  -->
                                    </div>
                                    <div class="form-group row col-md-12 justify-content-center">
                                        <button type="submit" class="rounded bg-info text-white form-control col-md-2 col-sm-12">Create</button>
                                        <a href="{{Route('admin.get.listcategory')}}" class="rounded bg-secondary text-white form-control col-md-2 col-sm-10 mb-2 text-center">Category List</a>
                                    </div>
                                </div>
							</form>
                        </div>
                        <div class="card-footer small text-muted">Updated yesterday at 11:59 PM</div>
                    </div>
                </div>
@endsection