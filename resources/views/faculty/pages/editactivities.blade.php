@extends('faculty.layouts.dashboard')

@section('section')

<div class="page-container">
<form action="{{url('staff/editactivities')}}" method="post">
    {{csrf_field()}}
    <h1> EDIT ACTIVITIES </h1>

    <input type="text" name="activityid" value="{{$activity->id}}" hidden>

    <div class="row">
        <div class="col-sm-3">
            <div class="form-group">
                <label>Title Of Activity:</label>
                <input type="text" name="title_of_activity" class ="form-control", placeholder = "Enter title of activity" required="required" value="{{$activity->title}}">
            </div>             
        </div>
    </div>

    <div class="row">
        <div class="col-sm-3">
            <div class="form-group">
                <label>Type of Activity:</label>
                <select name="type_of_activity" class="form-control" required="requird">
                    
                    <option value="0" @if($activity->type == '0') selected @endif>EXTENSION OR CO-CURRICULAR </option>
                    
                    <option value="1" @if($activity->type == '1') selected @endif>CONTRIBUTION TO CORPORATE LIFE AND MANAGEMENT OF INSTITUION</option>
                   
                    <option value="2" @if($activity->type == '2') selected @endif> PROFESSIONAL DEVELOPMENT ACTIVITIES</option>
                </select>
            </div>             
         </div>
    </div>
    
    <div class="row">
        <div class="col-sm-3">
            <div class="form-group">
                <label>Duration Of Activity:</label>
            <input type="text" name="duration_of_activity"  class= "form-control" placeholder = "Duration of activity" required="required" value="{{$activity->duration}}">
            </div>             
        </div>
    </div>
    <div class="row">
       <div class="col-sm-3">
            <div class="form-group">
                <label>Activity  Year:</label>
                <input type="year" class="form-control" placeholder="Year of Invitation" name="activity_year" value="{{$activity->year}}">
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