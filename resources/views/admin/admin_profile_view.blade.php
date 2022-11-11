@extends('admin.admin_master')
@section('admin')

<div class="page-content">
<div class="container-fluid">


<div class="row">
    <div class="col-lg-6">
        <div class="card"><br><br>
<center>
            <img class="rounded-circle avatar-xl" src="{{ (!empty($adminData->profile_image)) ? url('upload/admin_images/'.$adminData->profile_image) : url('upload/no_image.jpg') }}" alt="Card image cap">
</center>

            <div class="card-body">

        <div class="mb-3 row">
            <label for="" class="col-sm-4 col-form-label">Name</label>
            <div class="col-sm-8">
            <input type="text" class="form-control" value="{{ $adminData->name}}">
            </div>
        </div>

        <div class="mb-3 row">
            <label for="" class="col-sm-4 col-form-label">User Name</label>
            <div class="col-sm-8">
            <input type="text" class="form-control" value="{{ $adminData->username }}">
            </div>
        </div>

        <div class="mb-3 row">
            <label for="" class="col-sm-4 col-form-label">User Email</label>
            <div class="col-sm-8">
            <input type="email" class="form-control" value="{{ $adminData->email }}">
            </div>
        </div>


                <a href="{{ route('edit.profile') }}" class="btn btn-info btn-rounded waves-effect waves-light mt-2" > Edit Profile</a>

            </div>
        </div>
    </div> 


                        </div> 


</div>
</div>



@endsection