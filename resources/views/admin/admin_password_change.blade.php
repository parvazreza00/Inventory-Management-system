@extends('admin.admin_master')
@section('admin')


<div class="page-content">
<div class="container-fluid">


<div class="row">
    <div class="col-lg-12">
        <div class="card">

            <h4 class="card-title">Change password page</h4>

             @if(count($errors))
            @foreach($errors->all() as $error)
                <p class="alert alert-danger alert-dismissable fade show">{{ $error }}</p>
            @endforeach
            @endif 

            <div class="card-body">

            <form method="post" action="{{ route('update.password') }}" enctype="multipart/form-data">
            @csrf

            <div class="mb-3 row">
                <label for="" class="col-sm-2 col-form-label">Old Password</label>
                <div class="col-sm-10">
                    <input type="password" name="oldpassword" id="oldpassword" class="form-control" >

                    <!-- @error('oldpassword')
                    <p class="alert alert-danger alert-dismissable fade show">{{$message}}</p>
                    @enderror -->
                </div>
            </div>
            <!-- end row -->

            <div class="mb-3 row">
                <label for="" class="col-sm-2 col-form-label">New Password</label>
                <div class="col-sm-10">
                    <input type="password" name="newpassword" id="newpassword" class="form-control">

                    <!-- @error('newpassword')
                    <p class="alert alert-danger alert-dismissable fade show">{{$message}}</p>
                    @enderror -->
                </div>
            </div>
            <!-- end row -->

            <div class="mb-3 row">
                <label for="" class="col-sm-2 col-form-label">Confirm Password</label>
                <div class="col-sm-10">
                    <input type="password" name="confirm_password" id="confirm_password" class="form-control" >

                    <!-- @error('confirm_password')
                    <p class="alert alert-danger alert-dismissable fade show">{{$message}}</p>
                    @enderror -->
                </div>
            </div>
            <!-- end row -->

           
<input type="submit" class="btn btn-info waves-effect waves-light" value="Change Password">
            </form>

    

            </div>
        </div>
    </div> 


                        </div> 


</div>
</div>



@endsection