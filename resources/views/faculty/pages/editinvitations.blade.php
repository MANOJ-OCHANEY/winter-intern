@extends('faculty.layouts.dashboard')

@section('section')

<div class="page-container">
<form action="{{url('staff/editinvitations')}}" method="post" onsubmit="return validation()">
    {{csrf_field()}}
    <input type="text" value=" {{ $invitation->id }} " name="postid" hidden>
    <h1> EDIT INVITATIONS </h1>
    <div class="row">
        <div class="col-sm-3">
            <div class="form-group">
                <label>Title Of Lecture:</label>
            <input type="text" name="title_of_lecture" class ="form-control", placeholder = "Enter title of lecture" required="required" value="{{$invitation->title_of_lecture}}">
            </div>             
        </div>
    </div>
    
    <div class="row">
        <div class="col-sm-3">
            <div class="form-group">
                <label>Title Of Conference:</label>
                <input type="text" name="title_of_conference"  class= "form-control" placeholder = "Enter title of conference" required="required" value="{{$invitation->title_of_conference}}">
            </div>             
        </div>
    </div>

    <div class="row">
        <div class="col-sm-3">
            <div class="form-group">
                <label>Organised By</label>
                <input type="text" name="organised_by" class="form-control" placeholder="Name of organiser" required="required" value="{{$invitation->organised_by}}"">
            </div>             
        </div>
    </div>

    <div class="row">
        <div class="col-sm-3">
            <div class="form-group">
                <label>Type of Conference:</label>
                <select name="type_of_conference" class="form-control" required="requird" >
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
                <input type="year" class="form-control" placeholder="Year of Invitation" name="invitation_year" value="{{$invitation->year}}"">
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

     
    

    </script>


 @endsection