@extends('admin::layouts.master')
@section('content')
<div class="container-fluid">
    <!-- Breadcrumbs-->
    <ol class="breadcrumb">
        <li class="breadcrumb-item">
            <a href="#">Dashboard</a>
        </li>
        <li class="breadcrumb-item active">User</li>
    </ol>
    @if (session('msg'))
            <div class="alert alert-success col-md-12 my-1 text-center">
                {{ session('msg') }}
            </div>
    @endif
    <!-- DataTables Example -->
    <div class="card mb-3">
        <div class="card-header row justify-content-between">
            <div class="col-md-10 col-sm-10"> 
                <i class="fas fa-inbox"></i>
                Update User information
            </div>
        </div>
        <div class="card-body">
            <form action="{{Route('update-user', $user->id)}}" method="post">
                @csrf
                @method('PUT')
                <div class="row">
                    <div class="col-md-7 col-sm-12">
                        <div class="form-group">
                            <label for="fullname" class="text-info font-weight-bold">User Name</label>
                            <input type="text" class="form-control" id="fullname" name="fullname" value="{{$user->fullname}}">
                            <span class="text-warning font-weight-bold text-capatalizer">{{$errors->first('fullname')}}</span>
                        </div>
                        <div class="form-group">
                            <label for="email" class="text-info font-weight-bold" >Email</label>
                            <input type="Email" class="form-control" id="email" name="email" value="{{$user->email}}">
                            <span class="text-warning font-weight-bold text-capatalizer">{{$errors->first('email')}}</span>
                        </div>
                        <div class="form-group" >
                            <label for="telephone" class="text-info font-weight-bold">Telephone</label>
                            <input type="text" class="form-control" id="telephone" name="phone" value="{{$profile->phone}}">
                            <span class="text-warning font-weight-bold text-capatalizer">{{$errors->first('phone')}}</span>
                        </div>
                        <div class="form-group" >
                            <label for="address" class="text-info font-weight-bold">Address</label>
                            <input type="text" class="form-control" id="address" name="address" value="{{$profile->address}}">
                            <span class="text-warning font-weight-bold text-capatalizer">{{$errors->first('address')}}</span>
                        </div>
                    </div>
                  <div class="col-md-5 col-sm-12">
                        <div class="form-group">
                            <label class="text-info font-weight-bold">Gender</label>
                        </div>
                        <div class="row">
                            <div class="form-group col-md-5 col-sm-5">
                              <label for="name" class="text-muted mx-4">Male</label>
                              <input type="radio" name="gender" value="0"  <?php if($profile->gender==0) echo 'checked'; else echo null; ?>>
                              <span class="text-warning font-weight-bold text-capatalizer">{{$errors->first('gender')}}</span>
                            </div>
                            <div class="form-group col-md-5 col-sm-5">
                                <label for="name" class="text-muted mx-4">Female</label>
                                <input type="radio" name="gender" value="1" <?php if($profile->gender==1) echo 'checked'; else echo null; ?>>
                                <span class="text-warning font-weight-bold text-capatalizer">{{$errors->first('gender')}}</span>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="role" class="text-info font-weight-bold">User role</label>
                           <select name="role" class="form-control">
                              <option value="2" <?php if($profile->role==2) echo 'selected'; else echo null; ?>>Admin</option>
                              <option value="1" <?php if($profile->role==1) echo 'selected'; else echo null; ?>>Member</option>
                              <option value="0" <?php if($profile->role==0) echo 'selected'; else echo null; ?>>Guest</option>
                           </select>
                           <span class="text-warning font-weight-bold text-capatalizer">{{$errors->first('role')}}</span>
                        </div>
                    </div>
                </div>
                <div class="form-group row col-md-12 justify-content-center">
                    <button type="submit" class="rounded bg-info text-white form-control col-md-2 col-sm-12">Update</button>
                    <a href="" class="rounded bg-secondary text-white form-control col-md-2 col-sm-12 text-center">Back</a>
                </div>
            </form>
        </div>
        <div class="card-footer small text-muted">Updated yesterday at 11:59 PM</div>
    </div>
</div>
@endsection