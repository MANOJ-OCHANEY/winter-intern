@extends('faculty.layouts.dashboard')

@section('section')
<div class="page-container">
<form action="patent/added" method='post'> 
    {{csrf_field()}}
    <h1>Patent</h1>

    <div class="row">
        <div class="col-sm-3">
            <div class="form-group">
                <label>Patent Name:</label>
                <input type="text" name="name" class='form-control' placeholder="name" required>
            </div>             
        </div>
        
    </div>

    <div class="row">
        <div class="col-sm-3">
            <div class="form-group">
                <label>Application Number:</label>
                <input type="text" name="application_number" class='form-control' placeholder="application number" required>
            </div>             
        </div>
    </div>

    <div class="row">
        <div class="col-sm-3">
            <div class="form-group">
                <label>Patent Inventor name:</label>
                <input type="text" name="patent_inventor_name" class='form-control' placeholder="inventor name" required>
            </div>             
        </div>
    </div>

    <div class="row">
        <div class="col-sm-3">
            <div class="form-group">
                <label>Type of User:</label>
                <input type="text" name="type_of_user" class='form-control' placeholder="username" required>
            </div>             
        </div>
    </div>

    <label>Co Inventor:</label>

    <div class="row">
        <div class="col-sm-3">
            <div class="field_wrapper1">
                <div>
                    <input type="text1" name="field_name1[]" value="" placeholder="name" required/>
                    <a href="#" class="btn btn-default add_button1" title="Add field1">Add</a>
                </div>
            </div>            
        </div>
        
    </div>

    <div class="row">
        <div class="col-sm-3">
            <div class="form-group">
                <label>Status:</label>
                <input type="text" name="status" class='form-control' placeholder="status" required>
            </div>             
        </div>
    </div>

    <div class="row">
        <div class="col-sm-3">
            <div class="form-group">
                <label>Academic Year:</label>
                <input type="number" name="year" class='form-control' required>
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
</script>
 @endsection
 
 