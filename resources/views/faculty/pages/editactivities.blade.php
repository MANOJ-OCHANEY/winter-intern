@extends('faculty.layouts.dashboard')

@section('section')

<div class="page-container">
<form action="{{url('staff/editactivities')}}" method="post">
    {{csrf_field()}}
    <h1> EDIT ACTIVITIES </h1>

    <input type="text" name="activityid" value="{{$activity->id}}" hidden>

    <div class="row">
        <div class="col-sm-5">
            <div class="form-group">
                <label>Title Of Activity:</label>
                <input type="text" name="title_of_activity" class ="form-control", placeholder = "Enter title of activity" required="required" value="{{$activity->title}}">
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
                    <option value="{{ $activity_type }}" @if($activity->type == $activity_type) selected @endif> {{ $activity_type }} </option>
                    @endforeach
                </select>
            </div>             
         </div>
    </div>
    
    <div class="row">
        <div class="col-sm-4">
            <div class="form-group">
                <label>Academic Year:</label>
                {{-- <input type="text" name="academic_year[]" class='form-control' required> --}}
                <div class="row">
                    <div class="col-sm-5">
                        <select name="year[]" class="form-control" id="from-year" required>
                            <option value="">From</option>
                            @foreach($from_years as $from_year)
                            <option value="{{ $from_year }}" @if($from_year == $activity->from_year) selected @endif> {{ $from_year }} </option>
                            @endforeach
                        </select>
                    </div>
                    <span class="col-sm-1">&#8211</span>
                    <div class="col-sm-5">
                        {{-- <select name="year[]" class="form-control" id="to-year" required>
                            <option value="">To</option>
                            @foreach($to_years as $to_year)
                            <option value="{{ $to_year }}" @if($to_year == $activity->to_year) selected @endif> {{ $to_year }} </option>
                            @endforeach
                        </select> --}}
                        <input type="text" class="form-control" name="year[]" value="{{ $activity->to_year }}" id="to-year" readonly>
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
                    <option value="{{ $duration_type }}" @if($activity->duration == $duration_type) selected @endif> {{ $duration_type }} </option>
                    @endforeach
                </select>
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


 @endsection