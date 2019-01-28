@extends('faculty.layouts.dashboard')

@section('section')
<div class="page-container">    
<form action="{{url('staff/editindustryinteractions')}}" method="post" id="industryform" onsubmit="return validation()">
    {{csrf_field()}}
    <h1>EDIT INDUSTRY INTERACTION </h1>
    <input type="text" name="interactionid" value="{{$industryinteraction->id}}" hidden>
    <div class="row">
        <div class="col-sm-5">
            <div class="form-group">
                <label>Title Of Industry Project:</label>
                <input type="text" name="title_of_industry_project" class ="form-control" placeholder = "Enter title of industry project" required="required" value="{{$industryinteraction->title_of_industry_project}}">
            </div>             
        </div>
    </div>

    <div class="row">
        <div class="col-sm-5">
            <div class="form-group">
                <label>Industry Name :</label>
                <input type="text" name="industry_name" class ="form-control" placeholder = "Industry" required="required" value="{{$industryinteraction->industry_name}}">
            </div>             
        </div>
    </div>
    
    <div class="row">
        <div class="col-sm-3">
            <div class="form-group">
                <label>Industry Faculty Person Name :</label>
                <input type="text" name="industry_faculty_name" class ="form-control" placeholder = "Name" required="required" value="{{$industryinteraction->industry_faculty_name}}">
            </div>             
        </div>
    </div>
    
    <div class="row">
        <div class="col-sm-3">
            <div class="form-group">
                <label>Industry Faculty Person Contact :</label>
                <input type="text" name="industry_faculty_contact" class ="form-control" placeholder = "Contact" required="required" id="contact" value="{{$industryinteraction->industry_faculty_contact}}">
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
                            <option value="{{ $from_year }}" @if($from_year == $industryinteraction->from_year) selected @endif> {{ $from_year }} </option>
                            @endforeach
                        </select>
                    </div>
                    <span class="col-sm-1">&#8211</span>
                    <div class="col-sm-5">
                        {{-- <select name="year[]" class="form-control" id="to-year" required>
                            <option value="">To</option>
                            @foreach($to_years as $to_year)
                            <option value="{{ $to_year }}" @if($to_year == $industryinteraction->to_year) selected @endif> {{ $to_year }} </option>
                            @endforeach
                        </select> --}}
                        <input type="text" class="form-control" name="year[]" value="{{ $industryinteraction->to_year }}" id="to-year" readonly>
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
   
$(document).ready(function() {
    $('#from-year').on('change', function() {
        value = $(this).val();
        $('#to-year').val(parseInt(value)+1);
    });
}); 
</script>

 @endsection