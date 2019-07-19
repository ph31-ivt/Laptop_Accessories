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
                        <div class="card-header row justify-content-between">
                            <div class="col-md-10 col-sm-10"> 
                                <i class="fas fa-table"></i>
                                Category table
                            </div>
                            <div class="col-md-2 col-sm-12 bg-info rounded pt-1 pb-1 text-center">
                                <a href="{{Route('admin.create.category')}}" class="text-white">Add category</a>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered " id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr class="text-info">
                                            <th>Id</th>
                                            <th><i class="far fa-file-image mr-1"></i>Icon</th>
                                            <th><i class="fas fa-layer-group mr-1"></i>Name</th>
                                            <th><i class="fas fa-tools mr-1"></i>Action</th>
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr class="text-info text-center">
                                            <th>Id</th>
                                            <th>Icon</th>
                                            <th>Name</th>
                                            <th>Action</th>
                                        </tr>
                                    </tfoot>
                                    <tbody>
                                        @foreach($categorylist as $category)
                                            <tr class="" id="{{$category->id}} text-center">
                                                <td class="text-center">{{$category->id}}</td>
                                                <td class="text-center"><img src="{{asset($category->icon)}}" alt="icon fault" style="width: 60px; height: 60px;" class="img-circle"></td>
                                                <td class="text-center font-weight-bold"><a href="{{Route('get.product.ofcategory',$category->id)}}">{{$category->name}}</a></td>
                                                <td class=" pl-4 row mx-auto">
                                                    <a href="{{Route('edit-category', $category->id)}}" class="btn btn-secondary btn-sm ml-4" title="edit category"><i class="far fa-edit"></i></a>
                                                    <form action="{{Route('delete-category',$category->id)}}" method="post" onsubmit="return confirm('Deleting this category will delete things related to it! Do you want to delete');">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit" class="btn btn-danger btn-sm ml-1 " title="delete category"><i class="fas fa-trash-alt"></i></button>   
                                                    </form>
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
                        <div class="card-footer small text-muted">Updated yesterday at 11:59 PM</div>
                    </div>
                </div>
		
@endsection