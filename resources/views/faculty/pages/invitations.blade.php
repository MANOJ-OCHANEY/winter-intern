@extends('faculty.layouts.dashboard')

@section('section')

<div class="page-container">
<form action="{{url('staff/addinvitations')}}" method="post" onsubmit="return validation()">
    {{csrf_field()}}
    <h1> INVITATIONS </h1>
    <div class="row">
        <div class="col-sm-3">
            <div class="form-group">
                <label>Title Of Lecture:</label>
                <input type="text" name="title_of_lecture" class ="form-control", placeholder = "Enter title of lecture" required="required">
            </div>             
        </div>
    </div>
    
    <div class="row">
        <div class="col-sm-3">
            <div class="form-group">
                <label>Title Of Conference:</label>
                <input type="text" name="title_of_conference"  class= "form-control" placeholder = "Enter title of conference" required="required">
            </div>             
        </div>
    </div>

    <div class="row">
        <div class="col-sm-3">
            <div class="form-group">
                <label>Organised By</label>
                <input type="text" name="organised_by" class="form-control" placeholder="Name of organiser" required="requird">
            </div>             
        </div>
    </div>

    <div class="row">
        <div class="col-sm-3">
            <div class="form-group">
                <label>Type of Conference:</label>
                <select name="type_of_conference" class="form-control" required="requird">
                    <option value="0">International</option>
                    <option value="1">national</option>
                </select>
            </div>             
         </div>
    </div>

    <div class="row">
       <div class="col-sm-3">
            <div class="form-group">
                <label>Invitation  Year:</label>
                <input type="year" class="form-control" placeholder="Year of Invitation" name="invitation_year">
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

     
  function validation()
  {
      return false;
  }     

    </script>


 @endsection