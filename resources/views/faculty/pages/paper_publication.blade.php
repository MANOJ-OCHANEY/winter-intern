@extends('faculty.layouts.dashboard')

@section('section')
<div class="page-container">
<form action="paper/added" method='post'> 
    {{csrf_field()}}
    <h1>Paper Publication</h1>

    <div class="row">
        <div class="col-sm-3">
            <div class="form-group">
                <label>Title of the paper:</label>
                <input type="text" name="title" class='form-control' placeholder="Title of the paper" required>
            </div>             
        </div>
        
    </div>

    <label>Authors and Co-authors:</label>

    <div class="row">
        <div class="col-sm-3">
            <div class="field_wrapper1">
            <label>Author</label>
                <div>
                    <input type="text1" name="field_name1[]" value="" placeholder="name" required/>
                    <a href="#" class="btn btn-default add_button1" title="Add field1">Add</a>
                </div>
            </div>            
        </div>
        
    </div>

    <div class="row">
        <div class="col-sm-3">
            <div class="field_wrapper2">
                <label>Co-Author</label>
                <div>
                    <input type="text2" name="field_name2[]" value="" placeholder="name" required/>
                    <a href="#" class="btn btn-default add_button2" title="Add field2">Add</a>
                </div>
            </div>             
        </div>
    </div> 

    <div class="row">
        <div class="col-sm-3">
            <div class="form-group">
                <label>ISSN/ISBN number:</label>
                <input type="text" name="issn_isbn" class='form-control' placeholder="number" required>
            </div>             
        </div>
    </div>
    
    <div class="row">
        <div class="col-sm-5">
            <div class="form-group">
            <label>Paper Format:</label><br>
            <select name="type">
            <option value="0">IC</option>
            <option value="1">IJ</option>
            <option value="2">IEEE</option>
            <option value="3">IEEE XPLORE</option>
            <option value="4">SPRINGER</option>

            </select>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-sm-3">
            <div class="form-group">
                <label>DOI:</label>
                <input type="text" name="doi" class='form-control' placeholder="doi" required>
            </div>             
        </div>
    </div>

    <div class="row">
        <div class="col-sm-3">
            <div class="form-group">
                <label>Date of conference/published:</label>
                <input type="date" name="dop" class='form-control' placeholder="Date of conference/published" required>
            </div>             
        </div>
    </div>

    <div class="row">
        <div class="col-sm-3">
            <div class="form-group">
                <label>Place:</label>
                <input type="text" name="place" class='form-control' placeholder="place" required>
            </div>             
        </div>
    </div>

    <div class="row">
        <div class="col-sm-3">
            <div class="form-group">
                <label>Link of the paper:</label>
                <input type="text" name="link" class='form-control' placeholder="Link of the paper" required>
            </div>             
        </div>
    </div>

    <div class="row">
        <div class="col-sm-3">
            <div class="form-group">
                <label>Are you Author/Co-author?</label><br>
                <input type="radio" name="isauthor" value="1">Author &nbsp; &nbsp;
                <input type="radio" name="isauthor" value="0">Co-author<br>
            </div>             
        </div>
    </div>

    <div class="row">
        <div class="col-sm-3">
            <div class="form-group">
                <label>Year:</label>
                <input type="number" name="year" class='form-control' placeholder="year" required>
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

$(document).ready(function(){
    var maxField = 10; //Input fields increment limitation
    var addButton = $('.add_button2'); //Add button selector
    var wrapper = $('.field_wrapper2'); //Input field wrapper
    var fieldHTML2 = '<div><input type="text2" name="field_name2[]" value="" placeholder="name"/><a href="" class="btn btn-default remove_button2">Remove</a></div>'; //New input field html 
    var y = 1; //Initial field counter is 1
    
    //Once add button is clicked
    $(addButton).click(function(){
        //Check maximum number of input fields
        if(y < maxField){ 
            y++; //Increment field counter
            $(wrapper).append(fieldHTML2); //Add field html
        }
    });
    
    //Once remove button is clicked
    $(wrapper).on('click', '.remove_button2', function(e){
        e.preventDefault();
        $(this).parent('div').remove(); //Remove field html
        y--; //Decrement field counter
    });
});
</script>

 @endsection
 
 