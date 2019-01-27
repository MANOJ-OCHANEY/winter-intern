@extends('faculty.layouts.dashboard')

@section('section')

<div class="page-container">
<form action="{{url('staff/addactivities')}}" method="post">
    {{csrf_field()}}
    <h1> ACTIVITIES </h1>

    <div class="row">
        <div class="col-sm-3">
            <div class="form-group">
                <label>Title Of Activity:</label>
                <input type="text" name="title_of_activity" class ="form-control", placeholder = "Enter title of activity" required="required">
            </div>             
        </div>
    </div>

    <div class="row">
        <div class="col-sm-3">
            <div class="form-group">
                <label>Type of Activity:</label>
                <select name="type_of_activity" class="form-control" required="requird">
                    <option value="0">EXTENSION OR CO-CURRICULAR </option>
                    <option value="1">CONTRIBUTION TO CORPORATE LIFE AND MANAGEMENT OF INSTITUION</option>
                    <option value="2" > PROFESSIONAL DEVELOPMENT ACTIVITIES</option>
                </select>
            </div>             
         </div>
    </div>
    
    <div class="row">
        <div class="col-sm-3">
            <div class="form-group">
                <label>Duration Of Activity:</label>
                <input type="text" name="duration_of_activity"  class= "form-control" placeholder = "Duration of activity" required="required">
            </div>             
        </div>
    </div>
    <div class="row">
       <div class="col-sm-3">
            <div class="form-group">
                <label>Activity  Year:</label>
                <input type="date" class="form-control" placeholder="Year of Invitation" name="activity_year">
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