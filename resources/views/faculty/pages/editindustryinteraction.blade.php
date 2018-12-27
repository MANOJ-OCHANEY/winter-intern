@extends('faculty.layouts.dashboard')

@section('section')
<div class="page-container">    
<form action="{{url('staff/editindustryinteraction')}}" method="post" id="industryform" onsubmit="return validation()">
    {{csrf_field()}}
    <h1>EDIT INDUSTRY INTERACTION </h1>
    <input type="text" name="interactionid" value="{{$industryinteraction->id}}" hidden>
    <div class="row">
        <div class="col-sm-3">
            <div class="form-group">
                <label>Title Of Industry Project:</label>
                <input type="text" name="title_of_industry_project" class ="form-control" placeholder = "Enter title of industry project" required="required" value="{{$industryinteraction->title_of_industry_project}}">
            </div>             
        </div>
    </div>
    

    <div class="row">
        <div class="col-sm-3">
            <div class="form-group">
                <label>Industry:</label>
                <input type="text" name="industry_name" class ="form-control" placeholder = "Industry" required="required" value="{{$industryinteraction->industry_name}}">
            </div>             
        </div>
    </div>

    <div class="row">
        <div class="col-sm-3">
            <div class="form-group">
                <label>Industry Contact Person</label>
                <input type="text" name="industry_contact_person" class ="form-control" placeholder = "Industry Contact Person" required="required" id="contact" value="{{$industryinteraction->industry_contact_person}}">
            </div>             
        </div>
    </div>
       
    <div class="row">
       <div class="col-sm-3">
            <div class="form-group">
                <label>Interaction Year:</label>
                <input type="year" class="form-control" placeholder="Year of Interaction" name="interaction_year" value="{{$industryinteraction->year}}">
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
  
     function validation(){
        var contact=document.getElementById("contact").value;
           var regcontact=/^[0-9]+$/
           console.log(contact);
           if(!contact.match(regcontact) || contact.length != 10){
               alert("enter vaild contact number");
               return false;
           }
           else{
               return true;
           }
     }
   
    </script>

 @endsection