@extends('faculty.layouts.dashboard')
@section('page_heading','Profile')
@section('section')

<div class="container-fluid">
    {{-- Search faculty   --}}
    {{ Form::open(['action' => 'FacultyController@facultyreports', 'method'=>'POST']) }}
    <div class="input-group custom-search-form col-sm-8">
        <input type="text" class="form-control" placeholder="Search Faculty" name="faculty" id="faculty" required>
        <span class="input-group-btn">
            <button class="btn btn-default" type="submit" name="Search">
                <i class="fa fa-search"></i>
            </button>
        </span>
    </div>
    
    <input type="hidden" name="hidden_eid" class="hidden_eid" id="hidden_eid">

    <div class="suggestion"></div>
    {{ Form::close() }}
</div>

<script>
    // Real time Suggestions 
    $(document).ready(function()
    {
        $(document).on('keyup','#faculty',function()
        {
            var staff_name = $(this).val();
            var tr = $(this).parent().parent();
            if(staff_name.length > 1)
            {
                console.log(staff_name);
                $.ajax(
                {
                    type:'get',
                    url:'/staff/facultysuggestion',
                    data:{'term': staff_name},
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