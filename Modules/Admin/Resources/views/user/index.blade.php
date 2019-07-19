@extends('admin::layouts.master')
@section('content')
	 <div class="container-fluid">
                    <!-- Breadcrumbs-->
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item">
                            <a href="#">Dashboard</a>
                        </li>
                        <li class="breadcrumb-item active">User Management</li>
                    </ol>
                    @if (session('msg'))
                            <div class="alert alert-{{session('attribute')}} col-md-12 my-1 text-center">
                                {{ session('msg') }}
                            </div>
                    @endif
                    <!-- DataTables Example -->
                    <div class="card mb-3">
                        <div class="card-header row justify-content-between">
                            <div class="col-md-10 col-sm-10"> 
                                <i class="fas fa-table"></i>
                                User list
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered table-striped" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr class="text-info">
                                            <th>Id</th>
                                            <th><i class="fas fa-user-tag mr-1"></i>Name</th>
                                            <th><i class="fas fa-at mr-1"></i>Email</th>
                                            <th><i class="fas fa-tools mr-1"></i>Action</th>
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr class="text-info text-center">
                                            <th>Id</th>
                                            <th>Name</th>
                                            <th>Email</th>
                                            <th>Action</th>
                                            
                                        </tr>
                                    </tfoot>
                                    <tbody>
                                        @foreach($userlist as $user)
											<tr class="" id="{{$user->id}}">
												<td class="text-center">{{$user->id}}</td>
												<td class="font-weight-bold text-muted">{{$user->fullname}}</td>
												<td class="font-italic">{{$user->email}}</td>
												<td class="row  pl-5 text-center">
													<a href="{{Route('edit-user', $user->id)}}" class="btn btn-sm btn-info mr-2"><i class="far fa-edit"></i></a>
													<form action="{{Route('delete-user',$user->id)}}" method="post" onsubmit="return confirm('Deleting this category will delete things related to it! Do you want to delete');">
														@csrf
														@method('DELETE')
														<button type="submit" class="btn btn-sm btn-danger"><i class="fas fa-window-close"></i></a></button>	
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