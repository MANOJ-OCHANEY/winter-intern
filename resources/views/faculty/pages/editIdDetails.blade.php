@extends('faculty.layouts.dashboard')

@section('section')
<div class="page-container">
    <form action="{{url('staff/editIdDetails/submit')}}" enctype="multipart/form-data"  method="POST" autocomplete="off">
        {{csrf_field()}}

        <h1>Edit Id Card Details</h1>

        <div class="row">
            <div class="col-sm-3">
                <div class="form-group">
                    <label>Application ID<span style="color:red;">*</span> :</label>
                    {{Form::text('application_id', $application_id, ['placeholder' => 'Application ID', 'class' => 'form-control', 'readonly'])}}
                    {{-- <br><b> --}}
                    {{-- {{Form::select('department_id', array('1' => 'Electronics Engg', '2' => 'Computer Engg', '3'=> 'Instrumentation Engg', '4'=>'EXTC Engg', '5'=>'IT Engg'), {{$student->department_id)}} --}}
                    {{-- </b></br> --}}
                </div>             
            </div>
            <div class="col-sm-3">
                <div class="form-group">
                    <label>Admission Year<span style="color:red;">*</span> :</label>
                    {{-- {{Form::text('email_id', {{$student->email_id, ['class' => 'form-control', 'placeholder' => 'Email ID'])}} --}}
                    <input type="year" class="form-control" placeholder="eg. {{ date('Y') }} " name="admission_year" value="{{$student->admission_year}}" readonly>
                </div>             
            </div>
        </div>
        
        <div class="row">
            <div class="col-sm-3">
                <div class="form-group">
                    <label>First Name<span style="color:red;">*</span> :</label>
                    {{Form::text('first_name', $student->first_name, ['class' => 'form-control', 'placeholder' => 'First Name', 'id' => 'fname', 'onkeyup' => 'generateFullName()'])}}
                </div>             
            </div>
            <div class="col-sm-3">
                <div class="form-group">
                    <label>Middle Name:</label>
                    {{Form::text('middle_name', $student->middle_name, ['class' => 'form-control', 'placeholder' => 'Middle Name', 'id' => 'mname', 'onkeyup' => 'generateFullName()'])}}
                </div>             
            </div>
            <div class="col-sm-3">
                <div class="form-group">
                    <label>Last Name<span style="color:red;">*</span> :</label>
                    {{Form::text('last_name', $student->last_name, ['class' => 'form-control', 'placeholder' => 'Last Name', 'id' => 'lname', 'onkeyup' => 'generateFullName()'])}}
                </div>             
            </div>
        </div>

        <div class="row">
            <div class="col-sm-6">
                <div class="form-group">
                    <label>Full Name<span style="color:red;">*</span> :</label>
                    {{Form::text('full_name', $student->full_name, ['class' => 'form-control', 'placeholder' => 'Full Name', 'id' => 'fullname', 'readonly'])}}
                </div>             
            </div>
        </div>

        <div class="row">
            <div class="col-sm-3">
                <div class="form-group">
                        
                    <label for="date_of_birth" class="col-2 col-form-label">Date of Birth<span style="color:red;">*</span> :</label>
                        
                    <div class="col-4">
                        <input id="datepicker" class="form-control" type="date" value="{{$student->date_of_birth}}" name="date_of_birth">
                    </div>    
                    
                </div>
            </div>
            <div class="col-sm-3">
            <div class="form-group">
                <label>Blood Group<span style="color:red;">*</span> :</label>
                <br>
                {{Form::select('blood_group', array('A-' => 'A-', 'A+' => 'A+','B-' => 'B-', 'B+' => 'B+', 'AB-' => 'AB-', 'AB+' => 'AB+','O-' => 'O−', 'O+' => 'O+'), $student->blood_group,['class' => 'form-control','placeholder'=>'Blood Group'])}}
            </div>   
        </div>  
        </div>
              
        <div class="row">
            <div class="col-sm-6">
                <div class="form-group">
                    <label>Course<span style="color:red;">*</span> :</label>
                    {{-- {{Form::text('branch', $student->course, ['class' => 'form-control', 'placeholder' => 'Eg. BE Computer Engineering (Course Branch)'])}} --}}
                    {{-- @php
                        echo $student->course;
                    @endphp --}}
                    {{Form::select('course', array('BE ELECTRONICS ENGINEERING' => 'BE ELECTRONICS ENGINEERING','BE COMPUTER ENGINEERING' => 'BE COMPUTER ENGINEERING','BE INSTRUMENTATION ENGINEERING' => 'BE INSTRUMENTATION ENGINEERING',  'BE ELECTRONICS & TELECOMMUNICATION ENGINEERING' => 'BE ELECTRONICS & TELECOMMUNICATION ENGINEERING', 'BE INFORMATION TECHNOLOGY' => 'BE INFORMATION TECHNOLOGY'), $student->course,['class' => 'form-control'])}}
                </div>             
            </div>
        </div>

        <div class="row">
            <div class="col-sm-6">
                <div class="form-group">
                    <label>Residential Address<span style="color:red;">*</span> :</label>
                    {{Form::textarea('residential_address', $student->residential_address, ['size' => '70x3', 'class' => 'form-control', 'placeholder' => 'Flat No./Bk. No. ,Building Name, Street/Area Name, City/Town - Pincode'])}}
                </div>             
            </div>
        </div>

        <div class="row">
            <div class="col-sm-3">
                <div class="form-group">
                    <label>Mobile No.<span style="color:red;">*</span> :</label>
                    {{Form::text('mobile_no', $student->mobile_no, ['class' => 'form-control', 'placeholder' => 'Mobile No.'])}}
                </div>             
            </div>
            <div class="col-sm-3">
                <div class="form-group">
                    <label>Landline No.:</label>
                    {{Form::text('landline_no', $student->landline_no, ['class' => 'form-control', 'placeholder' => 'Landline No.'])}}
                </div>             
            </div>
        </div>
        <div class="row">
            <div class="col-sm-6">
                <div class="form-group">
                    <label>Email ID<span style="color:red;">*</span> :</label>
                    {{Form::text('email_id', $student->email_id, ['class' => 'form-control', 'placeholder' => 'Email ID'])}}
                </div>             
            </div>
        </div>

        <div class="row">
            <div class="col-sm-3">
                <div class="form-group">
                    <label>Image:</label>
                    <div class="">
                        <img src="/storage/student_idcard_photo/{{$student->photo}}" alt="Student photo" class="img-rounded" style="width:100%">
                        {{-- {{Form::file('user_photo')}} --}}
                    </div>
                </div>             
            </div>
            <div class="col-sm-3">
                <div class="form-group">
                    {{-- {!! Form::label('', 'Upload Image') !!} --}}
                    <label>Update Your Image<span style="color:red;">*</span> :</label>
                    <div class="">
                        {{Form::file('user_photo')}}
                    </div>
                </div>             
            </div>
        </div>

    <div class="row">
            <div class="col-sm-4">
                {{Form::submit('Submit', ['class' =>'btn btn-primary'])}}
            </div>
        </div>
        {{-- {{Form::submit('Submit', ['class' =>'btn btn-primary'])}} --}}
        {!! Form::close() !!} 
    </div>

    <script type="text/javascript">
        function generateFullName()
        {
            document.getElementById('fullname').value = 
                document.getElementById('fname').value + ' ' +
                document.getElementById('mname').value + ' ' +  
                document.getElementById('lname').value;
        }
    </script>
 @endsection