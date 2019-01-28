@extends('faculty.layouts.dashboard')

@section('section')
<div class="page-container">
<form action="{{url('staff/editresearchgrants')}}" method="post" onsubmit="return validation()">
        {{csrf_field()}}
    <h1>EDIT RESEARCH GRANTS</h1>
    <input type="text" name="grantid" value="{{$grant->id}}" hidden>
    <div class="row">
        <div class="col-sm-5">
            <div class="form-group">
                <label>Title Of Grant:</label>
                <input type="text" name="title_of_grant" class ="form-control" placeholder = "Enter title of grant" required="required" value="{{$grant->title}}">
            </div>             
        </div>
    </div>
    
    <div class="row">
        <div class="col-sm-4">
            <div class="form-group">
                <label>Agency:</label>
                <input type="text" name="agency" class ="form-control" placeholder = "Agency" required="required" value="{{$grant->agency}}">
            </div>             
        </div>
    </div>

    <div class="row">
        <div class="col-sm-3">
            <div class="form-group">
                <label>Grant Amount: (in Rs. lakhs)</label>
                <input type="number" name="grant_amount" class ="form-control" placeholder = "Grant amount" required="required" min="0" step="any" id="amount" value="{{$grant->grant_amount}}">
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
                            <option value="{{ $from_year }}" @if($from_year == $grant->from_year) selected @endif> {{ $from_year }} </option>
                            @endforeach
                        </select>
                    </div>
                    <span class="col-sm-1">&#8211</span>
                    <div class="col-sm-5">
                        {{-- <select name="year[]" class="form-control" id="to-year" required>
                            <option value="">To</option>
                            @foreach($to_years as $to_year)
                            <option value="{{ $to_year }}" @if($to_year == $grant->to_year) selected @endif> {{ $to_year }} </option>
                            @endforeach
                        </select> --}}
                        <input type="text" class="form-control" name="year[]" value="{{ $grant->to_year }}" id="to-year" readonly>
                    </div>
                </div>
            </div>             
        </div>
    </div>

    <div class="row">
        <div class="col-sm-3">
            <div class="form-group">
                <label>Duration / Period :</label>
                <select name="period" class="form-control" required>
                    <option value="">Select...</option>
                    @foreach($period_types as $period_type)
                    <option value="{{ $period_type }}" @if($period_type == $grant->period) selected @endif> {{ $period_type }} </option>
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

 $(document).ready(function() {
    $('#from-year').on('change', function() {
        value = $(this).val();
        $('#to-year').val(parseInt(value)+1);
    });
 });
 </script>
 @endsection