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
                <img class="img-rounded" src="http://zoom.trus.co.id/plugintracker/images/pp-default.jpg" style="width:100%;">
                {{-- <img class="img-rounded" src="https://gordonswindowdecor.com/wp-content/uploads/sites/23/2015/06/person-placeholder.png" style="width:100%;"> --}}
                <div style="position: absolute;width: 30px;right: 0;bottom: 0;transform: translate(30%,30%);">
                    <img src="https://cdn0.iconfinder.com/data/icons/social-messaging-ui-color-shapes/128/write-circle-blue-512.png" style="width:100%">
                </div>
            </div>
        </div>
        <div class="col-sm-9" style="border-left: 1px solid gray;">
            <h1><b> {{ $staff->first_name.' '.$staff->last_name }} </b></h1>
            <h4><b>Email</b> : {{ $staff->email }} </h4>
            <h4><b>Employee Number</b> : {{ $staff->e_id }} </h4>
            <h4><b>Designation</b> : {{ $staff->designation }} </h4>
            <h4><b>Department</b> : {{ $department->dept_name }} </h4>
            <h4><b>Date of joining</b> : {{ $staff->doj }} </h4>
            <h4><b>Date of leaving</b> : {{ $staff->dol }} </h4>
        </div>
    </div>
    <hr>
    <div class="row">
        <h3 class="text-danger"><b>Personal Details</b></h3>
        <div class="col-sm-4">
            <h4>Contact</h4>
            <h5> {{ $staff->mobile }} </h5>
        </div>
        <div class="col-sm-4">
            <h4>Date of Birth</h4>
            <h5> {{ $staff->dob }} </h5>
        </div>
        <div class="col-sm-4">
            <h4>Aadhar Number</h4>
            <h5> {{ $staff->aadhaar_id }} </h5>
        </div>
        <div class="col-sm-4">
            <h4>Gender</h4>
            <h5> {{ $staff->gender }} </h5>
        </div>
        <div class="col-sm-4">
            <h4>Concol Number</h4>
            <h5> {{ $staff->concol }} </h5>
        </div>
        <div class="col-sm-4">
            <h4>PAN Number</h4>
            <h5> {{ $staff->pancard }} </h5>
        </div>
        <div class="col-sm-6">
            <h4>Address</h4>
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
                        <option>1</option>
                        <option>2</option>
                        <option>3</option>
                        <option>4</option>
                        <option>5</option>
                    </select>
                </div>
                <div class="col-sm-12" >
                    @foreach($paper_publications as $paper_publication)
                    <div class="row" style="border: 1px solid white;box-shadow: 0 1px 3px rgba(0,0,0,0.12), 0 1px 2px rgba(0,0,0,0.24);">
                        <h4 class="col-sm-12"><b>Title of paper Lorem ipsum, dolor sit amet consectetur adipisicing elit. Tempora, cupiditate.</b></h4>
                        {{-- <hr> --}}
                        <p class="col-sm-12"> <b>Authors</b> Lorem ipsum dolor sit amet consectetur adipisicing elit. Quasi, delectus?</p>
                        <p class="col-sm-12">Publication Date : Lorem ipsum dolor sit amet.</p>
                        <p class="col-sm-3">Type Lorem, ipsum dolor.</p>
                        <p class="col-sm-3">Place Lorem ipsum dolor sit amet.</p>
                        <p class="col-sm-12">DOI Lorem ipsum dolor sit amet consectetur adipisicing elit. Sequi facere, eveniet asperiores enim quas eaque dicta quam perspiciatis illo corrupti!</p>
                        <p class="col-sm-12">ISBN/ISSN Lorem ipsum dolor sit amet, consectetur adipisicing elit. Rerum, beatae!</p>
                        <p class="col-sm-12">Link Lorem ipsum dolor sit amet consectetur adipisicing elit. Fugiat, alias!</p>
                    </div>
                    <br>
                    @endforeach
                    <div class="row" style="border: 2px solid white;box-shadow: 0 1px 3px rgba(0,0,0,0.12), 0 1px 2px rgba(0,0,0,0.24);">
                        <h4 class="col-sm-12"><b>Title of paper Lorem ipsum, dolor sit amet consectetur adipisicing elit. Tempora, cupiditate.</b></h4>
                        {{-- <hr> --}}
                        <p class="col-sm-12"> <b>Authors</b> Lorem ipsum dolor sit amet consectetur adipisicing elit. Quasi, delectus?</p>
                        <p class="col-sm-12">Publication Date : Lorem ipsum dolor sit amet.</p>
                        <p class="col-sm-3">Type Lorem, ipsum dolor.</p>
                        <p class="col-sm-3">Place Lorem ipsum dolor sit amet.</p>
                        <p class="col-sm-12">DOI Lorem ipsum dolor sit amet consectetur adipisicing elit. Sequi facere, eveniet asperiores enim quas eaque dicta quam perspiciatis illo corrupti!</p>
                        <p class="col-sm-12">ISBN/ISSN Lorem ipsum dolor sit amet, consectetur adipisicing elit. Rerum, beatae!</p>
                        <p class="col-sm-12">Link Lorem ipsum dolor sit amet consectetur adipisicing elit. Fugiat, alias!</p>
                    </div>
                    <br>  
                    <div class="row" style="border: 3px solid white;box-shadow: 0 1px 3px rgba(0,0,0,0.12), 0 1px 2px rgba(0,0,0,0.24);">
                        <h4 class="col-sm-12"><b>Title of paper Lorem ipsum, dolor sit amet consectetur adipisicing elit. Tempora, cupiditate. Lorem ipsum dolor sit amet consectetur adipisicing elit. Dolorem, odit.</b></h4>
                        {{-- <hr> --}}
                        <p class="col-sm-12"> <b>Authors</b> Lorem ipsum dolor sit amet consectetur adipisicing elit. Quasi, delectus?</p>
                        <p class="col-sm-12">Publication Date : Lorem ipsum dolor sit amet.</p>
                        <p class="col-sm-3">Type Lorem, ipsum dolor.</p>
                        <p class="col-sm-3">Place Lorem ipsum dolor sit amet.</p>
                        <p class="col-sm-12">DOI Lorem ipsum dolor sit amet consectetur adipisicing elit. Sequi facere, eveniet asperiores enim quas eaque dicta quam perspiciatis illo corrupti!</p>
                        <p class="col-sm-12">ISBN/ISSN Lorem ipsum dolor sit amet, consectetur adipisicing elit. Rerum, beatae!</p>
                        <p class="col-sm-12">Link Lorem ipsum dolor sit amet consectetur adipisicing elit. Fugiat, alias!</p>
                    </div>
                </div>
               
                <div class="col-sm-12" style="margin-top: 20px;">
                    <a class="btn btn-primary col-sm-1 col-sm-offset-10" href="">Add New</a>
                </div>
            </div>
        </div>
    </div>
    <hr>
    <div class="row">
        <h3 class="text-danger collapsible" data-toggle="collapse" data-target="#courses-conducted"><b>Courses Conducted</b></h3>
        <div id="courses-conducted" class="">
            <div class="col-sm-12">
                <div class="form-group row">
                    <label class="col-sm-2 col-sm-offset-7 text-right">Academic Year</label>
                    <select class="col-sm-2" name="year" data-category="paper-publications">
                        <option>1</option>
                        <option>2</option>
                        <option>3</option>
                        <option>4</option>
                        <option>5</option>
                    </select>
                </div>
                <div class="col-sm-12" >
                    <div class="row" style="border: 1px solid white;box-shadow: 0 1px 3px rgba(0,0,0,0.12), 0 1px 2px rgba(0,0,0,0.24);">
                        <h4 class="col-sm-12"><b>Course Description Lorem ipsum, dolor sit amet consectetur adipisicing elit. Tempora, cupiditate.</b></h4>
                        {{-- <hr> --}}
                        <p class="col-sm-6"> <b>Organized by: </b> Lorem ipsum dolor sit amet consectetur adipisicing elit. Quasi, delectus?</p>
                        <p class="col-sm-6">Duration : Lorem ipsum dolor sit amet.</p>
                        <p class="col-sm-4">No of days Lorem, ipsum dolor.</p>
                        <p class="col-sm-4">Place Lorem ipsum dolor sit amet.</p>
                    </div>
                    <br>
                    <div class="row" style="border: 1px solid white;box-shadow: 0 1px 3px rgba(0,0,0,0.12), 0 1px 2px rgba(0,0,0,0.24);">
                        <h4 class="col-sm-12"><b>Course Description Lorem ipsum, dolor sit amet consectetur adipisicing elit. Tempora, cupiditate.</b></h4>
                        {{-- <hr> --}}
                        <p class="col-sm-6"> <b>Organized by: </b> Lorem ipsum dolor sit amet consectetur adipisicing elit. Quasi, delectus?</p>
                        <p class="col-sm-6">Duration : Lorem ipsum dolor sit amet.</p>
                        <p class="col-sm-4">No of days Lorem, ipsum dolor.</p>
                        <p class="col-sm-4">Place Lorem ipsum dolor sit amet.</p>
                    </div>
                    <br>
                    <div class="row" style="border: 1px solid white;box-shadow: 0 1px 3px rgba(0,0,0,0.12), 0 1px 2px rgba(0,0,0,0.24);">
                        <h4 class="col-sm-12"><b>Course Description Lorem ipsum, dolor sit amet consectetur adipisicing elit. Tempora, cupiditate.</b></h4>
                        {{-- <hr> --}}
                        <p class="col-sm-6"> <b>Organized by: </b> Lorem ipsum dolor sit amet consectetur adipisicing elit. Quasi, delectus?</p>
                        <p class="col-sm-6">Duration : Lorem ipsum dolor sit amet.</p>
                        <p class="col-sm-4">No of days Lorem, ipsum dolor.</p>
                        <p class="col-sm-4">Place Lorem ipsum dolor sit amet.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <hr>
    <div class="row">
        <h3 class="text-danger collapsible" data-toggle="collapse" data-target="#courses-attended"><b>Courses Attended</b></h3>
        <div id="courses-attended" class="">
            <div class="col-sm-12">
                <div class="form-group row">
                    <label class="col-sm-2 col-sm-offset-7 text-right">Academic Year</label>
                    <select class="col-sm-2" name="year" data-category="paper-publications">
                        <option>1</option>
                        <option>2</option>
                        <option>3</option>
                        <option>4</option>
                        <option>5</option>
                    </select>
                </div>
                <div class="col-sm-12" >
                    <div class="row" style="border: 1px solid white;box-shadow: 0 1px 3px rgba(0,0,0,0.12), 0 1px 2px rgba(0,0,0,0.24);">
                        <h4 class="col-sm-12"><b>Course Description Lorem ipsum, dolor sit amet consectetur adipisicing elit. Tempora, cupiditate.</b></h4>
                        {{-- <hr> --}}
                        <p class="col-sm-6"> <b>Organized by: </b> Lorem ipsum dolor sit amet consectetur adipisicing elit. Quasi, delectus?</p>
                        <p class="col-sm-6">Duration : Lorem ipsum dolor sit amet.</p>
                        <p class="col-sm-4">No of days Lorem, ipsum dolor.</p>
                        <p class="col-sm-4">Place Lorem ipsum dolor sit amet.</p>
                    </div>
                    <br>
                    <div class="row" style="border: 1px solid white;box-shadow: 0 1px 3px rgba(0,0,0,0.12), 0 1px 2px rgba(0,0,0,0.24);">
                        <h4 class="col-sm-12"><b>Course Description Lorem ipsum, dolor sit amet consectetur adipisicing elit. Tempora, cupiditate.</b></h4>
                        {{-- <hr> --}}
                        <p class="col-sm-6"> <b>Organized by: </b> Lorem ipsum dolor sit amet consectetur adipisicing elit. Quasi, delectus?</p>
                        <p class="col-sm-6">Duration : Lorem ipsum dolor sit amet.</p>
                        <p class="col-sm-4">No of days Lorem, ipsum dolor.</p>
                        <p class="col-sm-4">Place Lorem ipsum dolor sit amet.</p>
                    </div>
                    <br>
                    <div class="row" style="border: 1px solid white;box-shadow: 0 1px 3px rgba(0,0,0,0.12), 0 1px 2px rgba(0,0,0,0.24);">
                        <h4 class="col-sm-12"><b>Course Description Lorem ipsum, dolor sit amet consectetur adipisicing elit. Tempora, cupiditate.</b></h4>
                        {{-- <hr> --}}
                        <p class="col-sm-6"> <b>Organized by: </b> Lorem ipsum dolor sit amet consectetur adipisicing elit. Quasi, delectus?</p>
                        <p class="col-sm-6">Duration : Lorem ipsum dolor sit amet.</p>
                        <p class="col-sm-4">No of days Lorem, ipsum dolor.</p>
                        <p class="col-sm-4">Place Lorem ipsum dolor sit amet.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <hr>
    <div class="row">
        <h3 class="text-danger collapsible" data-toggle="collapse" data-target="#patents-details"><b>Patents Details</b></h3>
        <div id="patents-details" class="">
            <div class="col-sm-12">
                <div class="form-group row">
                    <label class="col-sm-2 col-sm-offset-7 text-right">Academic Year</label>
                    <select class="col-sm-2" name="year" data-category="paper-publications">
                        <option>1</option>
                        <option>2</option>
                        <option>3</option>
                        <option>4</option>
                        <option>5</option>
                    </select>
                </div>
                <div class="col-sm-12" >
                    <div class="row" style="border: 1px solid white;box-shadow: 0 1px 3px rgba(0,0,0,0.12), 0 1px 2px rgba(0,0,0,0.24);">
                        <h4 class="col-sm-12"><b>Name Lorem ipsum, dolor sit amet consectetur adipisicing elit. Tempora, cupiditate.</b></h4>
                        {{-- <hr> --}}
                        <p class="col-sm-5"> <b>Inventor</b> Lorem ipsum dolor sit amet co Quasi, delectus?</p>
                        <p class="col-sm-5">Co-inventor : Lorem ipsum dolor sit amet.</p>
                        <p class="col-sm-5">Application no. Lorem, ipsum dolor.</p>
                        <p class="col-sm-5">Type Lorem, ipsum dolor.</p>
                        <p class="col-sm-4">Appl Date Lorem ipsum dolor sit amet.</p>
                        <p class="col-sm-4">Publication Date Lorem ipsum dolor sit amet.</p>
                        <p class="col-sm-4">Status Lorem ipsum dolor sit amet.</p>
                    </div>
                    <br>
                    <div class="row" style="border: 1px solid white;box-shadow: 0 1px 3px rgba(0,0,0,0.12), 0 1px 2px rgba(0,0,0,0.24);">
                        <h4 class="col-sm-12"><b>Name Lorem ipsum, dolor sit amet consectetur adipisicing elit. Tempora, cupiditate.</b></h4>
                        {{-- <hr> --}}
                        <p class="col-sm-5"> <b>Inventor</b> Lorem ipsum dolor sit amet co Quasi, delectus?</p>
                        <p class="col-sm-5">Co-inventor : Lorem ipsum dolor sit amet.</p>
                        <p class="col-sm-5">Application no. Lorem, ipsum dolor.</p>
                        <p class="col-sm-5">Type Lorem, ipsum dolor.</p>
                        <p class="col-sm-4">Appl Date Lorem ipsum dolor sit amet.</p>
                        <p class="col-sm-4">Publication Date Lorem ipsum dolor sit amet.</p>
                        <p class="col-sm-4">Status Lorem ipsum dolor sit amet.</p>
                    </div>
                    <br>
                    <div class="row" style="border: 1px solid white;box-shadow: 0 1px 3px rgba(0,0,0,0.12), 0 1px 2px rgba(0,0,0,0.24);">
                        <h4 class="col-sm-12"><b>Name Lorem ipsum, dolor sit amet consectetur adipisicing elit. Tempora, cupiditate.</b></h4>
                        {{-- <hr> --}}
                        <p class="col-sm-5"> <b>Inventor</b> Lorem ipsum dolor sit amet co Quasi, delectus?</p>
                        <p class="col-sm-5">Co-inventor : Lorem ipsum dolor sit amet.</p>
                        <p class="col-sm-5">Application no. Lorem, ipsum dolor.</p>
                        <p class="col-sm-5">Type Lorem, ipsum dolor.</p>
                        <p class="col-sm-4">Appl Date Lorem ipsum dolor sit amet.</p>
                        <p class="col-sm-4">Publication Date Lorem ipsum dolor sit amet.</p>
                        <p class="col-sm-4">Status Lorem ipsum dolor sit amet.</p>
                    </div>
                    <br>
                    
                </div>
            </div>
        </div>
    </div>
    <hr>
    <div class="row">
        <h3 class="text-danger collapsible" data-toggle="collapse" data-target="#activities"><b>Activities</b></h3>
        <div id="activities" class="collapse">
            <p>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Nulla delectus accusantium animi laudantium aliquid, voluptates, consequatur placeat, libero a recusandae magni error facilis suscipit cum illo excepturi voluptatem quod modi cumque aliquam praesentium. Iure minus harum mollitia. Harum aliquam eum voluptates, temporibus itaque dignissimos dolorem nesciunt soluta fugiat explicabo delectus dolor, inventore, voluptatem nisi. Officia distinctio placeat facilis ratione itaque incidunt repellendus, fugit saepe? Magni mollitia asperiores id esse minus ipsum dignissimos iusto nam eaque tempore! Inventore expedita sunt nobis facilis dolores enim cum exercitationem delectus accusamus! Obcaecati nesciunt cumque non earum. Dolore, amet eveniet perspiciatis reprehenderit impedit magnam nulla!</p>
        </div>
    </div>
    <hr>
    <div class="row">
        <h3 class="text-danger collapsible" data-toggle="collapse" data-target="#research-grants"><b>Research Grants</b></h3>
        <div id="research-grants" class="">
            <div class="col-sm-12">
                <div class="form-group row">
                    <label class="col-sm-2 col-sm-offset-7 text-right">Academic Year</label>
                    <select class="col-sm-2" name="year" data-category="paper-publications">
                        <option>1</option>
                        <option>2</option>
                        <option>3</option>
                        <option>4</option>
                        <option>5</option>
                    </select>
                </div>
                <div class="col-sm-12" >
                    <div class="row" style="border: 1px solid white;box-shadow: 0 1px 3px rgba(0,0,0,0.12), 0 1px 2px rgba(0,0,0,0.24);">
                        <h4 class="col-sm-12"><b>Title Lorem ipsum, dolor sit amet consectetur adipisicing elit. Tempora, cupiditate.</b></h4>
                        {{-- <hr> --}}
                        <p class="col-sm-12"> <b>Agency</b> Lorem ipsum dolor sit amet co Quasi, delectus?</p>
                        <p class="col-sm-4">Period : Lorem ipsum dolor sit amet.</p>
                        <p class="col-sm-4">Grant amt. Lorem, ipsum dolor.</p>
                    </div>
                    <br>
                    <div class="row" style="border: 1px solid white;box-shadow: 0 1px 3px rgba(0,0,0,0.12), 0 1px 2px rgba(0,0,0,0.24);">
                        <h4 class="col-sm-12"><b>Title Lorem ipsum, dolor sit amet consectetur adipisicing elit. Tempora, cupiditate.</b></h4>
                        {{-- <hr> --}}
                        <p class="col-sm-12"> <b>Agency</b> Lorem ipsum dolor sit amet co Quasi, delectus?</p>
                        <p class="col-sm-4">Period : Lorem ipsum dolor sit amet.</p>
                        <p class="col-sm-4">Grant amt. Lorem, ipsum dolor.</p>
                    </div>
                    <br>
                    <div class="row" style="border: 1px solid white;box-shadow: 0 1px 3px rgba(0,0,0,0.12), 0 1px 2px rgba(0,0,0,0.24);">
                        <h4 class="col-sm-12"><b>Title Lorem ipsum, dolor sit amet consectetur adipisicing elit. Tempora, cupiditate.</b></h4>
                        {{-- <hr> --}}
                        <p class="col-sm-12"> <b>Agency</b> Lorem ipsum dolor sit amet co Quasi, delectus?</p>
                        <p class="col-sm-4">Period : Lorem ipsum dolor sit amet.</p>
                        <p class="col-sm-4">Grant amt. Lorem, ipsum dolor.</p>
                    </div>
                    <br>
                    
                    
                </div>
            </div>
        </div>
    </div>
    <hr>
    <div class="row">
        <h3 class="text-danger collapsible" data-toggle="collapse" data-target="#industry-interaction"><b>Industry Interaction</b></h3>
        <div id="industry-interaction" class="">
            <div class="col-sm-12">
                <div class="form-group row">
                    <label class="col-sm-2 col-sm-offset-7 text-right">Academic Year</label>
                    <select class="col-sm-2" name="year" data-category="paper-publications">
                        <option>1</option>
                        <option>2</option>
                        <option>3</option>
                        <option>4</option>
                        <option>5</option>
                    </select>
                </div>
                <div class="col-sm-12" >
                    <div class="row" style="border: 1px solid white;box-shadow: 0 1px 3px rgba(0,0,0,0.12), 0 1px 2px rgba(0,0,0,0.24);">
                        <h4 class="col-sm-12"><b>Title Lorem ipsum, dolor sit amet consectetur adipisicing elit. Tempora, cupiditate.</b></h4>
                        {{-- <hr> --}}
                        <p class="col-sm-12"> <b>Industry</b> Lorem ipsum dolor sit amet co Quasi, delectus?</p>
                        <p class="col-sm-4">Faculty name : Lorem ipsum dolor sit amet.</p>
                        <p class="col-sm-4">Faculty contact. Lorem, ipsum dolor.</p>
                    </div>
                    <br>
                    <div class="row" style="border: 1px solid white;box-shadow: 0 1px 3px rgba(0,0,0,0.12), 0 1px 2px rgba(0,0,0,0.24);">
                        <h4 class="col-sm-12"><b>Title Lorem ipsum, dolor sit amet consectetur adipisicing elit. Tempora, cupiditate.</b></h4>
                        {{-- <hr> --}}
                        <p class="col-sm-12"> <b>Industry</b> Lorem ipsum dolor sit amet co Quasi, delectus?</p>
                        <p class="col-sm-4">Faculty name : Lorem ipsum dolor sit amet.</p>
                        <p class="col-sm-4">Faculty contact. Lorem, ipsum dolor.</p>
                    </div>
                    <br>
                    <div class="row" style="border: 1px solid white;box-shadow: 0 1px 3px rgba(0,0,0,0.12), 0 1px 2px rgba(0,0,0,0.24);">
                        <h4 class="col-sm-12"><b>Title Lorem ipsum, dolor sit amet consectetur adipisicing elit. Tempora, cupiditate.</b></h4>
                        {{-- <hr> --}}
                        <p class="col-sm-12"> <b>Industry</b> Lorem ipsum dolor sit amet co Quasi, delectus?</p>
                        <p class="col-sm-4">Faculty name : Lorem ipsum dolor sit amet.</p>
                        <p class="col-sm-4">Faculty contact. Lorem, ipsum dolor.</p>
                    </div>
                    <br>
                    
                </div>
            </div>
        </div>
    </div>
    <hr>
    <div class="row">
        <h3 class="text-danger collapsible" data-toggle="collapse" data-target="#invitations"><b>Invitations</b></h3>
        <div id="invitations" class="">
            <div class="col-sm-12">
                <div class="form-group row">
                    <label class="col-sm-2 col-sm-offset-7 text-right">Academic Year</label>
                    <select class="col-sm-2" name="year" data-category="paper-publications">
                        <option>1</option>
                        <option>2</option>
                        <option>3</option>
                        <option>4</option>
                        <option>5</option>
                    </select>
                </div>
                <div class="col-sm-12" >
                    <div class="row" style="border: 1px solid white;box-shadow: 0 1px 3px rgba(0,0,0,0.12), 0 1px 2px rgba(0,0,0,0.24);">
                        <h4 class="col-sm-12"><b>Title Lorem ipsum, dolor sit amet consectetur adipisicing elit. Tempora, cupiditate.</b></h4>
                        {{-- <hr> --}}
                        <p class="col-sm-12"> <b>Title of Conference</b> Lorem ipsum dolor sit amet co Quasi, delectus?</p>
                        <p class="col-sm-4">Organised by : Lorem ipsum dolor sit amet.</p>
                        <p class="col-sm-4">Type Lorem, ipsum dolor.</p>
                    </div>
                    <br>
                    <div class="row" style="border: 1px solid white;box-shadow: 0 1px 3px rgba(0,0,0,0.12), 0 1px 2px rgba(0,0,0,0.24);">
                        <h4 class="col-sm-12"><b>Title Lorem ipsum, dolor sit amet consectetur adipisicing elit. Tempora, cupiditate.</b></h4>
                        {{-- <hr> --}}
                        <p class="col-sm-12"> <b>Title of Conference</b> Lorem ipsum dolor sit amet co Quasi, delectus?</p>
                        <p class="col-sm-4">Organised by : Lorem ipsum dolor sit amet.</p>
                        <p class="col-sm-4">Type Lorem, ipsum dolor.</p>
                    </div>
                    <br>
                    <div class="row" style="border: 1px solid white;box-shadow: 0 1px 3px rgba(0,0,0,0.12), 0 1px 2px rgba(0,0,0,0.24);">
                        <h4 class="col-sm-12"><b>Title Lorem ipsum, dolor sit amet consectetur adipisicing elit. Tempora, cupiditate.</b></h4>
                        {{-- <hr> --}}
                        <p class="col-sm-12"> <b>Title of Conference</b> Lorem ipsum dolor sit amet co Quasi, delectus?</p>
                        <p class="col-sm-4">Organised by : Lorem ipsum dolor sit amet.</p>
                        <p class="col-sm-4">Type Lorem, ipsum dolor.</p>
                    </div>
                    <br>
                    
                </div>
            </div>
        </div>
    </div>
    <br>
    <br>
    <br>
    
</div>

<script>
    // $(document).ready(function() {
    //     $("[name='year']").on('change',function() {
    //         alert($(this).data('category'));
    //         $('#valsel').text($(this).val());
    //     });
    // });
</script>

@stop

