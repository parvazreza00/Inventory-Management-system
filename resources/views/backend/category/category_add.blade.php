@extends('admin.admin_master')
@section('admin')

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

<div class="page-content">
<div class="container-fluid">
<div class="row">
    <div class="col-lg-12">
        <div class="card">
            <div class="page-title-box d-sm-flex align-items-center justify-content-between">
            <h4 class="card-title">Add Category Page</h4>
            <a href="{{ route('category.all') }}" class="btn btn-primary btn-rounded waves-effect waves-light" style="float:right;"><i class="fas fa-arrow-alt-circle-left">BackToRoot</i> </a>
            </div>
           
            <!-- default validation message -->
            <!-- @if(count($errors))
            @foreach($errors->all() as $error)
                <p class="alert alert-danger alert-dismissable fade show">{{ $error }}</p>
            @endforeach
            @endif  -->

            <div class="card-body">

    <form method="post" id="myForm" action="{{ route('category.store') }}" enctype="multipart/form-data">
            @csrf

            <div class="row mb-3">
                <label for="example-text-input" class="col-sm-2 col-form-label">Category Name </label>
                <div class="form-group col-sm-10">
                    <input name="name" class="form-control" type="text"    >
                </div>
            </div>
            <!-- end row -->
           
<input type="submit" class="btn mt-5 btn-info btn-rounded waves-effect waves-light" value="Add Category">

            </form>

            </div>
        </div>
    </div> 


                        </div> 


</div>


<script type="text/javascript">
    $(document).ready(function (){
        $('#myForm').validate({
            rules: {
                name: {
                    required : true,
                }, 
                 
            },
            messages :{
                name: {
                    required : 'Please Enter Your Name',
                },
                
            },
            errorElement : 'span', 
            errorPlacement: function (error,element) {
                error.addClass('invalid-feedback');
                element.closest('.form-group').append(error);
            },
            highlight : function(element, errorClass, validClass){
                $(element).addClass('is-invalid');
            },
            unhighlight : function(element, errorClass, validClass){
                $(element).removeClass('is-invalid');
            },
        });
    });
    
</script>

@endsection