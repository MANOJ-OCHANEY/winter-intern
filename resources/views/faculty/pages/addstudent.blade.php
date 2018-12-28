@extends('faculty.layouts.dashboard')

@section('section')
<div class="page-container">
    <?php echo Form::open(['action'=> 'StudentDetailController@store', 'method'=>'POST']); ?>

    <h1>Add Student</h1>
    <div class="row">
        <div class="col-sm-3">
            <div class="form-group">
                <label>Student UID:</label>
                {{Form::text('uid', '', ['class' => 'form-control', 'placeholder' => 'Enter Student UID'])}}
            </div>             
        </div>
    </div>
    <hr>

    <div class="row">
        <div class="col-sm-3">
            <div class="form-group">
                <label>First Name:</label>
                {{Form::text('first_name', '', ['class' => 'form-control', 'placeholder' => 'First Name'])}}
            </div>             
        </div>
        <div class="col-sm-3">
            <div class="form-group">
                <label>Middle Name:</label>
                {{Form::text('middle_name', '', ['class' => 'form-control', 'placeholder' => 'Middle Name'])}}
            </div>             
        </div>
        <div class="col-sm-3">
            <div class="form-group">
                <label>Last Name:</label>
                {{Form::text('last_name', '', ['class' => 'form-control', 'placeholder' => 'Last Name'])}}
            </div>             
        </div>
    </div>

    <div class="row">
        <div class="col-sm-3">
            <div class="form-group">
                <label>Full Name:</label>
                {{Form::text('full_name', '', ['class' => 'form-control', 'placeholder' => 'Full Name'])}}
            </div>             
        </div>
        <div class="col-sm-3">
            <div class="form-group">
                <label>Blood Group:</label>
                {{Form::text('blood_group', '', ['class' => 'form-control', 'placeholder' => 'Blood Group'])}}
            </div>   
        </div>  
        <div class="col-sm-3">
            <div class="form-group">
                <label>Gender:</label>
                {{-- {{Form::text('gender', $student->gender, ['class' => 'form-control', 'placeholder' => 'F/M'])}} --}}
                <br>
                {{Form::select('gender', array('1' => 'Male', '0' => 'Female'),null,['class' => 'form-control'])}}
                </br>
            </div>             
        </div>
    </div>

    <div class="row">
        <div class="col-sm-3">
            <div class="form-group">
                <label>Email ID:</label>
                {{Form::text('email_id', '', ['class' => 'form-control', 'placeholder' => 'Email ID'])}}
            </div>             
        </div>
        <div class="col-sm-3">
            <div class="form-group">
                <label>Secondary Email ID:</label>
                {{Form::text('secondary_email_id', '', ['class' => 'form-control', 'placeholder' => 'Secondary Email ID'])}}
            </div>             
        </div>
        <div class="col-sm-3">
            <div class="form-group">
                <label>Dte ID:</label>
                {{Form::text('dte_id', '', ['placeholder' => 'Dte ID', 'class' => 'form-control'])}}
                {{-- <br><b> --}}
                {{-- {{Form::select('department_id', array('1' => 'Electronics Engg', '2' => 'Computer Engg', '3'=> 'Instrumentation Engg', '4'=>'EXTC Engg', '5'=>'IT Engg'), $student->department_id)}} --}}
                {{-- </b></br> --}}
            </div>             
        </div>
    </div>

    <div class="row">
        <div class="col-sm-3">
            <div class="form-group">    
                <label for="date_of_birth" class="col-2 col-form-label">Date of Birth</label>   
                <div class="col-4">
                    <input id="datepicker" class="form-control" type="date" name="date_of_birth">
                </div>    
            </div>
        </div>
        <div class="col-sm-3">
            <div class="form-group">
                <label>Mobile No:</label>
                {{Form::text('mobile_no', '', ['class' => 'form-control', 'placeholder' => 'Mobile No'])}}
            </div>             
        </div>
        <div class="col-sm-3">
            <div class="form-group">
                <label>Landline No:</label>
                {{Form::text('landline_no', '', ['class' => 'form-control', 'placeholder' => 'Landline No'])}}
            </div>             
        </div>
    </div>
    <hr>

    <div class="row">
        <div class="col-sm-6">
            <div class="form-group">
                <label>Father Name:</label>
                {{Form::text('father_name', '', ['class' => 'form-control', 'placeholder' => 'Father Name'])}}
            </div>             
        </div>
        <div class="col-sm-3">
            <div class="form-group">
                <label>Father Mobile No:</label>
                {{Form::text('father_phone_no', '', ['class' => 'form-control', 'placeholder' => 'Father Mobile No'])}}
            </div>             
        </div>
    </div>

    <div class="row">
        <div class="col-sm-6">
            <div class="form-group">
                <label>Mother Name:</label>
                {{Form::text('mother_name', '', ['class' => 'form-control', 'placeholder' => 'Mother Name'])}}
            </div>             
        </div>
        <div class="col-sm-3">
            <div class="form-group">
                <label>Mother Mobile No:</label>
                {{Form::text('mother_phone_no', '', ['class' => 'form-control', 'placeholder' => 'Mother Mobile No'])}}
            </div>             
        </div>
    </div>


    <div class="row">
        <div class="col-sm-6">
            <div class="form-group">
                <label>Permanent Address:</label>
                {{Form::textarea('permanent_address', '', ['size' => '70x3', 'class' => 'form-control', 'placeholder' => 'Enter Permanent Address'])}}
            </div>             
        </div>
        <div class="col-sm-3">
            <div class="form-group">
                <label>Pincode:</label>
                {{Form::text('PIN_permanent_address', '', ['class' => 'form-control', 'placeholder' => 'Pincode'])}}
            </div>             
        </div>
    </div>

    <div class="row">
        <div class="col-sm-6">
            <div class="form-group">
                <label>Local Address:</label>
                {{Form::textarea('local_address', '', ['size' => '70x3', 'class' => 'form-control', 'placeholder' => 'Enter Local Address'])}}
            </div>             
        </div>
        <div class="col-sm-3">
            <div class="form-group">
                <label>Pincode:</label>
                {{Form::text('PIN_local_address', '', ['class' => 'form-control', 'placeholder' => 'Pincode'])}}
            </div>             
        </div>
    </div>

    <div class="row">
        <div class="col-sm-4">
            <div class="form-group">
                <label>Aadhar ID:</label>
                {{Form::text('aadhar_id', '', ['class' => 'form-control', 'placeholder' => 'Aadhar No'])}}
            </div>             
        </div>
        <div class="col-sm-4">
            <div class="form-group">
                <label>Nationality:</label>
                {{Form::text('nationality', '', ['class' => 'form-control', 'placeholder' => 'Nationality'])}}
            </div>             
        </div>
        <div class="col-sm-4">
            <div class="form-group">
                <label>Nearest Railway Station:</label>
                {{Form::text('nearest_rail_station', '', ['class' => 'form-control', 'placeholder' => 'Nearest Railway Station'])}}
            </div>             
        </div>
    </div>

    <div class="row">
        <div class="col-sm-3">
            <div class="form-group">
                <label>Branch:</label>
                {{Form::text('branch', '', ['class' => 'form-control', 'placeholder' => 'Branch'])}}
            </div>             
        </div>
        <div class="col-sm-3">
            <div class="form-group">
                <label>Admission Year:</label>
                {{-- {{Form::text('email_id', $student->email_id, ['class' => 'form-control', 'placeholder' => 'Email ID'])}} --}}
                <input type="year" class="form-control" placeholder="Year of Admission" name="admission_year">
            </div>             
        </div>
        <div class="col-sm-3">
            <div class="form-group">
                <label>Type of Admission:</label>
                {{-- {{Form::text('type', $student->type, ['class' => 'form-control', 'placeholder' => 'Type'])}} --}}
                <br>
                {{Form::select('type_of_admission', array('0' => 'FE', '1' => 'DSE'), null,['class' => 'form-control'])}}
                </br>
            </div>             
        </div>
    </div>

    <div class="row">
        <div class="col-sm-4">
            <div class="form-group">
                <label>Category:</label>
                {{Form::text('category', '', ['class' => 'form-control', 'placeholder' => 'Category'])}}
            </div>   
        </div>          
        <div class="col-sm-4">
            <div class="form-group">
                <label>Additional Category:</label>
                {{-- {{Form::text('is_permanent', $student->is_permanent, ['class' => 'form-control', 'placeholder' => '1/0'])}} --}}
                {{Form::text('additional_category', '', ['class' => 'form-control', 'placeholder' => 'Additional Category'])}}
            </div>             
        </div>
    </div>

    <div class="row">
        <div class="col-sm-4">
            <div class="form-group">
                <label>Mentor id</label>
                {{Form::text('mentor_id', '', ['class' => 'form-control', 'placeholder' => 'Enter Mentor id'])}}
            </div>             
        </div>
    </div>


    {{-- {{Form::hidden('_method', 'PATCH')}} --}}
    <div class="row">
        <div class="col-sm-4">
            {{Form::submit('Submit', ['class' =>'btn btn-primary'])}}
        </div>
    </div>
    {{-- {{Form::submit('Submit', ['class' =>'btn btn-primary'])}} --}}
    {!! Form::close() !!}
</div>
 @endsection
 
 