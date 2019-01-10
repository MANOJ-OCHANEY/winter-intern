@extends('faculty.layouts.dashboard')
@section('section')

<div class="page-container">
    
<form action="{{url('staff/addIdDetails/submit')}}" enctype="multipart/form-data"  method="POST" autocomplete="off">
    {{-- <form action="submit.php" method="POST"> --}}
    {{csrf_field()}}

    <div class="row">
        {{-- <div class="col-sm-3 ">
            <div class="form-group">
                <label>Dte ID<span style="color:red;">*</span> :</label>
                {{Form::text('dte_id', '', ['placeholder' => 'Dte ID', 'class' => 'form-control'])}}
                comment
                <br><b>
                {{Form::select('department_id', array('1' => 'Electronics Engg', '2' => 'Computer Engg', '3'=> 'Instrumentation Engg', '4'=>'EXTC Engg', '5'=>'IT Engg'), $student->department_id)}}
                </b></br>
                comment
            </div>             
        </div> --}}

        <div class="col-sm-3">
            <div class="form-group">
                <label>Admission Year<span style="color:red;">*</span> :</label>
                {{-- {{Form::text('email_id', $student->email_id, ['class' => 'form-control', 'placeholder' => 'Email ID'])}} --}}
                {{-- <input type="year" class="form-control" placeholder="eg. {{ date('Y') }} " name="admission_year"> --}}
                {{Form::number('admission_year',date('Y'),['class' => 'form-control','readonly'])}}
            </div>             
        </div>    
    </div>

    <div class="row">
        <div class="col-sm-3">
            <div class="form-group">
                <label>First Name<span style="color:red;">*</span> :</label>
                {{Form::text('first_name', '', ['class' => 'form-control', 'placeholder' => 'First Name','id' => 'fname','onkeyup' => 'generateFullName()'])}}
            </div>             
        </div>

        <div class="col-sm-3">
            <div class="form-group">
                <label>Middle Name:</label>
                {{Form::text('middle_name', '', ['class' => 'form-control', 'placeholder' => 'Middle Name','id' => 'mname','onkeyup' => 'generateFullName()'])}}
            </div>             
        </div>

        <div class="col-sm-3">
            <div class="form-group">
                <label>Last Name<span style="color:red;">*</span> :</label>
                {{Form::text('last_name', '', ['class' => 'form-control', 'placeholder' => 'Last Name','id' => 'lname','onkeyup' => 'generateFullName()'])}}
            </div>             
        </div>
    </div>

    <div class="row">
        <div class="col-sm-6">
            <div class="form-group">
                <label>Full Name:</label>
                {{Form::text('full_name', '', ['class' => 'form-control', 'placeholder' => 'Full Name','id' => 'fullname' ,'readonly'])}}
            </div>             
        </div> 
    </div>

    <div class="row">
        <div class="col-sm-3">
            <div class="form-group">    
                <label for="date_of_birth" class="col-2 col-form-label" > Date of Birth<span style="color:red;">*</span> </label>   
                <div class="col-4">
                    {{-- <input id="datepicker" class="form-control" type="date" name="date_of_birth" onkeydown="return false" value=" {{ old('date_of_birth') }} "> --}}
                    {{Form::date('date_of_birth', 'Input::old()',['class' => 'form-control'])}}
                </div>    
            </div>
        </div>

        <div class="col-sm-3">
            <div class="form-group">
                <label>Blood Group<span style="color:red;">*</span> :</label>
                <br>
                {{Form::select('blood_group', array('A-' => 'A-', 'A+' => 'A+','B-' => 'B-', 'B+' => 'B+', 'AB-' => 'AB-', 'AB+' => 'AB+','O-' => 'O−', 'O+' => 'O+'), null,['class' => 'form-control'])}}
            </div>   
        </div>    
    </div>

    <div class="row">
        <div class="col-sm-6">
            <div class="form-group">
                <label>Course<span style="color:red;">*</span> :</label>
                {{-- {{Form::text('course', '', ['class' => 'form-control', 'placeholder' => 'Eg: BE Computer Engineering (Degree Branch)'])}} --}}
                {{Form::select('course', array('BE ELECTRONICS ENGINEERING' => 'BE ELECTRONICS ENGINEERING','BE COMPUTER ENGINEERING' => 'BE COMPUTER ENGINEERING','BE INSTRUMENTATION ENGINEERING' => 'BE INSTRUMENTATION ENGINEERING',  'BE ELECTRONICS & TELECOMMUNICATION ENGINEERING' => 'BE ELECTRONICS & TELECOMMUNICATION ENGINEERING', 'BE INFORMATION TECHNOLOGY' => 'BE INFORMATION TECHNOLOGY'), null,['class' => 'form-control'])}}
            </div>             
        </div> 
    </div>

    <div class="row">
        <div class="col-sm-6">
            <div class="form-group">
                <label>Residential Address<span style="color:red;">*</span> :</label>
                {{Form::textarea('residential_address', '', ['size' => '70x3', 'class' => 'form-control', 'placeholder' => 'Flat No./Bk. No. ,Building Name, Street/Area Name, City/Town - Pincode'])}}
            </div>             
        </div>
    </div>

    <div class="row">
        <div class="col-sm-3">
            <div class="form-group">
                <label>Mobile No.<span style="color:red;">*</span> :</label>
                {{Form::text('mobile_no', '', ['class' => 'form-control', 'placeholder' => 'Mobile No.'])}}
            </div>             
        </div>
        <div class="col-sm-3">
            <div class="form-group">
                <label>Landline No.:</label>
                {{Form::text('landline_no', '', ['class' => 'form-control', 'placeholder' => 'Landline No.'])}}
            </div>             
        </div>
    </div>
    <div class="row">
        <div class="col-sm-6">
                <div class="form-group">
                    <label>Email ID<span style="color:red;">*</span> :</label>
                    {{Form::text('email_id', '', ['class' => 'form-control', 'placeholder' => 'Email ID'])}}
                </div>             
        </div>
    </div>

    <div class="row">
        <div class="col-sm-6">
            <div class="form-group">
                {{-- {!! Form::label('', 'Upload Image') !!} --}}
                <label>Upload Your Image<span style="color:red;">*</span> :</label>
                <div class="">
                    {{Form::file('user_photo')}}
                </div>
            </div>             
        </div>
    </div>

    {{-- <div class="row">
        <div class="col-sm-3">
            <div class="form-group">
                <label>Upload Your Image:</label>
                <div class="btn-group" role="group">
                    comment
                    <input type="file" name="user_photo" id="">
                    {{Form::submit('WebCam', ['class' =>'btn btn-primary','action' => '{{url('/staff/webcamImage')}}'])}}
                    comment
                    {{Form::file('user_photo',['class' => 'btn btn-primary'])}}
                    <a type="button" href="{{url('/staff/webcamImage')}}" class="btn btn-danger">Webcam</a>
                </div>
            </div>             
        </div>
    </div> --}}
    
    {{-- {{Form::hidden('_method', 'PATCH')}} --}}
    <div class="row">
        <div class="col-sm-4">
            {{Form::submit('Submit', ['class' =>'btn btn-primary'])}}
        </div>
    </div>
    {{-- {{Form::submit('Submit', ['class' =>'btn btn-primary'])}} --}}
    </form>
</div>
<script type="text/javascript">
    function generateFullName()
    {
        document.getElementById('fullname').value = 
            document.getElementById('fname').value + ' ' +
            document.getElementById('mname').value + ' ' +  
            document.getElementById('lname').value;
    }

    // $("#fname").change(function(){
    //     alert("The text has been changed.");
    // });
</script>

@endsection