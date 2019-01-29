@extends('faculty.layouts.dashboard')
@section('page_heading','Profile')
@section('section')

<div class="container-fluid">
    {{-- Search faculty   --}}
    {{-- {{ Form::open(['action' => url('/staff/facultyreports'), 'method'=>'POST']) }} --}}
    <form action=" {{ url('/staff/facultyreports') }} " method="POST" class="form-inline" id="report-form" onsubmit="return validateForm()">
        {{ csrf_field() }}
        <input type="hidden" name="hidden_eid" class="hidden_eid" value="{{ session('e_id') }}" id="hidden_eid">
        <label>Select particular Academic year or select all years</label>
        <div id="year">
            <select name="academic_year" class="form-control" id="academic_year" required>
                <option value="">Select..</option>
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

            <input class="form-check-input cat" type="checkbox" name="category[]" value="paper_publications">
            <label class="form-check-label" for="all">Paper Publications</label>
            <span style="margin: 0 10px;">OR</span>
            <input class="form-check-input" type="checkbox" name="all_cat" id="all_cat" value="true">
            <label class="form-check-label" for="all">All</label><br>
            <input class="form-check-input cat" type="checkbox" name="category[]" value="courses_conducted">
            <label class="form-check-label" for="all">Courses Conducted</label><br>
            <input class="form-check-input cat" type="checkbox" name="category[]" value="courses_attended">
            <label class="form-check-label" for="all">Courses Attended</label><br>
            <input class="form-check-input cat" type="checkbox" name="category[]" value="patents">
            <label class="form-check-label" for="all">Patent Details</label><br>
            <input class="form-check-input cat" type="checkbox" name="category[]" value="activities">
            <label class="form-check-label" for="all">Activities</label><br>
            <input class="form-check-input cat" type="checkbox" name="category[]" value="research_grants">
            <label class="form-check-label" for="all">Research Grants</label><br>
            <input class="form-check-input cat" type="checkbox" name="category[]" value="industry_interactions">
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
    $(document).ready(function()
    {
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
    });
</script>

@stop