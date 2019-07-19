@extends('admin::layouts.master')
@section('content')
<div id="content-wrapper">
    <div class="container-fluid">
        <!-- Breadcrumbs-->
        <ol class="breadcrumb">
            <li class="breadcrumb-item">
                <a href="#">Dashboard</a>
            </li>
            <li class="breadcrumb-item active">Tables</li>
        </ol>
         @if (session('msg'))
                    <div class="alert alert-{{session('attribute')}} col-md-12 my-1 text-center">
                    {{ session('msg') }}
                    </div>
        @endif
        <!-- DataTables Example -->
        <div class="card mb-3">
            <div class="card-header">
                <div class="card-header row justify-content-between">
                    <div class="col-md-10 col-sm-10"> 
                        <i class="fas fa-table"></i>
                        Product list
                    </div>
                    <div class="col-md-2 col-sm-12 bg-info rounded pt-1 pb-1 text-center">
                        <a href="{{Route('admin.create.product')}}" class="text-white">Create Product</a>
                    </div>
                </div>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr class="text-info">
                                <th data-sortable="true">Id</th>
                                <th><i class="fas fa-laptop mr-1"></i>Name</th>
                                <th><i class="far fa-image mr-1"></i>Image</th>
                                <th><i class="fas fa-donate mr-1"></i>Price</th>
                                <th><i class="fas fa-database mr-1"></i>Quantity</th>
                                <th><i class="fas fa-layer-group mr-1"></i>Category</th>
                                <th><i class="fas fa-tools mr-1"></i>Action</th>
                            </tr>
                        </thead>
                        <tfoot>
                            <tr class="text-info text-center">
                                <th>Id</th>
                                <th>Name</th>
                                <th>Image</th>
                                <th>Price</th>
                                <th>Quantity</th>
                                <th>Category</th>
                                <th>Action</th>
                            </tr>
                        </tfoot>
                        <tbody>
                            @foreach($productlist as $product)
                                <tr>
                                    <td class="text-center" id="product_id">{{$product->id}}</td>
                                    <td class="font-weight-bold text-muted" id="{{$product->id}}">{{$product->name}}</td>
                                    <td class="text-center"><img src="{{asset($product->main_image)}}" alt="failure" style="width: 60px; height: 60px;" class="img-circle {{$product->id}}"></td>
                                    <td id="{{$product->price}}">{{number_format($product->price)}} đ</td>
                                    <td class="text-center">{{$product->quantity}}</td>
                                    <td class="font-weight-bold"><a href="{{Route('get.product.ofcategory',$product->category->id)}}" class="text-decoration-none">{{$product->category->name}}</a></td>
                                    <td class="row">
                                        <button type="button" class="btn btn-info btn-sm ml-2" id="edit-item" data-product_id="{{$product->id}}" title="Import quantity for product"><i class="fas fa-plus-circle"></i></button>
                                        <a href="{{Route('admin.create.productdetail',$product->id)}}" class="btn btn-info btn-sm ml-1" title="show product and create detail "><i class="far fa-file-alt"></i></a>
                                        <a href="{{Route('edit-product-info',$product->id)}}" class="btn btn-secondary btn-sm ml-1"><i class="fas fa-pencil-alt" title="update"></i></a>
                                        <form action="{{Route('delete-product', $product->id)}}" method="post" 
                                            onsubmit="return confirm('Deleting this product will delete things related to it! Do you want to delete');">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" id="{{$product->id}}" class="btn btn-danger btn-sm ml-1" title="delete"><i class="fas fa-trash-alt"></i></button>   
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
            <div class="card-footer small text-muted">Updated</div>
        </div>
        <!--  -->
        <!-- Attachment Modal -->
        <div class="modal fade" id="add-modal" tabindex="-1" role="dialog" aria-labelledby="edit-modal-label" aria-hidden="true">
          <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h4 class="modal-title text-info font-weight-bold text-center">Import Product</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span>
                </button>
              </div>
              <div class="modal-body" id="attachment-body-content">
                <form id="addform" class="form-horizontal" method="POST" action="{{route('add-quantity')}}">
                    @csrf
                  <div class="card text-info  mb-0">
                    <div class="card-header">
                      <h4 class="m-0" id="producttittle"></h4>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-sm-12 col-md-6 border border-muted rounded mx-2 my-2 ">
                                <div class="form-group">
                                    <label for="quantity" class="font-weight-bold">Add quantity for product</label>
                                    <input type="number" min="0" max="100" value="1" class="form-control" id="quantity" name="quantity" >
                                </div>
                                <div class="text-center mx-20">
                                    <input type="hidden" name="id" id="id">
                                    <button type="submit" class="btn btn-sm btn-info btn-rounded ">Save</button>
                                </div>
                            </div>
                            <div class="col-sm-12 col-md-5 border border-muted rounded mx-2 my-2">
                                <div>
                                    <label class="text-info font-weight-bold" id="productname">
                                        
                                    </label>
                                </div>
                                <div>
                                    <div class="modal-body">
                                        <img src="" id="imagepreview" style="width: 100%;" alt="image fault">
                                    </div>
                                </div>
                            </div>

                        </div>  
                    </div>
                  </div>
                </form>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
              </div>
            </div>
          </div>
        </div>
        <!-- /Attachment Modal -->
        <script type="text/javascript">
          $(document).ready(function() {
              $(document).on('click', "#edit-item", function() {
                $(this).addClass('edit-item-trigger-clicked'); //useful for identifying which trigger was clicked and consequently grab data from the correct row and not the wrong one.
                var options = {
                  'backdrop': 'static'
                };
                $('#add-modal').modal(options)
              });
              // on modal show
              $('#add-modal').on('show.bs.modal', function() {
                var el = $(".edit-item-trigger-clicked"); // See how its usefull right here? 
                var row = el.closest(".data-row");
                // get the data
                var id = el.data('product_id');
                var name = $("#"+id).text();
                var image = ($("."+id).attr("src"));
                // fill the data in the input fields
                document.getElementById("productname").innerHTML = name;
                document.getElementById("producttittle").innerHTML = name;
                $("#imagepreview").attr("src",image);
                $("#id").attr("value",id);
              });

              // on modal hide
                $('#add-modal').on('hide.bs.modal', function() {
                $('.edit-item-trigger-clicked').removeClass('edit-item-trigger-clicked')
                $("#edit-form").trigger("reset");
              });
            });
        </script>
        <!--  -->
    </div>
    <!-- /.container-fluid -->
    <!-- Sticky Footer -->
    <footer class="sticky-footer">
        <div class="container my-auto">
            <div class="copyright text-center my-auto">
                <span>Copyright © Your Website 2019</span>
            </div>
        </div>
    </footer>
</div>
@endsection