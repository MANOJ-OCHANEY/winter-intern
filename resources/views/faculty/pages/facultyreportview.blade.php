@extends('faculty.layouts.dashboard')
@section('page_heading','Profile')
@section('section')

<style>
    .collapsible::after{
        content: '\25bc';
        float: right;
    }

    .collapsible {
        cursor: pointer;
        /* margin: 2px; */
        padding: 5px;
    }

    .category {
        margin: 10px 0;
        /* border: 1px solid black; */
        border: 1px solid white;
        box-shadow: 0 1px 3px rgba(0,0,0,0.12), 0 1px 2px rgba(0,0,0,0.24);
    }
</style>

<div class="container-fluid">
    @isset($paper_publications)
    {{-- <p>Paper</p>
    {{ $paper_publications }}<br><br> --}}
    <div class="row category">
        <h3 class="text-danger collapsible" data-toggle="collapse" data-target="#paper-publications"><b>Paper Publications</b></h3>
        <div id="paper-publications" class="collapse">
            <div class="col-sm-12" style="overflow-x:scroll;">
                @if(count($paper_publications))
                <table class="table table-bordered">
                <thead class="thead-dark">
                    <tr>
                        <th>Title</th>
                        <th>Faculty</th>
                        <th>Author</th>
                        <th>Co-authors</th>
                        <th>Publication Date</th>
                        <th>Type</th>
                        <th>Place</th>
                        <th>DOI</th>
                        <th>ISBN/ISSN</th>
                        <th>Link</th>
                        <th>Academic Year</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($paper_publications as $paper_publication)
                    <tr>
                        <td><b> {{ $paper_publication->title }} </b></td>
                        <td> {{ $paper_publication->faculty->first_name }} {{ $paper_publication->faculty->last_name }} </td>
                        <td> {{ $paper_publication->author_names }} </td>
                        <td> {{ $paper_publication->coauthor_names }} </td>
                        <td> {{ $paper_publication->dop }} </td>
                        <td> {{ $paper_publication->type }} </td>
                        <td> {{ $paper_publication->place }} </td>
                        <td> {{ $paper_publication->doi }} </td>
                        <td> {{ $paper_publication->issn_isbn }} </td>
                        <td><a href="{{ $paper_publication->link }}" target="_blank">{{ $paper_publication->link }}</a> </td>
                        <td> {{ $paper_publication->academic_year }} </td>
                    </tr>
                    @endforeach
                </tbody>
                </table>
                @else
                <div class="row">
                    <div class="col-sm-12">
                        <h4>No data available yet</h4>
                    </div>
                </div>
                @endif
            </div>
        </div>
    </div>
    @endisset

    @isset($courses_conducted)
    {{-- <p>CC</p>
    {{ $courses_conducted }}<br><br> --}}
    <div class="row category">
        <h3 class="text-danger collapsible" data-toggle="collapse" data-target="#courses-conducted"><b>Courses Conducted</b></h3>
        <div id="courses-conducted" class="collapse">
            <div class="col-sm-12" style="overflow-x:scroll;">
                @if(count($courses_conducted))
                <table class="table">
                <thead class="thead-dark">
                    <tr>
                        <th>Faculty</th>
                        <th>Description</th>
                        <th>Organized by</th>
                        <th>From</th>
                        <th>To</th>
                        <th>No of days</th>
                        <th>Place</th>
                        <th>Academic Year</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($courses_conducted as $course)
                    <tr>
                        <td> {{ $course->faculty->first_name }} {{ $course->faculty->last_name }} </td>
                        <td><b> {{ $course->description }} </b></td>
                        <td > {{ $course->organised_by }} </td>
                        <td > {{$course->from_date}} </td>
                        <td > {{ $course->to_date }} </td>
                        <td > {{ $course->no_of_days }} </td>
                        <td > {{ $course->place }} </td>
                        <td> {{ $course->academic_year }} </td>
                    </tr>
                    @endforeach
                </tbody>
                </table>
                @else
                <div class="row">
                    <div class="col-sm-12">
                        <h4>No data available yet</h4>
                    </div>
                </div>
                @endif
            </div>
        </div>
    </div>
    @endisset

    @isset($courses_attended)
    {{-- <p>CA</p>
    {{ $courses_attended }}<br><br> --}}
    <div class="row category">
        <h3 class="text-danger collapsible" data-toggle="collapse" data-target="#courses-attended"><b>Courses Attended</b></h3>
        <div id="courses-attended" class="collapse">
            <div class="col-sm-12" style="overflow-x:scroll;">
                @if(count($courses_attended))
                <table class="table">
                <thead class="thead-dark">
                    <tr>
                        <th>Faculty</th>
                        <th>Description</th>
                        <th>Organized by</th>
                        <th>From</th>
                        <th>To</th>
                        <th>No of days</th>
                        <th>Place</th>
                        <th>Academic Year</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($courses_attended as $course)
                    <tr>
                        <td> {{ $course->faculty->first_name }} {{ $course->faculty->last_name }} </td>
                        <td><b> {{ $course->description }} </b></td>
                        <td > {{ $course->organised_by }} </td>
                        <td > {{$course->from_date}} </td>
                        <td > {{ $course->to_date }} </td>
                        <td > {{ $course->no_of_days }} </td>
                        <td > {{ $course->place }} </td>
                        <td> {{ $course->academic_year }} </td>
                    </tr>
                    @endforeach
                </tbody>
                </table>
                @else
                <div class="row">
                    <div class="col-sm-12">
                        <h4>No data available yet</h4>
                    </div>
                </div>
                @endif
            </div>
        </div>
    </div>
    @endisset

    @isset($activities)
    {{-- <p>ACt</p>
    {{ $activities }}<br><br> --}}
    <div class="row category">
        <h3 class="text-danger collapsible" data-toggle="collapse" data-target="#activities"><b>Activities</b></h3>
        <div id="activities" class="collapse">
            <div class="col-sm-12" style="overflow-x:scroll;">
                @if(count($activities))
                <table class="table">
                <thead class="thead-dark">
                    <tr>
                        <th>Faculty</th>
                        <th>Title</th>
                        <th>Type</th>
                        <th>Duration</th>
                        <th>Academic Year</th>
                    </tr>
                </thead>
                <tbody>
                @foreach($activities as $activity)
                    <tr>
                        <td> {{ $activity->faculty->first_name }} {{ $activity->faculty->last_name }} </td>
                        <td><b> {{ $activity->title }} </b></td>
                        <td> {{ $activity->type }} </td>
                        <td> {{ $activity->duration }} </td>
                        <td> {{ $activity->academic_year }} </td>
                    </tr>
                @endforeach
                </tbody>
                </table>
                @else
                <div class="row">
                    <div class="col-sm-12">
                        <h4>No data available yet</h4>
                    </div>
                </div>
                @endif
            </div>
        </div>
    </div>
    @endisset

    @isset($industry_interactions)
    {{-- <p>II</p>
    {{ $industry_interactions }}<br><br> --}}
    <div class="row category">
        <h3 class="text-danger collapsible" data-toggle="collapse" data-target="#industry-interaction"><b>Industry Interaction</b></h3>
        <div id="industry-interaction" class="collapse">
            <div class="col-sm-12" style="overflow-x:scroll;">
                @if(count($industry_interactions))
                <table class="table">
                    <thead class="thead-dark">
                        <tr>
                            <th>Faculty</th>
                            <th>Title of industry project</th>
                            <th>Industry</th>
                            <th>Industry Faculty Name</th>
                            <th>Industry Faculty Contact</th>
                            <th>Academic Year</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($industry_interactions as $industry_interaction)
                        <tr>
                            <td> {{ $industry_interaction->faculty->first_name }} {{ $industry_interaction->faculty->last_name }} </td>
                            <td ><b> {{ $industry_interaction->title_of_industry_project }} </b></td>
                            <td > {{ $industry_interaction->industry_name }} </td>
                            <td> {{ $industry_interaction->industry_faculty_name }} </td>
                            <td> {{ $industry_interaction->industry_faculty_contact }} </td>
                            <td> {{ $industry_interaction->academic_year }} </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
                @else
                <div class="row">
                    <div class="col-sm-12">
                        <h4>No data available yet</h4>
                    </div>
                </div>
                @endif
            </div>
        </div>
    </div>
    @endisset

    @isset($invitations)
    {{-- <p>In</p>
    {{ $invitations }}<br><br> --}}
    <div class="row category">
        <h3 class="text-danger collapsible" data-toggle="collapse" data-target="#invitations"><b>Invitations</b></h3>
        <div id="invitations" class="collapse">
            <div class="col-sm-12" style="overflow-x:scroll;">
                @if(count($invitations))
                <table class="table">
                <thead class="thead-dark">
                    <tr>
                        <th>Faculty</th>
                        <th>Title of lecture</th>
                        <th>Title of conference</th>
                        <th>Organised by</th>
                        <th>Type</th>
                        <th>Academic Year</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($invitations as $invitation)
                    <tr>
                        <td> {{ $invitation->faculty->first_name }} {{ $invitation->faculty->last_name }} </td>
                        <td><b> {{ $invitation->title_of_lecture }} </b></td>
                        <td> {{ $invitation->title_of_conference }} </p>
                        <td> {{ $invitation->organised_by }} </p>
                        <td> {{ $invitation->type_of_conference }} </p>
                        <td> {{ $invitation->academic_year }} </td>
                    </tr>
                    <br>
                    @endforeach
                </tbody>
                </table>
                @else
                <div class="row">
                    <div class="col-sm-12">
                        <h4>No data available yet</h4>
                    </div>
                </div>
                @endif
            </div>
        </div>
    </div>
    @endisset

    @isset($patents)
    {{-- <p>Pat</p>
    {{ $patents }}<br><br> --}}
    <div class="row category">
        <h3 class="text-danger collapsible" data-toggle="collapse" data-target="#patents-details"><b>Patents Details</b></h3>
        <div id="patents-details" class="collapse">
            <div class="col-sm-12" style="overflow-x:scroll;">
                @if(count($patents))
                <table class="table">
                    <thead class="thead-dark">
                        <tr>
                            <th>Faculty</th>
                            <th>Patent Name</th>
                            <th>Inventor</th>
                            <th>Co-inventor</th>
                            <th>Application no</th>
                            <th>Type</th>
                            <th>Application Date</th>
                            <th>Publication Date</th>
                            <th>Status</th>
                            <th>Academic Year</th>
                        </tr>
                    </thead>
                <tbody>
                    @foreach($patents as $patent)
                    <tr>
                        <td> {{ $patent->faculty->first_name }} {{ $patent->faculty->last_name }} </td>
                        <td><b> {{ $patent->name }} </b></td>
                        <td> {{ $patent->inventor }} </td>
                        <td> {{ $patent->coinventors }} </td>
                        <td> {{ $patent->application_no }} </td>
                        <td> {{ $patent->type_of_user }} </td>
                        <td> {{ $patent->application_date }} </td>
                        <td> {{ $patent->publication_date }} </td>
                        <td> {{ $patent->status }} </td>
                        <td> {{ $patent->academic_year }} </td>
                    </tr>
                    @endforeach
                </tbody>
                </table>
                @else
                <div class="row">
                    <div class="col-sm-12">
                        <h4>No data available yet</h4>
                    </div>
                </div>
                @endif
            </div>
        </div>
    </div>
    @endisset
    
    @isset($research_grants)
    {{-- <p>RG</p>
    {{ $research_grants }}<br><br> --}}
    <div class="row category">
        <h3 class="text-danger collapsible" data-toggle="collapse" data-target="#research-grants"><b>Research Grants</b></h3>
        <div id="research-grants" class="collapse">
            <div class="col-sm-12" style="overflow-x:scroll;">
                @if(count($research_grants))
                <table class="table">
                    <thead class="thead-dark">
                        <tr>
                            <th>Faculty</th>
                            <th>Title</th>
                            <th>Agency</th>
                            <th>Period</th>
                            <th>Grant Amount (in Rs. lakhs)</th>
                            <th>Academic Year</th>
                        </tr>
                    </thead>
                <tbody>
                    @foreach($research_grants as $research_grant)
                    <tr>
                        <td> {{ $research_grant->faculty->first_name }} {{ $research_grant->faculty->last_name }} </td>
                        <td><b> {{ $research_grant->title }} </b></td>
                        <td> {{ $research_grant->agency }} </td>
                        <td> {{ $research_grant->period }}</td>
                        <td> {{ $research_grant->grant_amount }} </td>
                        <td> {{ $research_grant->academic_year }} </td>
                    </tr>
                    @endforeach
                </tbody>
                </table>
                @else
                <div class="row">
                    <div class="col-sm-12">
                        <h4>No data available yet</h4>
                    </div>
                </div>
                @endif
            </div>
        </div>
    </div>
    @endisset

    <br><br>

    <form action=" {{ url('/staff/downloadreports') }} " method="POST">
        {{ csrf_field() }}
        <input type="text" name="eid" value=" {{ $query['eid'] }} " hidden>
        <input type="text" name="academic_year" value=" {{ $query['academic_year'] }} " hidden>
        <input type="text" name="category" value=" {{ $query['cat'] }} " hidden>
        <input type="text" name="all_faculty" value=" {{ $query['all_faculty'] }} " hidden>
        <input type="text" name="all_year" value=" {{ $query['all_year'] }} " hidden>
        <input type="text" name="all_cat" value=" {{ $query['all_cat'] }} " hidden>
        <input type="submit" value="Download in excel" class="btn btn-primary">
    </form>

    <br><br><br>
</div>


@stop