@extends('faculty.layouts.dashboard')

@section('section')

<div class="page-container">
<form action="{{url('staff/addactivities')}}" method="post">
    {{csrf_field()}}
    <h1> ACTIVITIES </h1>

    <div class="row">
        <div class="col-sm-5">
            <div class="form-group">
                <label>Title Of Activity:</label>
                <input type="text" name="title_of_activity" class ="form-control", placeholder = "Enter title of activity" required="required">
            </div>             
        </div>
    </div>

    <div class="row">
        <div class="col-sm-5">
            <div class="form-group">
                <label>Type of Activity:</label>
                <select name="type_of_activity" class="form-control" required>
                    <option value="">Select...</option>
                    @foreach($activity_types as $activity_type)
                    <option value="{{ $activity_type }}"> {{ $activity_type }} </option>
                    @endforeach
                </select>
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

    <div class="row">
        <div class="col-sm-3">
            <div class="form-group">
                <label>Duration Of Activity:</label>
                {{-- <input type="text" name="duration_of_activity"  class= "form-control" placeholder = "Duration of activity" required="required"> --}}
                <select name="duration_of_activity" class="form-control" required>
                    <option value="">Select...</option>
                    @foreach($duration_types as $duration_type)
                    <option value="{{ $duration_type }}"> {{ $duration_type }} </option>
                    @endforeach
                </select>
            </div>             
        </div>
    </div>
    
          
    <div class="row">
        <div class="col-sm-4"> 
            <input type="submit" class="btn btn-primary" value="Submit">
        </div>
    </div>
    </form>
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