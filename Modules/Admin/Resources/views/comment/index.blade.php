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
        <!-- DataTables Example -->
        <div class="card mb-3">
            <div class="card-header">
                <div class="card-header row justify-content-between">
                    <div class="col-md-10 col-sm-10"> 
                        <i class="fas fa-table"></i>
                        Comment list
                    </div>
                </div>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered table-striped" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr class="text-info text-center">
                                <th data-sortable="true">Id</th>
                                <th>Customer</th>
                                <th>tittle</th>
                                <th>Content</th>
                                <th>Status</th>
                                <th>Product</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tfoot>
                            <tr class="text-info text-center">
                                <th>Id</th>
                                <th>Customer</th>
                                <th>Tittle</th>
                                <th>Content</th>
                                <th>Status</th>
                                <th>Product</th>
                                <th>Action</th>
                            </tr>
                        </tfoot>
                        <tbody>
                            @foreach($commentlist as $comment)
                            <tr>
                                <td class="text-center" id="product_id">{{$comment->id}}</td>
                                <td class="font-weight-bold text-muted">{{$comment->user->name}}</td>
                                <td >{{$comment->title}}</td>
                                <td >{{$comment->content}}</td>
                                @switch($comment->status)
                                @case(0)
                                <td class="text-center" title="waiting"><button class="btn btn-info btn-sm"><i class="fas fa-pause-circle"></i></button></td>
                                @break
                                @case(1)
                                <td class="text-center" title="checked"><button class="btn btn-success btn-sm"><i class="fas fa-check-circle"></i></button></td>
                                @break
                                @case(2)
                                <td class="text-center" title="block"><button class="btn btn-secondary btn-sm"><i class="fas fa-stop-circle"></i></button></td>
                                @break
                                @endswitch
                                <td>{{$comment->product->name}}</td>
                                <td class="text-center">
                                    <button type="button" class="btn btn-info btn-sm ml-2" id="edit-item" data-comment_id="{{$comment->id}}">Check</button>
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
            <div class="card-footer small text-muted">Updated at {{$comment->updated_at}}</div>
            <!-- Attachment Modal -->
            <div class="modal fade" id="add-modal" tabindex="-1" role="dialog" aria-labelledby="edit-modal-label" aria-hidden="true">
                <div class="modal-dialog modal-sm" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <div class="col-10">
                                 <p class="modal-title text-info font-weight-bold ">Check comment</p>
                            </div>
                            <div class="col-2">
                                <button type="button" class="close tex-right" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span>
                            </button>
                            </div> 
                        </div>
                        <div class="modal-body" id="attachment-body-content">
                            <a  href="" class="btn-sm btn-success rounded mx-1">Pass</a>
                            <a href="" class="btn-sm btn-secondary rounded mx-1">Block</a>
                            <a href="" class="btn-sm btn-danger rounded mx-1">Delete</a>
                            <a href="" class="btn-sm btn-warning rounded mx-1">Back</a>

                        </div>
                        <div class="modal-footer">
                           <small class="text-muted font-weight-bold">Click buttons to check</small>
                        </div>
                    </div>
                </div>

            </div>
            <!-- /Attachment Modal -->
            <script type="text/javascript">
              $(document).ready(function() {
                  $(document).on('click', "#edit-item", function() {
                    $(this).addClass('edit-item-trigger-clicked'); 
                    var options = {
                      'backdrop': 'static'
                    };
                    $('#add-modal').modal(options)
                  });
                  // on modal show
                  $('#add-modal').on('show.bs.modal', function() {
                    var el = $(".edit-item-trigger-clicked");
                    var row = el.closest(".data-row");
                    // // get the data
                    var id = el.data('comment_id');
                    // var route='{{route('update-status-comment',1)}}';
                    // var image = ($("."+id).attr("src"));
                    // // fill the data in the input fields
                    // document.getElementById("productname").innerHTML = name;
                    // document.getElementById("producttittle").innerHTML = name;
                    // $("#imagepreview").attr("src",image);
                    // $("#id").attr("value",id);
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