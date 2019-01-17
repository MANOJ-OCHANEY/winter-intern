@extends('faculty.layouts.dashboard')

@section('section')
<style>
table {
  width:100%;
  height:100%;
}
table, th, td {
  border: 1px solid black;
  border-collapse: collapse;
}
th, td {
  padding: 15px;
  text-align: left;
}
table#t01 tr:nth-child(even) {
  background-color: #eee;
}
table#t01 tr:nth-child(odd) {
 background-color: #fff;
}
table#t01 th {
  background-color: skyblue;
  color: white;
}
</style>

<h1>Published Paper</h1>

@if(isset($array['paper']))
@if(count($array['paper'])==0)
    No Papers available
@else
<table id="t01">
    <tr>
    <th>Id</th>
    <th>title</th>
    <th>author name</th>
    <th>type</th>
    <th>doi</th>
    <th>issn_isbn</th>
    <th>dop</th>
    <th>place</th>
    <th>link</th>
    <th>e_id</th>
    <th>is_author</th>
    <th>year</th>
    <th>coauthor name</th>
    </tr>
@foreach($array['paper'] as $data)

    <tr>
    <td>{{$data->id}}</td>
    <td>{{$data->title}}</td>
    <td>{{$data->author_names}}</td>
    <td>{{$data->type}}</td>
    <td>{{$data->doi}}</td>
    <td>{{$data->issn_isbn}}</td>
    <td>{{$data->dop}}</td>
    <td>{{$data->place}}</td>
    <td>{{$data->link}}</td>
    <td>{{$data->e_id}}</td>
    <td>{{$data->is_author}}</td>
    <td>{{$data->year}}</td>
    <td>{{$data->coauthor_names}}</td>
    </tr>
    
@endforeach
</table>
@endif
@else
    Not selected
@endif

<h1>Courses</h1>

@if(isset($array['course']))
@if(count($array['course'])==0)
    No Courses conducted/attended
@else
<table id="t01">
    <tr>
    <th>id</th>
    <th>description</th>
    <th>organised_by</th>
    <th>from_date</th>
    <th>to_date</th>
    <th>no_of_days</th>
    <th>place</th>
    <th>name</th>
    <th>conducted_attended</th>
    <th>e_id</th>
    <th>year</th>
    </tr>
@foreach($array['course'] as $data)

    <tr>
    <td>{{$data->id}}</td>
    <td>{{$data->description}}</td>
    <td>{{$data->organised_by}}</td>
    <td>{{$data->from_date}}</td>
    <td>{{$data->to_date}}</td>
    <td>{{$data->no_of_days}}</td>
    <td>{{$data->place}}</td>
    <td>{{$data->name}}</td>
    <td>{{$data->conducted_attended}}</td>
    <td>{{$data->e_id}}</td>
    <td>{{$data->year}}</td>
    </tr>
@endforeach
</table>
@endif
@else
Not selected
@endif

<h1>Patents</h1>

@if(isset($array['patent']))
@if(count($array['patent'])==0)
    No Patents 
@else
<table id="t01">
    <tr>
    <th>id</th>
    <th>type_of_user</th>
    <th>application_no</th>
    <th>name</th>
    <th>inventor</th>
    <th>coinventors</th>
    <th>status</th>
    <th>e_id</th>
    <th>year</th>
    </tr>
@foreach($array['patent'] as $data)

    <tr>
    <td>{{$data->id}}</td>
    <td>{{$data->type_of_user}}</td>
    <td>{{$data->application_no}}</td>
    <td>{{$data->name}}</td>
    <td>{{$data->inventor}}</td>
    <td>{{$data->coinventors}}</td>
    <td>{{$data->status}}</td>
    <td>{{$data->e_id}}</td>
    <td>{{$data->year}}</td>
    </tr>
@endforeach
</table>
@endif
@else
Not selected
@endif

<h1>Activities</h1>

@if(isset($array['activity']))
@if(count($array['activity'])==0)
    No Activities 
@else
<table id="t01">
    <tr>
    <th>id</th>
    <th>type</th>
    <th>title</th>
    <th>duration</th>
    <th>e_id</th>
    <th>year</th>
    </tr>
@foreach($array['activity'] as $data)

    <tr>
    <td>{{$data->id}}</td>
    <td>{{$data->type}}</td>
    <td>{{$data->title}}</td>
    <td>{{$data->duration}}</td>
    <td>{{$data->e_id}}</td>
    <td>{{$data->year}}</td>
    </tr>
@endforeach
</table>
@endif
@else
Not selected
@endif

<h1>Industry Interaction</h1>

@if(isset($array['industry_interaction']))
@if(count($array['industry_interaction'])==0)
    No Interactions with industry 
@else
<table id="t01">
    <tr>
    <th>id</th>
    <th>title_of_industry_project</th>
    <th>industry_name</th>
    <th>industry_contact_person</th>
    <th>faculty_name</th>
    <th>year</th>
    <th>e_id</th>
    </tr>
@foreach($array['industry_interaction'] as $data)

    <tr>
    <td>{{$data->id}}</td>
    <td>{{$data->title_of_industry_project}}</td>
    <td>{{$data->industry_name}}</td>
    <td>{{$data->industry_contact_person}}</td>
    <td>{{$data->faculty_name}}</td>
    <td>{{$data->year}}</td>
    <td>{{$data->e_id}}</td>
    </tr>
@endforeach
</table>
@endif
@else
Not selected
@endif

<h1>Invitations</h1>

@if(isset($array['invitation']))
@if(count($array['invitation'])==0)
    No invitations 
@else
<table id="t01">
    <tr>
    <th>id</th>
    <th>title_of_lecture</th>
    <th>title_of_conference</th>
    <th>organised_by</th>
    <th>international_national</th>
    <th>year</th>
    <th>e_id</th>
    </tr>
@foreach($array['invitation'] as $data)

    <tr>
    <td>{{$data->id}}</td>
    <td>{{$data->title_of_lecture}}</td>
    <td>{{$data->title_of_conference}}</td>
    <td>{{$data->organised_by}}</td>
    <td>{{$data->international_national}}</td>
    <td>{{$data->year}}</td>
    <td>{{$data->e_id}}</td>
    </tr>
@endforeach
</table>
@endif
@else
Not selected
@endif

<h1>Research Grants</h1>

@if(isset($array['research_grant']))
@if(count($array['research_grant'])==0)
    No research grants 
@else
<table id="t01">
    <tr>
    <th>id</th>
    <th>title</th>
    <th>faculty_name</th>
    <th>agency</th>
    <th>period_from</th>
    <th>period_to</th>
    <th>grant_amount</th>
    <th>year</th>
    <th>e_id</th>
    </tr>
@foreach($array['research_grant'] as $data)

    <tr>
    <td>{{$data->id}}</td>
    <td>{{$data->title}}</td>
    <td>{{$data->faculty_name}}</td>
    <td>{{$data->agency}}</td>
    <td>{{$data->period_from}}</td>
    <td>{{$data->period_to}}</td>
    <td>{{$data->grant_amount}}</td>
    <td>{{$data->year}}</td>
    <td>{{$data->e_id}}</td>
    </tr>
@endforeach
</table>
@endif
@else
Not selected
@endif
@endsection