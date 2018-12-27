@extends('faculty.layouts.dashboard')
@section('page_heading','Profile')
@section('section')

<style>
    /* .row{
        border: 2px solid green;
    } */

    .collapsible::after{
        content: '\25bc';
        float: right;
    }
    /* .collapsible {
        display: block;
    } */
</style>

<div class="container-fluid">
    <div class="row">
        <div class="col-sm-3">
            <div style="position: relative">
                @if($pic !== null)
                <img src="data:image/png;base64,{{base64_encode($pic->image)}}" style="width:100%;">
                @else
                <img class="img-rounded" src="http://zoom.trus.co.id/plugintracker/images/pp-default.jpg" style="width:100%;">
                @endif
                {{-- <img class="img-rounded" src="https://gordonswindowdecor.com/wp-content/uploads/sites/23/2015/06/person-placeholder.png" style="width:100%;"> --}}
                <div style="position: absolute;width: 30px;right: 0;bottom: 0;transform: translate(30%,30%);">
                    <a href="{{ url ('/staff/uploadImage') }}">
                        <img src="https://cdn0.iconfinder.com/data/icons/social-messaging-ui-color-shapes/128/write-circle-blue-512.png" style="width:100%">
                    </a>
                </div>
            </div>
        </div>
        <div class="col-sm-9" style="border-left: 1px solid gray;">
            <h1><b> {{ $staff->first_name.' '.$staff->last_name }} </b></h1>
            <h4><b>Email</b> : {{ $staff->email }} </h4>
            <h4><b>Employee Number</b> : {{ $staff->e_id }} </h4>
            <h4><b>Designation</b> : {{ $staff->designation }} </h4>
            <h4><b>Department</b> : {{ $department->dept_name }} </h4>
            <h4><b>Date of joining</b> : {{ date("M jS, Y", strtotime($staff->doj)) }} </h4>
            <h4><b>Date of leaving</b> : {{ date("M jS, Y", strtotime($staff->dol)) }} </h4>
        </div>
    </div>
    <hr>
    <div class="row">
        <h3 class="text-danger"><b>Personal Details</b></h3>
        <div class="col-sm-4">
            <h4><b>Contact</b></h4>
            <h5> {{ $staff->mobile }} </h5>
        </div>
        <div class="col-sm-4">
            <h4><b>Date of Birth</b></h4>
            <h5> {{ date("M jS, Y", strtotime($staff->dob)) }} </h5>
        </div>
        <div class="col-sm-4">
            <h4><b>Aadhar Number</b></h4>
            <h5> {{ $staff->aadhaar_id }} </h5>
        </div>
        <div class="col-sm-4">
            <h4><b>Gender</b></h4>
            {{-- <h5> {{ $staff->gender }} </h5> --}}
            @if($staff->gender == 'M')
                <h5>MALE</dd>
            @elseif($staff->gender == 'F')
                <h5>FEMALE</dd>
            @endif
        </div>
        <div class="col-sm-4">
            <h4><b>Concol Number</b></h4>
            <h5> {{ $staff->concol }} </h5>
        </div>
        <div class="col-sm-4">
            <h4><b>PAN Number</b></h4>
            <h5> {{ $staff->pancard }} </h5>
        </div>
        <div class="col-sm-6">
            <h4><b>Address</b></h4>
            <h5> {{ $staff->address }} </h5>
        </div>
    </div>
    <hr>
    <div class="row">
        <h3 class="text-danger collapsible" data-toggle="collapse" data-target="#educational-details"><b>Educational Details</b></h3>
        <div id="educational-details" class="collapse">
            <p>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Nulla delectus accusantium animi laudantium aliquid, voluptates, consequatur placeat, libero a recusandae magni error facilis suscipit cum illo excepturi voluptatem quod modi cumque aliquam praesentium. Iure minus harum mollitia. Harum aliquam eum voluptates, temporibus itaque dignissimos dolorem nesciunt soluta fugiat explicabo delectus dolor, inventore, voluptatem nisi. Officia distinctio placeat facilis ratione itaque incidunt repellendus, fugit saepe? Magni mollitia asperiores id esse minus ipsum dignissimos iusto nam eaque tempore! Inventore expedita sunt nobis facilis dolores enim cum exercitationem delectus accusamus! Obcaecati nesciunt cumque non earum. Dolore, amet eveniet perspiciatis reprehenderit impedit magnam nulla!</p>
        </div>
    </div>
    <hr>
    <div class="row">
        <h3 class="text-danger collapsible" data-toggle="collapse" data-target="#paper-publications"><b>Paper Publications</b></h3>
        <div id="paper-publications" class="">
            <div class="col-sm-12">
                <div class="form-group row">
                    <label class="col-sm-2 col-sm-offset-7 text-right">Academic Year</label>
                    <select class="col-sm-2" name="year" data-category="paper-publications">
                        @foreach($academic_years as $academic_year)
                        <option value=" {{ $academic_year }} "> {{ $academic_year }} </option>
                        @endforeach
                    </select> 
                </div>
                <div class="col-sm-12" class="paper-publications-container">
                    @foreach($paper_publications as $paper_publication)
                    <div class="row" style="border: 1px solid white;box-shadow: 0 1px 3px rgba(0,0,0,0.12), 0 1px 2px rgba(0,0,0,0.24);">
                        <h4 class="col-sm-12"><b> {{ $paper_publication->title }} </b></h4>
                        <p class="col-sm-12"> <b>Authors</b> : {{ $paper_publication->author_names }} </p>
                        <p class="col-sm-12"> <b>Co-authors</b> : {{ $paper_publication->coauthor_names }} </p>
                        <p class="col-sm-12"><b>Publication Date</b> : {{ $paper_publication->dop }} </p>
                        <p class="col-sm-3"><b>Type</b> : {{ $paper_publication->type }} </p>
                        <p class="col-sm-3"><b>Place</b> : {{ $paper_publication->place }} </p>
                        <p class="col-sm-12"><b>DOI</b> : {{ $paper_publication->doi }} </p>
                        <p class="col-sm-12"><b>ISBN/ISSN</b> : {{ $paper_publication->issn_isbn }} </p>
                        <p class="col-sm-12"><b>Link</b> : <a href="{{ $paper_publication->link }}" target="_blank">{{ $paper_publication->link }}</a> </p>
                        <p class="col-sm-2 col-sm-offset-10 text-right"><a href=" {{ url('/staff/editpaperpublications/'.$paper_publication->id) }} ">Edit</a></p>
                    </div>
                    <br>
                    @endforeach
                </div>
                <div class="col-sm-12" style="margin-top: 20px;">
                    <a class="btn btn-primary col-sm-1 col-sm-offset-10" href=" {{ url('/staff/addpaperpublications') }} ">Add New</a>
                </div>
            </div>
        </div>
    </div>
    <hr>
    <div class="row">
        <h3 class="text-danger collapsible" data-toggle="collapse" data-target="#courses-conducted"><b>Courses Conducted</b></h3>
        <div id="courses-conducted" class="collapse">
            <div class="col-sm-12">
                <div class="form-group row">
                    <label class="col-sm-2 col-sm-offset-7 text-right">Academic Year</label>
                    <select class="col-sm-2" name="year" data-category="paper-publications">
                        @foreach($academic_years as $academic_year)
                        <option value=" {{ $academic_year }} "> {{ $academic_year }} </option>
                        @endforeach
                    </select>
                </div>
                <div class="col-sm-12" >
                    @foreach($courses as $course)
                    @if($course->conducted_attended == 1)
                    <div class="row" style="border: 1px solid white;box-shadow: 0 1px 3px rgba(0,0,0,0.12), 0 1px 2px rgba(0,0,0,0.24);">
                        <h4 class="col-sm-12"><b> {{ $course->description }} </b></h4>
                        <p class="col-sm-6"> <b><b>Organized by</b> : </b> {{ $course->organised_by }} </p>
                        <p class="col-sm-3"><b>From</b> : {{ $course->from_date }} </p>
                        <p class="col-sm-3"><b>To</b> : {{ $course->to_date }} </p>
                        <p class="col-sm-4"><b>No of days</b> : {{ $course->no_of_days }} </p>
                        <p class="col-sm-4"><b>Place</b> : {{ $course->place }} </p>
                    </div>
                    <br>
                    @endif
                    @endforeach
                </div>
                <div class="col-sm-12" style="margin-top: 20px;">
                    <a class="btn btn-primary col-sm-1 col-sm-offset-10" href="">Add New</a>
                </div>
            </div>
        </div>
    </div>
    <hr>
    <div class="row">
        <h3 class="text-danger collapsible" data-toggle="collapse" data-target="#courses-attended"><b>Courses Attended</b></h3>
        <div id="courses-attended" class="collapse">
            <div class="col-sm-12">
                <div class="form-group row">
                    <label class="col-sm-2 col-sm-offset-7 text-right">Academic Year</label>
                    <select class="col-sm-2" name="year" data-category="paper-publications">
                        @foreach($academic_years as $academic_year)
                        <option value=" {{ $academic_year }} "> {{ $academic_year }} </option>
                        @endforeach
                    </select>
                </div>
                <div class="col-sm-12" >
                    @foreach($courses as $course)
                    @if($course->conducted_attended == 0)
                    <div class="row" style="border: 1px solid white;box-shadow: 0 1px 3px rgba(0,0,0,0.12), 0 1px 2px rgba(0,0,0,0.24);">
                        <h4 class="col-sm-12"><b> {{ $course->description }} </b></h4>
                        <p class="col-sm-6"> <b><b>Organized by</b> : </b> {{ $course->organised_by }} </p>
                        <p class="col-sm-3"><b>From</b> : {{ $course->from_date }} </p>
                        <p class="col-sm-3"><b>To</b> : {{ $course->to_date }} </p>
                        <p class="col-sm-4"><b>No of days</b> : {{ $course->no_of_days }} </p>
                        <p class="col-sm-4"><b>Place</b> : {{ $course->place }} </p>
                    </div>
                    <br>
                    @endif
                    @endforeach
                </div>
                <div class="col-sm-12" style="margin-top: 20px;">
                    <a class="btn btn-primary col-sm-1 col-sm-offset-10" href="">Add New</a>
                </div>
            </div>
        </div>
    </div>
    <hr>
    <div class="row">
        <h3 class="text-danger collapsible" data-toggle="collapse" data-target="#patents-details"><b>Patents Details</b></h3>
        <div id="patents-details" class="collapse">
            <div class="col-sm-12">
                <div class="form-group row">
                    <label class="col-sm-2 col-sm-offset-7 text-right">Academic Year</label>
                    <select class="col-sm-2" name="year" data-category="paper-publications">
                        @foreach($academic_years as $academic_year)
                        <option value=" {{ $academic_year }} "> {{ $academic_year }} </option>
                        @endforeach
                    </select>
                </div>
                <div class="col-sm-12" >
                    @foreach($patents as $patent)
                    <div class="row" style="border: 1px solid white;box-shadow: 0 1px 3px rgba(0,0,0,0.12), 0 1px 2px rgba(0,0,0,0.24);">
                        <h4 class="col-sm-12"><b> {{ $patent->name }} </b></h4>
                        {{-- <hr> --}}
                        <p class="col-sm-5"> <b>Inventor</b> : {{ $patent->inventor }} </p>
                        <p class="col-sm-5"><b>Co-inventor</b> : {{ $patent->coinventors }} </p>
                        <p class="col-sm-5"><b>Application no.</b> : {{ $patent->application_no }} </p>
                        <p class="col-sm-5"><b>Type</b> : {{ $patent->type_of_user }} </p>
                        <p class="col-sm-4"><b>Application Date</b> : {{ $patent->application_date }} </p>
                        <p class="col-sm-4"><b>Publication Date</b> : {{ $patent->publication_date }} </p>
                        <p class="col-sm-4"><b>Status</b> : {{ $patent->status }} </p>
                    </div>
                    <br>
                    @endforeach
                </div>
                <div class="col-sm-12" style="margin-top: 20px;">
                    <a class="btn btn-primary col-sm-1 col-sm-offset-10" href="">Add New</a>
                </div>
            </div>
        </div>
    </div>
    <hr>
    <div class="row">
        <h3 class="text-danger collapsible" data-toggle="collapse" data-target="#activities"><b>Activities</b></h3>
        <div id="research-grants" class="collapse">
            <div class="col-sm-12">
                <div class="form-group row">
                    <label class="col-sm-2 col-sm-offset-7 text-right">Academic Year</label>
                    <select class="col-sm-2" name="year" data-category="paper-publications">
                        @foreach($academic_years as $academic_year)
                        <option value=" {{ $academic_year }} "> {{ $academic_year }} </option>
                        @endforeach
                    </select>
                </div>
                <div class="col-sm-12" >
                    @foreach($activities as $activity)
                    <div class="row" style="border: 1px solid white;box-shadow: 0 1px 3px rgba(0,0,0,0.12), 0 1px 2px rgba(0,0,0,0.24);">
                        <h4 class="col-sm-12"><b> {{ $activity->title }} </b></h4>
                        <p class="col-sm-12"> <b>Type</b> : {{ $activity->type }} </p>
                        <p class="col-sm-4"><b>Duration</b> :  {{ $activity->duration }} </p>
                    </div>
                    <br>
                    @endforeach
                </div>
                <div class="col-sm-12" style="margin-top: 20px;">
                    <a class="btn btn-primary col-sm-1 col-sm-offset-10" href="">Add New</a>
                </div>
            </div>
        </div>
    </div>
    <hr>
    <div class="row">
        <h3 class="text-danger collapsible" data-toggle="collapse" data-target="#research-grants"><b>Research Grants</b></h3>
        <div id="research-grants" class="collapse">
            <div class="col-sm-12">
                <div class="form-group row">
                    <label class="col-sm-2 col-sm-offset-7 text-right">Academic Year</label>
                    <select class="col-sm-2" name="year" data-category="paper-publications">
                        @foreach($academic_years as $academic_year)
                        <option value=" {{ $academic_year }} "> {{ $academic_year }} </option>
                        @endforeach
                    </select>
                </div>
                <div class="col-sm-12" >
                    @foreach($research_grants as $research_grant)
                    <div class="row" style="border: 1px solid white;box-shadow: 0 1px 3px rgba(0,0,0,0.12), 0 1px 2px rgba(0,0,0,0.24);">
                        <h4 class="col-sm-12"><b> {{ $research_grant->title }} </b></h4>
                        {{-- <hr> --}}
                        <p class="col-sm-12"> <b>Agency</b> : {{ $research_grant->agency }} </p>
                        <p class="col-sm-4"><b>Period</b> : {{ $research_grant->period_from }} to {{ $research_grant->period_to }}</p>
                        <p class="col-sm-4"><b>Grant amount</b> :  {{ $research_grant->grant_amount }} </p>
                    </div>
                    <br>
                    @endforeach
                </div>
                <div class="col-sm-12" style="margin-top: 20px;">
                    <a class="btn btn-primary col-sm-1 col-sm-offset-10" href="">Add New</a>
                </div>
            </div>
        </div>
    </div>
    <hr>
    <div class="row">
        <h3 class="text-danger collapsible" data-toggle="collapse" data-target="#industry-interaction"><b>Industry Interaction</b></h3>
        <div id="industry-interaction" class="collapse">
            <div class="col-sm-12">
                <div class="form-group row">
                    <label class="col-sm-2 col-sm-offset-7 text-right">Academic Year</label>
                    <select class="col-sm-2" name="year" data-category="paper-publications">
                        @foreach($academic_years as $academic_year)
                        <option value=" {{ $academic_year }} "> {{ $academic_year }} </option>
                        @endforeach
                    </select>
                </div>
                <div class="col-sm-12" >
                    @foreach($industry_interactions as $industry_interaction)
                    <div class="row" style="border: 1px solid white;box-shadow: 0 1px 3px rgba(0,0,0,0.12), 0 1px 2px rgba(0,0,0,0.24);">
                        <h4 class="col-sm-12"><b> {{ $industry_interaction->title_of_industry_project }} </b></h4>
                        <p class="col-sm-12"> <b>Industry</b> : {{ $industry_interaction->industry_name }} </p>
                        <p class="col-sm-4"><b>Industry Faculty Name</b> : {{ $industry_interaction->faculty_name }} </p>
                        <p class="col-sm-4"><b>Faculty contact</b> : {{ $industry_interaction->industry_contact_person }} </p>
                    </div>
                    <br>
                    @endforeach
                </div>
                <div class="col-sm-12" style="margin-top: 20px;">
                    <a class="btn btn-primary col-sm-1 col-sm-offset-10" href="">Add New</a>
                </div>
            </div>
        </div>
    </div>
    <hr>
    <div class="row">
        <h3 class="text-danger collapsible" data-toggle="collapse" data-target="#invitations"><b>Invitations</b></h3>
        <div id="invitations" class="collapse">
            <div class="col-sm-12">
                <div class="form-group row">
                    <label class="col-sm-2 col-sm-offset-7 text-right">Academic Year</label>
                    <select class="col-sm-2" name="year" data-category="paper-publications">
                        @foreach($academic_years as $academic_year)
                        <option value=" {{ $academic_year }} "> {{ $academic_year }} </option>
                        @endforeach
                    </select>
                </div>
                <div class="col-sm-12" >
                    @foreach($invitations as $invitation)
                    <div class="row" style="border: 1px solid white;box-shadow: 0 1px 3px rgba(0,0,0,0.12), 0 1px 2px rgba(0,0,0,0.24);">
                        <h4 class="col-sm-12"><b> {{ $invitation->title_of_lecture }} </b></h4>
                        {{-- <hr> --}}
                        <p class="col-sm-12"> <b>Title of Conference</b> : {{ $invitation->title_of_conference }} </p>
                        <p class="col-sm-4"><b>Organised by</b> : {{ $invitation->organised_by }} </p>
                        <p class="col-sm-4"><b>Type</b> : {{ $invitation->international_national }} </p>
                    </div>
                    <br>
                    @endforeach
                </div>
                <div class="col-sm-12" style="margin-top: 20px;">
                    <a class="btn btn-primary col-sm-1 col-sm-offset-10" href="">Add New</a>
                </div>
            </div>
        </div>
    </div>
    <br>
    <br>
    <br>
    
</div>
@stop