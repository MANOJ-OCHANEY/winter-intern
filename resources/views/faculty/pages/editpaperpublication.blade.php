@extends('faculty.layouts.dashboard')

@section('section')
<div class="page-container">
<form action="{{url('/staff/updatepaperpublications')}}" method='post'> 
    {{csrf_field()}}
    <h1>Paper Publication</h1>
<input type="text" name="paperid" hidden value="{{$paper->id}}">
    <div class="row">
        <div class="col-sm-3">
            <div class="form-group">
                <label>Title of the paper:</label>
                <input type="text" name="title" class='form-control' placeholder="Title of the paper" required value="{{$paper->title}}">
            </div>             
        </div>
        
    </div>
    <label>Authors and Co-authors:</label>
   <div> <label>Author</label></div>
    <div class="field_wrapper1">
        @foreach($authors as $author)
    <div class="row">
        <div class="col-sm-3">
            
            
                <div class="input-group">
                    <input type="text1" name="field_name1[]"  placeholder="name" required value="{{$author}}"/>
                    <span class="input-group-addon btn btn-danger btn-sm remove_button1">Remove</span>
                </div>
            </div>            
        </div>  
        @endforeach  
    </div>
 
    <a href="#" class="btn btn-success add_button1 " title="Add field1">Add</a>


    <div><label>Co-Author</label></div>
    <div class="field_wrapper2">
        @foreach($coauthors as $coauthor)
    <div class="row">
        <div class="col-sm-3">
            
                
                <div class="input-group">
                    <input type="text2" name="field_name2[]"  placeholder="name" required value="{{$coauthor}}"/>
                    <span class="input-group-addon btn btn-danger btn-sm remove_button2">Remove</span>
                </div>
            </div>             
        </div>
        @endforeach
    </div> 
    <a href="#" class="btn btn-success add_button2" title="Add field2">Add</a>

    <div class="row">
        <div class="col-sm-3">
            <div class="form-group">
                <label>ISSN/ISBN number:</label>
            <input type="text" name="issn_isbn" class='form-control' placeholder="number" required value="{{$paper->issn_isbn}}">
            </div>             
        </div>
    </div>
    
    <div class="row">
        <div class="col-sm-5">
            <div class="form-group">
            <label>Paper Format:</label><br>
            <select name="type">
            <option value="0" @if($paper->type=='0') selected @endif >IC</option>
            <option value="1" @if($paper->type=='1') selected @endif >IJ</option>
            <option value="2" @if($paper->type=='2') selected @endif >IEEE</option>
            <option value="3" @if($paper->type=='3') selected @endif >IEEE XPLORE</option>
            <option value="4" @if($paper->type=='4') selected @endif >SPRINGER</option>

            </select>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-sm-3">
            <div class="form-group">
                <label>DOI:</label>
                <input type="text" name="doi" class='form-control' placeholder="doi" required value={{$paper->doi}}>
            </div>             
        </div>
    </div>

    <div class="row">
        <div class="col-sm-3">
            <div class="form-group">
                <label>Date of conference/published:</label>
                <input type="date" name="dop" class='form-control' placeholder="Date of conference/published" required value={{$paper->dop}}>
            </div>             
        </div>
    </div>

    <div class="row">
        <div class="col-sm-3">
            <div class="form-group">
                <label>Place:</label>
            <input type="text" name="place" class='form-control' placeholder="place" required value="{{$paper->place}}">
            </div>             
        </div>
    </div>

    <div class="row">
        <div class="col-sm-3">
            <div class="form-group">
                <label>Link of the paper:</label>
            <input type="text" name="link" class='form-control' placeholder="Link of the paper" required value="{{$paper->link}}">
            </div>             
        </div>
    </div>

    

    <div class="row">
        <div class="col-sm-3">
            <div class="form-group">
                <label>Year:</label>
                <input type="number" name="year" class='form-control' placeholder="year" required value="{{$paper->year}}">
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
    var fieldHTML1 = '<div><input type="text1" name="field_name1[]" value="" placeholder="author" /><a href="#" class="btn btn-danger btn-sm remove_button1">Remove</a></div>'; //New input field html 
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
    var fieldHTML2 = '<div><input type="text2" name="field_name2[]" value="" placeholder="coauthor"/><a href="" class="btn btn-danger remove_button2">Remove</a></div>'; //New input field html 
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
 
 