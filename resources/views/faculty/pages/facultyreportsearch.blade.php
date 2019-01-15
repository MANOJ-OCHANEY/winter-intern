@extends('faculty.layouts.dashboard')
@section('page_heading','Profile')
@section('section')

<div class="container-fluid">
    {{-- Search faculty   --}}
    {{-- {{ Form::open(['action' => url('/staff/facultyreports'), 'method'=>'POST']) }} --}}
    <form action=" {{ url('/staff/facultyreports') }} " method="POST" class="form-inline" id="report-form" onsubmit="return validateForm()">
        {{ csrf_field() }}
        <label>Search by particular faculty or select all faculty</label>
        <div id="search-bar">
            <input type="text" class="form-control" placeholder="Search Faculty" name="faculty" id="faculty" required onkeypress="return event.keyCode != 13;">
            <span style="margin: 0 10px;">OR</span>
            <input class="form-check-input" type="checkbox" name="all_faculty" id="all_faculty" value="true">
            <label class="form-check-label" for="all">All</label>
            <input type="hidden" name="hidden_eid" class="hidden_eid" id="hidden_eid">
            <div class="suggestion"></div>
        </div>
        <br>
        <label>Select particular Academic year or select all years</label>
        <div id="year">
            <select name="academic_year" class="form-control" id="academic_year" required>
                @foreach($academic_years as $academic_year)
                <option value="{{ $academic_year }}"> {{ $academic_year }} </option>
                @endforeach
            </select> 
            <span style="margin: 0 10px;">OR</span>
            <input class="form-check-input" type="checkbox" name="all_year" id="all_year" value="true">
            <label class="form-check-label" for="all">All</label>
        </div>
        <br>
        <label>Select particular categories or select all</label>
        <div id="category">
            <input class="form-check-input cat" type="checkbox" name="category[]" value="paper-publications">
            <label class="form-check-label" for="all">Paper Publications</label>
            <span style="margin: 0 10px;">OR</span>
            <input class="form-check-input" type="checkbox" name="all_cat" id="all_cat" value="true">
            <label class="form-check-label" for="all">All</label><br>
            <input class="form-check-input cat" type="checkbox" name="category[]" value="courses-conducted">
            <label class="form-check-label" for="all">Courses Conducted</label><br>
            <input class="form-check-input cat" type="checkbox" name="category[]" value="courses-attended">
            <label class="form-check-label" for="all">Courses Attended</label><br>
            <input class="form-check-input cat" type="checkbox" name="category[]" value="patents-details">
            <label class="form-check-label" for="all">Patent Details</label><br>
            <input class="form-check-input cat" type="checkbox" name="category[]" value="activities">
            <label class="form-check-label" for="all">Activities</label><br>
            <input class="form-check-input cat" type="checkbox" name="category[]" value="research-grants">
            <label class="form-check-label" for="all">Research Grants</label><br>
            <input class="form-check-input cat" type="checkbox" name="category[]" value="industry-interaction">
            <label class="form-check-label" for="all">Industry Interactions</label><br>
            <input class="form-check-input cat" type="checkbox" name="category[]" value="invitations">
            <label class="form-check-label" for="all">Invitations</label><br>
        </div>
        <br>
        <input type="submit" class="btn btn-primary" value="Submit">
    </form>
    {{-- {{ Form::close() }} --}}
</div>

<script>

    function validateForm() {
        var categories = $('#report-form').find('input[name="category[]"]:checked');
        var all_cat = $('#report-form').find('input[name="all_cat"]:checked');
        // console.log(categories);
        // console.log(all_cat);
        // return false;
        if (!categories.length && !all_cat.length) {
            alert('You must check at least one category.');
            return false; // The form will *not* submit
        }
    }
    // Real time Suggestions 
    $(document).ready(function()
    {
        $('#all_faculty').on('change',function() {
            // console.log(this.value);
            if(this.checked) {
                // console.log('hi');
                $('#faculty').attr('disabled','disabled');
            }
            else {
                $('#faculty').removeAttr('disabled');
            }
        });

        $('#all_year').on('change',function() {
            // console.log(this.checked);
            if(this.checked) {
                // console.log('hi');
                $('#academic_year').attr('disabled','disabled');
            }
            else {
                $('#academic_year').removeAttr('disabled');
            }
        });

        $('#all_cat').on('change',function() {
            // console.log(this.checked);
            if(this.checked) {
                // console.log('hi');
                $('.cat').attr('disabled','disabled');
            }
            else {
                $('.cat').removeAttr('disabled');
            }
        });

        

        $(document).on('keyup','#faculty',function()
        {
            var field_value = $(this).val();
            var tr = $(this).parent().parent();
            if(field_value.length > 1)
            {
                console.log(field_value);
                $.ajax(
                {
                    type:'get',
                    url:'/staff/facultysuggestion',
                    data:{'field_value': field_value},
                    success:function(match){
                        console.log(match);
                        console.log(match['e_id']);
                        var cc_name = match['first_name']+' '+match['last_name'];
                        if(cc_name != "undefined undefined")
                        {
                            tr.find('.suggestion').html(cc_name);
                            tr.find('hidden_eid').val(match['e_id']);
                        }
                        else
                        {
                            tr.find('.suggestion').html("Not Found");
                        }
                        $(document).on('change','#faculty',function()
                        {
                            if(cc_name != "undefined undefined")
                            {
                                tr.find('#faculty').val(cc_name);
                                tr.find('.suggestion').html('');
                                tr.find('.hidden_eid').val(match['e_id']);
                            }
                        });
                    },
                    error:function(){
                        console.log("Error");
                    }
                });
            }
        });

        
    });
</script>

@stop