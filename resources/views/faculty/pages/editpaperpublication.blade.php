@extends('faculty.layouts.dashboard')

@section('section')
<div class="page-container">
<form action=" {{ url('/staff/editpaperpublications') }} " method='post'> 
    {{csrf_field()}}
    <h1>Paper Publication</h1>
    <input type="text" value=" {{ $paper->id }} " name="paperid" hidden>

    <div class="row">
        <div class="col-sm-6">
            <div class="form-group">
                <label>Title of the paper:</label>
                <input type="text" name="title" class='form-control' placeholder="Title of the paper" value=" {{ $paper->title }} " required>
            </div>             
        </div>
        
    </div>

    {{-- <label>Authors and Co-authors:</label> --}}

    <div class="row">
        <div class="col-sm-3">
            <div class="form-group">
            <label>Author</label>
                {{-- <div> --}}
                    <input type="text" name="author_names" class="form-control" placeholder="Author Name" value=" {{ $paper->author_names }} " required/>
                {{-- </div> --}}
            </div>            
        </div>
        
    </div>

    <div class="row">
        <div class="col-sm-3">
            <div class="form-group field_wrapper2">
                <label>Co-Author (if any)</label>
                @foreach($paper->coauthors as $coauthor)
                {{-- <input type="text" name="coauthor_names[]" class="form-control" value=" {{ $coauthor }} " placeholder="Co-author Name"/> --}}
                <div style="margin-top:5px">
                    <input type="text" name="coauthor_names[]" class="form-control" value="{{ $coauthor }}" style="display:inline-block;width:83%" placeholder="Co-author Name">
                    <button class="btn remove_button2" type="button" style="display:inline-block;width:15%">&#10006</button>
                </div>
                @endforeach
                {{-- <div></div> --}}
                <a href="#" class="btn btn-default btn-block add_button2" style="margin-top:10px;" title="Add field2">Add more</a>
            </div>             
        </div>
    </div> 

    <div class="row">
        <div class="col-sm-6">
            <div class="form-group">
                <label>ISSN/ISBN number:</label>
                <input type="text" name="issn_isbn" class='form-control' placeholder="ISSN/ISBN Number" value=" {{ $paper->issn_isbn }} " required>
            </div>             
        </div>
    </div>
    
    <div class="row">
        <div class="col-sm-4">
            <div class="form-group">
            <label>Paper Format:</label><br>
            <select name="type" class="form-control" required>
                <option value="">Select...</option>
                @foreach($paper_formats as $paper_format)
                <option value="{{ $paper_format }}" @if($paper_format == $paper->type) selected @endif> {{ $paper_format }} </option>
                @endforeach
            </select>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-sm-6">
            <div class="form-group">
                <label>DOI:</label>
                <input type="text" name="doi" class='form-control' placeholder="doi" value=" {{ $paper->doi }} " required>
            </div>             
        </div>
    </div>

    <div class="row">
        <div class="col-sm-3">
            <div class="form-group">
                <label>Date of conference/published:</label>
                <input type="date" name="dop" class='form-control' placeholder="Date of conference/published" value="{{ date($paper->dop) }}" required>
            </div>             
        </div>
    </div>

    <div class="row">
        <div class="col-sm-3">
            <div class="form-group">
                <label>Place:</label>
                <input type="text" name="place" class='form-control' placeholder="place" value=" {{ $paper->place }} " required>
            </div>             
        </div>
    </div>

    <div class="row">
        <div class="col-sm-6">
            <div class="form-group">
                <label>Link of the paper:</label>
                <input type="text" name="link" class='form-control' placeholder="Link of the paper" value=" {{ $paper->link }} " required>
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
                            <option value="{{ $from_year }}" @if($from_year == $paper->from_year) selected @endif> {{ $from_year }} </option>
                            @endforeach
                        </select>
                    </div>
                    <span class="col-sm-1">&#8211</span>
                    <div class="col-sm-5">
                        {{-- <select name="year[]" class="form-control" id="to-year" required>
                            <option value="">To</option>
                            @foreach($to_years as $to_year)
                            <option value="{{ $to_year }}" @if($to_year == $paper->to_year) selected @endif> {{ $to_year }} </option>
                            @endforeach
                        </select> --}}
                        <input type="text" class="form-control" name="year[]" value="{{ $paper->to_year }}" id="to-year" readonly>
                    </div>
                </div>
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
    var addButton = $('.add_button2'); //Add button selector
    var wrapper = $('.field_wrapper2'); //Input field wrapper
    // var fieldHTML2 = '<div><input type="text" name="field_name2[]" value="" placeholder="name"/><a href="" class="btn btn-default remove_button2">Remove</a></div>'; //New input field html 
    var fieldHTML2 = `<div style="margin-top:5px">
                        <input type="text" name="coauthor_names[]" class="form-control" style="display:inline-block;width:83%" placeholder="Co-author Name">
                        <button class="btn remove_button2" type="button" style="display:inline-block;width:15%">&#10006</button>
                      </div>`; //New input field html 
    var y = 1; //Initial field counter is 1
    
    //Once add button is clicked
    $(addButton).click(function(){
        //Check maximum number of input fields
        if(y < maxField){ 
            y++; //Increment field counter
            $(addButton).before(fieldHTML2); //Add field html
        }
    });
    
    //Once remove button is clicked
    $(wrapper).on('click', '.remove_button2', function(e){
        e.preventDefault();
        $(this).parent('div').remove(); //Remove field html
        y--; //Decrement field counter
    });

    $('#from-year').on('change', function() {
        value = $(this).val();
        $('#to-year').val(parseInt(value)+1);
    });
});
</script>

 @endsection
 
 