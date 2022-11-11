@extends('admin.admin_master')
@section('admin')

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

<div class="page-content">
<div class="container-fluid">


<div class="row">
    <div class="col-lg-12">
        <div class="card">

            <h4 class="card-title">Edit profile data</h4>
            <div class="card-body">

            <form method="post" action="{{ route('store.profile') }}" enctype="multipart/form-data">
                @csrf

            <div class="mb-3 row">
            <label for="" class="col-sm-2 col-form-label">Name</label>
            <div class="col-sm-10">
            <input type="text" name="name" class="form-control" value="{{ $editData->name}}">
            </div>
        </div>
            <!-- end row -->

            <div class="mb-3 row">
            <label for="" class="col-sm-2 col-form-label">User Name</label>
            <div class="col-sm-10">
            <input type="text" name="username" class="form-control" value="{{ $editData->username }}">
            </div>
        </div>
        <!-- end row -->

        <div class="mb-3 row">
            <label for="" class="col-sm-2 col-form-label">User Email</label>
            <div class="col-sm-10">
            <input type="email" name="email" class="form-control" value="{{ $editData->email }}">
            </div>
        </div>
            <!-- end row -->


            <div class="row mb-3">
                <label for="example-text-input" class="col-sm-2 col-form-label">Profile Image </label>
                <div class="col-sm-10">
       <input name="profile_image" class="form-control" type="file"  id="image">
                </div>
            </div>
            <!-- end row -->

              <div class="row mb-3">
                 <label for="example-text-input" class="col-sm-2 col-form-label">  </label>
                <div class="col-sm-10">
                    <img id="showImage" class="rounded avatar-lg" src="{{ (!empty($editData->profile_image)) ? url('upload/admin_images/'.$editData->profile_image) : url('upload/no_image.jpg') }}" alt="Card image cap">
                </div>
            </div>
            <!-- end row -->
<input type="submit" class="btn btn-info waves-effect waves-light" value="Update Profile">
            </form>

        

        

        


                

            </div>
        </div>
    </div> 


                        </div> 


</div>
</div>

<script type="text/javascript">
    
    $(document).ready(function(){
        $('#image').change(function(e){
            var reader = new FileReader();
            reader.onload = function(e){
                $('#showImage').attr('src',e.target.result);
            }
            reader.readAsDataURL(e.target.files['0']);
        });
    });
</script>

@endsection