@extends('faculty.layouts.dashboard')

@section('section')
<div class="page-container">
<form action=" {{ url('/staff/addcourses') }} " method='post'> 
    {{csrf_field()}}
    <h1>Courses</h1>

    {{-- <div class="row">
        <div class="col-sm-3">
            <div class="form-group">
                <label>Name:</label>
                <input type="text" name="name" class='form-control' placeholder="name" required>
            </div>             
        </div>
        
    </div> --}}

    

    <div class="row">
        <div class="col-sm-6">
            <div class="form-group">
                <label>Course Description:</label>
                <input type="text" class="form-control" name="description" placeholder="Description" required/>
            </div>            
        </div>
        
    </div>

    <div class="row">
        <div class="col-sm-3">
            <div class="form-group">
                <label>Organised By:</label>
                <input type="text" name="organised_by" class='form-control' placeholder="Organised By" required>
            </div>             
        </div>
    </div>

    <div class="row">
        <div class="col-sm-3">
            <div class="form-group">
                <label>From Date:</label>
                <input type="date" name="from_date" class='form-control' placeholder="date" required>
            </div>             
        </div>
    {{-- </div>

    <div class="row"> --}}
        <div class="col-sm-3">
            <div class="form-group">
                <label>To Date:</label>
                <input type="date" name="to_date" class='form-control' placeholder="date" required>
            </div>             
        </div>
    </div>

    <div class="row">
        <div class="col-sm-3">
            <div class="form-group">
                <label>Number of Days:</label>
                <input type="number" name="no_of_days" class='form-control' placeholder="number of days" min="1" required>
            </div>             
        </div>
    </div>

    <div class="row">
        <div class="col-sm-3">
            <div class="form-group">
                <label>Place:</label>
                <input type="text" name="place" class='form-control' placeholder="place" required>
            </div>             
        </div>
    </div>

    <div class="row">
        <div class="col-sm-3">
            <div class="form-group">
                <label>Conducted/Attended:</label><br>
                <div class="radio">
                    <label><input type="radio" name="conducted_attended" value="1">Conducted</label>
                    <label><input type="radio" name="conducted_attended" value="0">Attended</label> 
                </div>
            </div>             
        </div>
    </div>

    <div class="row">
        <div class="col-sm-3">
            <div class="form-group">
                <label>Academic Year:</label>
                {{-- <input type="number" name="academic_year[]" class='form-control' required> --}}
                <div class="row">
                    <div class="col-sm-5">
                        <select name="year[]" class="form-control" id="from-year" required>
                            <option value="">From</option>
                            @foreach($from_years as $from_year)
                            <option value="{{ $from_year }}"> {{ $from_year }} </option>
                            @endforeach
                        </select>
                    </div>
                    <span class="col-sm-1">&#8211</span>
                    <div class="col-sm-5">
                        {{-- <select name="year[]" class="form-control" required>
                            <option value="">To</option>
                            @foreach($to_years as $to_year)
                            <option value="{{ $to_year }}"> {{ $to_year }} </option>
                            @endforeach
                        </select> --}}
                        <input type="text" class="form-control" name="year[]" id="to-year" readonly>
                    </div>
                </div>
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

<script type="text/javascript">
$(document).ready(function(){
    $('#from-year').on('change', function() {
        value = $(this).val();
        $('#to-year').val(parseInt(value)+1);
    });
});
</script>
 @endsection
 
 