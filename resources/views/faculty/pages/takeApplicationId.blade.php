@extends('faculty.layouts.dashboard')
@section('section')

<div class="page-container">
    
<form action="{{url('staff/takeApplicationId/submit')}}" enctype="multipart/form-data"  method="POST" autocomplete="off">
    {{-- <form action="submit.php" method="POST"> --}}
    {{csrf_field()}}


    <div class="row">
        <div class="col-sm-3">
            <div class="form-group">
                <label>Application ID<span style="color:red;">*</span> :</label>
                {{Form::text('application_id', '', ['class' => 'form-control', 'placeholder' => 'Enter your Application ID'])}}
            </div>             
        </div>
        <div class="col-sm-3">
            <div class="form-group">
                <label>Contact Info<span style="color:red;">*</span> :</label>
                {{Form::text('mobile_no', '', ['class' => 'form-control', 'placeholder' => 'Enter Mobile No./Landline No.'])}}
            </div>             
        </div>
    </div>

    {{-- <div class="row">
        <input type="number" placeholder="Enter Application ID">
        <input type="number" placeholder="Enter Mobile No.">
    </div> --}}
    <div class="row">
        <div class="col-sm-4">
            {{Form::submit('Submit', ['class' =>'btn btn-primary'])}}
        </div>
    </div>
</form>

</div>
@endsection