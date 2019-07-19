<?php
    use Illuminate\Support\Facades\Auth;
    $admin=Auth::User()->adminname();
    
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta name="description" content="website management">
        <meta name="author" content="thinhdang">
        <title>Dashboard of admin</title>
        <script src="{{asset('theme_admin/jquery/jquery.min.js')}}"></script>
        <!-- Custom fonts for this template-->
        <link href="{{asset('theme_admin/fontawesome-free/css/all.min.css')}}" rel="stylesheet" type="text/css">
        <!-- Page level plugin CSS-->
        <link href="{{asset('theme_admin/datatables/dataTables.bootstrap4.css')}}" rel="stylesheet">
        <!-- Custom styles for this template-->
        <link href="{{asset('theme_admin/css/sb-admin.css')}}" rel="stylesheet">
        {{-- Laravel Mix - CSS File --}}
        {{-- 
        <link rel="stylesheet" href="{{ mix('css/admin.css') }}">
        --}}
    </head>
    <body id="page-top">
        <nav class="navbar navbar-expand navbar-dark bg-info static-top">
            <a class="navbar-brand mr-1" href="{{Route('home')}}">Laptop Accessories</a>
            <button class="btn btn-link btn-sm text-white order-1 order-sm-0" id="sidebarToggle" href="#">
            <i class="fas fa-bars"></i>
            </button>
            <!-- Navbar Search -->
            <form class="d-none d-md-inline-block form-inline ml-auto mr-0 mr-md-3 my-2 my-md-0">
                <div class="input-group">
                    <input type="text" class="form-control" placeholder="Search for..." aria-label="Search" aria-describedby="basic-addon2">
                    <div class="input-group-append">
                        <button class="btn btn-primary" type="button">
                        <i class="fas fa-search"></i>
                        </button>
                    </div>
                </div>
            </form>
            <!-- Navbar -->
            <ul class="navbar-nav ml-auto ml-md-0">
                <li class="nav-item dropdown no-arrow mx-1">
                    <a class="nav-link dropdown-toggle" href="#" id="alertsDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <i class="fas fa-bell fa-fw"></i>
                    <span class="badge badge-danger ml-0">3+</span>
                    </a>
                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="alertsDropdown">
                        <a class="dropdown-item" href="#">Action</a>
                        <a class="dropdown-item" href="#">Another action</a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="#">Something else here</a>
                    </div>
                </li>
                <li class="nav-item dropdown no-arrow mx-1">
                    <a class="nav-link dropdown-toggle" href="#" id="messagesDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <i class="fas fa-envelope fa-fw"></i>
                    <span class="badge badge-danger ml-0">7</span>
                    </a>
                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="messagesDropdown">
                        <a class="dropdown-item" href="#">Action</a>
                        <a class="dropdown-item" href="#">Another action</a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="#">Something else here</a>
                    </div>
                </li>
                <li class="nav-item dropdown no-arrow">
                    <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <i class="fas fa-user-circle fa-fw ml-0"></i>
                    <span class="badge badge-danger ml-0">5</span>
                    </a>
                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="userDropdown">
                        <a class="dropdown-item" href="#">Admin: {{$admin}}</a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">Logout</a>
                    </div>
                </li>
            </ul>
        </nav>
        <div id="wrapper">
            <!-- Sidebar -->
            <ul class="sidebar navbar-nav">
                <li class="nav-item active">
                    <a class="nav-link" href="{{Route('admin.get.dashboard')}}">
                    <i class="fas fa-fw fa-tachometer-alt"></i>
                    <span>Dashboard</span>
                    </a>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="pagesDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <i class="fas fa-fw fa-inbox"></i>
                    <span>Category</span>
                    </a>
                    <div class="dropdown-menu " aria-labelledby="pagesDropdown">
                        <h5 class="dropdown-header text-info">Category pages</h5>
                        <a class="dropdown-item" href="{{Route('admin.get.listcategory')}}">Overview</a>
                        <a class="dropdown-item" href="{{Route('admin.create.category')}}">Create</a>
                        <div class="dropdown-divider"></div>
                    </div>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="pagesDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <i class="fas fa-fw fa fa-laptop"></i>
                    <span>Product</span>
                    </a>
                    <div class="dropdown-menu" aria-labelledby="pagesDropdown">
                        <h5 class="dropdown-header text-info ">Product pages</h5>
                        <a class="dropdown-item" href="{{Route('admin.get.listproduct')}}">Listproduct</a>
                        <a class="dropdown-item" href="{{Route('admin.create.product')}}">Create</a>
                        <a class="dropdown-item" href="{{Route('admin.get.dashboard')}}">Image</a>
                        <div class="dropdown-divider"></div>
                    </div>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="pagesDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <i class="fas fa-fw fa-users"></i>
                    <span>User</span>
                    </a>
                    <div class="dropdown-menu" aria-labelledby="pagesDropdown">
                        <h5 class="dropdown-header text-info">User pages</h5>
                        <a class="dropdown-item" href="{{Route('admin.get.listuser')}}">User list</a>
                        <a class="dropdown-item" href="{{Route('admin.get.dashboard')}}">Create</a>
                        <div class="dropdown-divider"></div>
                    </div>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="pagesDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <i class="fas fa-fw fa-comment"></i>
                    <span>Comment</span>
                    </a>
                    <div class="dropdown-menu" aria-labelledby="pagesDropdown">
                        <h5 class="dropdown-header text-info">Comment pages</h5>
                        <a class="dropdown-item" href="{{Route('admin.get.listcomment')}}">List commnent</a>
                        <a class="dropdown-item" href="{{Route('admin.get.dashboard')}}">Detail</a>
                        <div class="dropdown-divider"></div>
                    </div>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{Route('admin.get.listorder')}}">
                    <i class="fas fa-fw fa-table"></i>
                    <span>Order</span></a>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="pagesDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <i class="far fa-image"></i>
                    <span>Slide</span>
                    </a>
                    <div class="dropdown-menu" aria-labelledby="pagesDropdown">
                        <h5 class="dropdown-header text-info">Slide pages</h5>
                        <a class="dropdown-item" href="{{Route('create-slide-images')}}">Create</a>
                        <a class="dropdown-item" href="{{Route('show-slide-images')}}">Slide show</a>
                        <div class="dropdown-divider"></div>
                    </div>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="pagesDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <i class="fas fa-ad"></i>
                    <span>Promotion</span>
                    </a>
                    <div class="dropdown-menu" aria-labelledby="pagesDropdown">
                        <h5 class="dropdown-header text-info">Promotion pages</h5>
                        <a class="dropdown-item" href="{{Route('create-promotion')}}">Create</a>
                        <a class="dropdown-item" href="{{Route('get.list.promotion')}}">List promotion</a>
                        <div class="dropdown-divider"></div>
                    </div>
                </li>
            </ul>
            <div id="content-wrapper">
                @yield('content')
                <!-- /.container-fluid -->
                <!-- Sticky Footer -->
                <footer class="sticky-footer">
                    <div class="container my-auto">
                        <div class="copyright text-center my-auto">
                            <span class="text-muted font-weight-bold">Copyright © Mr.Thinh2019</span>
                        </div>
                    </div>
                </footer>
            </div>
            <!-- /.content-wrapper -->
        </div>
        <!-- /#wrapper -->
        <!-- Scroll to Top Button-->
        <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
        </a>
        <!-- Logout Modal-->
        <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
                        <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                        </button>
                    </div>
                    <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
                    <div class="modal-footer">
                        <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                        <a class="btn btn-primary" href="{{Route('logout')}}">Logout</a>
                    </div>
                </div>
            </div>
        </div>
        <!-- Bootstrap core JavaScript-->
        {{-- Laravel Mix - JS File --}}
        {{-- <script src="{{ mix('js/admin.js') }}"></script> --}}
        <script src="{{asset('theme_admin/jquery/jquery.min.js')}}"></script>
        <script src="{{asset('theme_admin/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
        <!-- Core plugin JavaScript-->
        <script src="{{asset('theme_admin/jquery-easing/jquery.easing.min.js')}}"></script>
        <!-- Page level plugin JavaScript-->
        <script src="{{asset('theme_admin/datatables/jquery.dataTables.js')}}"></script>
        <script src="{{asset('theme_admin/datatables/dataTables.bootstrap4.js')}}"></script>
        <!-- Custom scripts for all pages-->
        <script src="{{asset('theme_admin/js/sb-admin.min.js')}}"></script>
        <!-- Demo scripts for this page-->
        <script src="{{asset('theme_admin/js/demo/datatables-demo.js')}}"></script>
    </body>
</html>