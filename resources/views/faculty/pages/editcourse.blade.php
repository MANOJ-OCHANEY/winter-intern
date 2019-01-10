@extends('faculty.layouts.dashboard')

@section('section')
<div class="page-container">
<form action="{{url('/staff/updatecourse')}}" method='post'> 
    {{csrf_field()}}
    <h1>EDIT Courses</h1>

   <input type="text" value="{{$course->id}}" name="courseid" hidden>
  
   <label>Course Description:</label>

    <div class="row">
        <div class="col-sm-3">
            <div class="form-group">
                <div>
                    
                    <input type="text" name="description"  placeholder="description" required class="form-control"  value="{{$course->description}}">
                </div>
            </div>            
        </div>   
    </div>

    <div class="row">
        <div class="col-sm-3">
            <div class="form-group">
                <label>Organised By:</label>
                <input type="text" name="organised_by" class='form-control' placeholder="name" required value="{{$course->organised_by}}">
            </div>             
        </div>
    </div>

    <div class="row">
        <div class="col-sm-3">
            <div class="form-group">
                <label>From Date:</label>
                <input type="date" name="from_date" class='form-control' placeholder="date" required value="{{$course->from_date}}">
            </div>             
        </div>
    
        <div class="col-sm-3">
            <div class="form-group">
                <label>To Date:</label>
                <input type="date" name="to_date" class='form-control' placeholder="date" required value="{{$course->to_date}}">
            </div>             
        </div>
    </div>

    <div class="row">
        <div class="col-sm-3">
            <div class="form-group">
                <label>Number of Days:</label>
                <input type="number" name="no_of_days" class='form-control' placeholder="number of days" required value="{{$course->no_of_days}}">
            </div>             
        </div>
    </div>

    <div class="row">
        <div class="col-sm-3">
            <div class="form-group">
                <label>Place:</label>
                <input type="text" name="place" class='form-control' placeholder="place" required value="{{$course->place}}">
            </div>             
        </div>
    </div>

    <div class="row">
        <div class="col-sm-3">
            <div class="form-group">
                <label>Conducted/Attended:</label><br>
               
                <input type="radio" name="conducted_attended"  value="1"  @if($course->conducted_attended == 1) checked="checked" @endif >Conducted
                <input type="radio" name="conducted_attended"  value="0" @if($course->conducted_attended == 0) checked="checked" @endif>Attended 
            </div>             
        </div>
    </div>

    {{-- {{Form::hidden('_method', 'PATCH')}} --}}
    <div class="row">
        <div class="col-sm-4">
            {{Form::submit('Submit', ['class' =>'btn btn-primary'])}}
        </div>
    </div>
    {{-- {{Form::submit('Submit', ['class' =>'btn btn-primary'])}} --}}
    {!! Form::close() !!}
</div>
{{-- 
<script type="text/javascript">
$(document).ready(function(){
    var maxField = 10; //Input fields increment limitation
    var addButton = $('.add_button1'); //Add button selector
    var wrapper = $('.field_wrapper1'); //Input field wrapper
    var fieldHTML1 = '<div><input type="text1" name="field_name1[]" value="" placeholder="name"/><a href="#" class="btn btn-default remove_button1">Remove</a></div>'; //New input field html 
    var x = 1; //Initial field counter is 1
    
    //Once add button is clicked
    $(addButton).click(function(){
        //Check maximum number of input fields
        if(x < maxField){ 
            x++; //Increment field counter
            $(wrapper).append(fieldHTML1); //Add field html
        }
    });
    
    //Once remove button is clicked
    $(wrapper).on('click', '.remove_button1', function(e){
        e.preventDefault();
        $(this).parent('div').remove(); //Remove field html
        x--; //Decrement field counter
    });
});
</script>--}}
 @endsection
 
 