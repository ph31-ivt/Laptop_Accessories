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
                                Category update
                            </div>
                        </div>
                        <div class="card-body">
                            <form action="{{Route('update-category',$category->id)}}" method="post" enctype="multipart/form-data">
                                @csrf
                                @method('PUT')
                                <div class="row">
                                    <div class="form-group col-md-6 col-sm-12">
                                        <label for="name" class="font-weight-bold text-info"><i class="fas fa-layer-group mr-2"></i>Category Name</label>
                                        <input type="text" class="form-control" id="name" name="name" placeholder="Fill name for category" value="{{$category->name}}">
                                        <span class="text-warning font-weight-bold text-capatalizer">{{$errors->first('name')}}</span>
                                        <div class="mt-4">
                                            <label class="text-info font-weight-bold"><i class="fas fa-info-circle mr-1"></i>Change property information</label>
                                        </div>
                                         @if (session('prt'))
                                                <div class="alert alert-danger col-md-12 my-1 text-center">
                                                {{ session('prt') }}
                                                </div>
                                        @endif
                                        <div class="table-responsive">
                                            <table class="table table-bordered" width="100%" cellspacing="0">
                                                <thead>
                                                    <tr class="text-info">
                                                        <th>STT</th>
                                                        <th>Propertise</th>
                                                        <th class="text-danger">Delete</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <?php $i=1; ?>
                                                    @foreach($propertylist as $property)
                                                        <tr>
                                                            <input type="hidden" name="category_id[]" value="{{$property->id}}">
                                                            <td class="text-center">{{$i}}</td>
                                                            <td><input type="text" name="properties[]" value="{{$property->name}}" style="border: 0;"></td> 
                                                            <td><input type="checkbox" name="delete[]" value="{{$property->id}}"><i class="fas fa-trash-alt ml-1"></i></td>
                                                        </tr>
                                                        <?php $i++; ?>
                                                    @endforeach
                                                    @if(count($propertylist)==0)
                                                         <tr> 
                                                            <td colspan="3" class="text-center text-muted font-weight-bold">No data to display</td>
                                                        </tr>
                                                    @endif
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                    <div class="form-group col-md-6 col-sm-12 ">
                                        <div class="form-group">
                                            <label for="parent_id" class="text-info font-weight-bold"><i class="fas fa-code-branch mr-2"></i>Category Branch<span class="text-danger ml-1">&#42;</span></label>
                                            <select class="form-control" id="parent_id" name="parent_id">
                                                <option value="0" class="font-weight-bold text-muted">Main Category</option>
                                                @if(count($listcategory)!=0)
                                                    @foreach($listcategory as $list)
                                                        <option value="{{$list->id}}"
                                                           @if($list->id==$category->parent_id) selected @endif
                                                            >{{$list->name}}</option>
                                                    @endforeach
                                                @endif
                                            </select>
                                             <span class="text-danger font-weight-bold text-capitalize"></span>
                                        </div>
                                        <div class="form-group">
                                            <label for="icon" class="font-weight-bold text-info"><i class="far fa-file-image mr-1"></i>Change icon</label>
                                            <input type="file" name="icon" class="col-md-10" value="{{asset($category->icon)}}
                                            " >
                                        </div>
                                        <span class="text-warning font-weight-bold text-capatalizer">{{$errors->first('icon')}}</span>
                                        <div class="border border-warning rounded mt-4 text-center">
                                            <img src="{{asset($category->icon)}}" style="width: 30vw;">
                                        </div>
                                    </div>
                                </div>
    							  <div class="form-group row col-md-12 justify-content-center">
    							    <button type="submit" class="rounded bg-info text-white form-control col-md-2 col-sm-12 mr-5">Update</button>
    							    <a href="{{Route('admin.get.listcategory')}}" class="btn btn-secondary">Catgory List</a>
    							  </div>
							</form>
                        </div>
                        <div class="card-footer small text-muted">Updated yesterday at 11:59 PM</div>
                    </div>
                </div>
@endsection