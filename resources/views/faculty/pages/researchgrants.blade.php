@extends('faculty.layouts.dashboard')

@section('section')
<div class="page-container">
<form action="{{url('staff/addresearchgrants')}}" method="post">
        {{csrf_field()}}
    <h1>RESEARCH GRANTS</h1>
    <div class="row">
        <div class="col-sm-3">
            <div class="form-group">
                <label>Title Of Grant:</label>
                <input type="text" name="title_of_grant" class ="form-control" placeholder = "Enter title of grant" required="required">
            </div>             
        </div>
    </div>
    
    <div class="row">
        <div class="col-sm-3">
            <div class="form-group">
                <label>Agency:</label>
                <input type="text" name="agency" class ="form-control" placeholder = "Agency" required="required">
            </div>             
        </div>
    </div>

    <div class="row">
        <div class="col-sm-2">
            <div class="form-group">
                <label>Period From:</label>
                <input type="date" name="period_from" class ="form-control" placeholder = "From date" required="required">
            </div>             
        </div>
       
        <div class="col-sm-2">
            <div class="form-group">
                <label>Period To:</label>
                <input type="date" name="period_to" class ="form-control" placeholder = "To date" required="required">
            </div>             
        </div>
    </div>

    <div class="row">
        <div class="col-sm-3">
            <div class="form-group">
                <label>Grant Amount:</label>
                <input type="number" name="grant_amount" class ="form-control" placeholder = "Grant amount" required="required">
            </div>             
        </div>
    </div>

    <div class="row">
        <div class="col-sm-3">
            <div class="form-group">
                <label>Grant Year:</label>
                <input type="year" class="form-control" placeholder="Year of Grant" name="grant_year" required="required">
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