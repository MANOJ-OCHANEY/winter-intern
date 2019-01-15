@extends('faculty.layouts.dashboard')
@section('page_heading','Profile')
@section('section')

<div class="container-fluid">
    {{-- Search faculty   --}}
    {{-- {{ Form::open(['action' => url('/staff/facultyreports'), 'method'=>'POST']) }} --}}
    <form action=" {{ url('/staff/facultyreports') }} " method="POST" class="form-inline">
        {{ csrf_field() }}
        <label>Search by particular faculty or select all faculty</label>
        <div id="search-bar">
            <input type="text" class="form-control" placeholder="Search Faculty" name="faculty" id="faculty" required onkeypress="return event.keyCode != 13;">
            <span style="margin: 0 10px;">OR</span>
            <input class="form-check-input" type="checkbox" name="all_faculty" id="all_faculty">
            <label class="form-check-label" for="all">All</label>
            <input type="hidden" name="hidden_eid" class="hidden_eid" id="hidden_eid">
            <div class="suggestion"></div>
        </div>
        <br>
        <label>Select particular Academic year or select all years</label>
        <div id="year">
            <select name="academic_year" class="form-control" id="academic_year">
                @foreach($academic_years as $academic_year)
                <option value="{{ $academic_year }}"> {{ $academic_year }} </option>
                @endforeach
            </select> 
            <span style="margin: 0 10px;">OR</span>
            <input class="form-check-input" type="checkbox" name="all_year" id="all_year">
            <label class="form-check-label" for="all">All</label>
        </div>
        <br>
        <label>Select particular categories or select all years</label>
        <div id="category">
            <input class="form-check-input" type="checkbox" name="all_year" class="cat">
            <label class="form-check-label" for="all">Paper Publications</label>
            <input class="form-check-input" type="checkbox" name="all_year" class="cat">
            <label class="form-check-label" for="all">Courses Conducted</label>
            <input class="form-check-input" type="checkbox" name="all_year" class="cat">
            <label class="form-check-label" for="all">All</label>
            <input class="form-check-input" type="checkbox" name="all_year" class="cat">
            <label class="form-check-label" for="all">All</label>
            <input class="form-check-input" type="checkbox" name="all_year" class="cat">
            <label class="form-check-label" for="all">All</label>
            <input class="form-check-input" type="checkbox" name="all_year" class="cat">
            <label class="form-check-label" for="all">All</label>
            <span style="margin: 0 10px;">OR</span>
            <input class="form-check-input" type="checkbox" name="all_year" id="all_year">
            <label class="form-check-label" for="all">All</label>
        </div>
    </form>
    {{-- {{ Form::close() }} --}}
</div>

<script>
    // Real time Suggestions 
    $(document).ready(function()
    {
        $('#all_faculty').on('change',function() {
            // console.log(this.checked);
            if(this.checked) {
                console.log('hi');
                $('#faculty').attr('disabled','disabled');
            }
            else {
                $('#faculty').removeAttr('disabled');
            }
        });

        $('#all_year').on('change',function() {
            // console.log(this.checked);
            if(this.checked) {
                console.log('hi');
                $('#academic_year').attr('disabled','disabled');
            }
            else {
                $('#academic_year').removeAttr('disabled');
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