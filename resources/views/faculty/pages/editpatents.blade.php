@extends('faculty.layouts.dashboard')

@section('section')
<div class="page-container">
<form action="{{url('/staff/editpatents')}}" method='post'> 
    {{csrf_field()}}
    <h1>Patent</h1>
    <input type="text" value="{{$patent->id}}" name="patentid" hidden>
    <div class="row">
        <div class="col-sm-3">
            <div class="form-group">
                <label>Patent Name:</label>
                <input type="text" name="name" class='form-control' placeholder="name" required value="{{$patent->name}}">
            </div>             
        </div>
        
    </div>

    <div class="row">
        <div class="col-sm-3">
            <div class="form-group">
                <label>Application Number:</label>
                <input type="text" name="application_number" class='form-control' placeholder="application number" required value="{{$patent->application_no}}">
            </div>             
        </div>
    </div>

    <div class="row">
        <div class="col-sm-3">
            <div class="form-group">
                <label>Patent Inventor name:</label>
                <input type="text" name="patent_inventor_name" class='form-control' placeholder="inventor name" required value="{{$patent->inventor}}">
            </div>             
        </div>
    </div>

    <div class="row">
        <div class="col-sm-3">
            <div class="form-group">
                <label>Type of User:</label>
                <input type="text" name="type_of_user" class='form-control' placeholder="username" required value="{{$patent->type_of_user}}">
            </div>             
        </div>
    </div>

    <label>Co Inventor:</label>

    
    <div class="field_wrapper1">
   @foreach($coinventors as $coinventor)
    <div class="row">
        <div class="col-sm-3">
                <div class="form-group">
                <div class="input-group">
            
                    <input type="text" name="field_name1[]" placeholder="coinventorname" required value="{{$coinventor}}"  />
                   <span class="input-group-addon btn btn-danger btn-sm remove_button1">Remove</span>
                </div>
                   </div>
                </div>
            </div>            
        @endforeach
    </div>

        <a href="#" class="btn btn-success add_button1" title="Add field1">Add</a>

    <div class="row">
        <div class="col-sm-3">
            <div class="form-group">
                <label>Status:</label>
                <input type="text" name="status" class='form-control' placeholder="status" required value="{{$patent->status}}">
            </div>             
        </div>
    </div>

    <div class="row">
        <div class="col-sm-3">
            <div class="form-group">
                <label>Academic Year:</label>
                <input type="number" name="year" class='form-control' required value="{{$patent->year}}">
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

<style>
    .input-group-addon{

  background-color:#d9534f;
  color:white;
}
    </style>


<script type="text/javascript">
$(document).ready(function(){
    var maxField = 10; //Input fields increment limitation
    var addButton = $('.add_button1'); //Add button selector
    var wrapper = $('.field_wrapper1'); //Input field wrapper
    var fieldHTML1 = '<div><input type="text1" name="field_name1[]" value="" placeholder="coinventorname" /><a href="#" class="btn btn-danger btn-sm remove_button1">Remove</a></div>'; //New input field html 
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
 
 