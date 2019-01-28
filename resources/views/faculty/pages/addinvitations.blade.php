@extends('faculty.layouts.dashboard')

@section('section')

<div class="page-container">
<form action="{{url('staff/addinvitations')}}" method="post" onsubmit="return validation()">
    {{csrf_field()}}
    <h1> INVITATIONS </h1>
    <div class="row">
        <div class="col-sm-4">
            <div class="form-group">
                <label>Title Of Lecture:</label>
                <input type="text" name="title_of_lecture" class ="form-control", placeholder = "Enter title of lecture" required="required">
            </div>             
        </div>
    </div>
    
    <div class="row">
        <div class="col-sm-4">
            <div class="form-group">
                <label>Title Of Conference:</label>
                <input type="text" name="title_of_conference"  class= "form-control" placeholder = "Enter title of conference" required="required">
            </div>             
        </div>
    </div>

    <div class="row">
        <div class="col-sm-4">
            <div class="form-group">
                <label>Organised By</label>
                <input type="text" name="organised_by" class="form-control" placeholder="Name of organiser" required>
            </div>             
        </div>
    </div>

    <div class="row">
        <div class="col-sm-3">
            <div class="form-group">
                <label>Type of Conference:</label>
                <select name="type_of_conference" class="form-control" required>
                    <option value="">Select..</option>
                    @foreach ($conference_types as $conference_type)
                    <option value="{{ $conference_type }}">{{ $conference_type }}</option>
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
        <div class="col-sm-4"> 
            <input type="submit" class="btn btn-primary" value="submit">
        </div>
    </div>

    
    </form>
</div>

<script>
$(document).ready(function() {
    $('#from-year').on('change', function() {
        value = $(this).val();
        $('#to-year').val(parseInt(value)+1);
    });
});
</script>

 @endsection