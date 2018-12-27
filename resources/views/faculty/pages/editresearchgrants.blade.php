@extends('faculty.layouts.dashboard')

@section('section')
<div class="page-container">
<form action="{{url('staff/editresearchgrants')}}" method="post" onsubmit="return validation()">
        {{csrf_field()}}
    <h1>EDIT RESEARCH GRANTS</h1>
    <input type="text" name="grantid" value="{{$grant->id}}" hidden>
    <div class="row">
        <div class="col-sm-3">
            <div class="form-group">
                <label>Title Of Grant:</label>
                <input type="text" name="title_of_grant" class ="form-control" placeholder = "Enter title of grant" required="required" value="{{$grant->title}}">
            </div>             
        </div>
    </div>
    
    <div class="row">
        <div class="col-sm-3">
            <div class="form-group">
                <label>Agency:</label>
                <input type="text" name="agency" class ="form-control" placeholder = "Agency" required="required" value="{{$grant->agency}}">
            </div>             
        </div>
    </div>

    <div class="row">
        <div class="col-sm-2">
            <div class="form-group">
                <label>Period From:</label>
                <input type="date" name="period_from" class ="form-control" placeholder = "From date" required="required" value="{{$grant->period_from}}">
            </div>             
        </div>
       
        <div class="col-sm-2">
            <div class="form-group">
                <label>Period To:</label>
                <input type="date" name="period_to" class ="form-control" placeholder = "To date" required="required" value="{{$grant->period_to}}">
            </div>             
        </div>
    </div>

    <div class="row">
        <div class="col-sm-3">
            <div class="form-group">
                <label>Grant Amount:</label>
                <input type="number" name="grant_amount" class ="form-control" placeholder = "Grant amount" required="required" id="amount" value="{{$grant->grant_amount}}">
            </div>             
        </div>
    </div>

    <div class="row">
        <div class="col-sm-3">
            <div class="form-group">
                <label>Grant Year:</label>
                <input type="year" class="form-control" placeholder="Year of Grant" name="grant_year" required="required" value="{{$grant->year}}">
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
    var amount=document.getElementById("amount").value;
       var regamount=/^[0-9]+$/
       console.log(contact);
       if(!contact.match(regcontact)){
           alert("enter vaild amount");
           return false;
       }
       else{
           return true;
       }
 }
 </script>
 @endsection