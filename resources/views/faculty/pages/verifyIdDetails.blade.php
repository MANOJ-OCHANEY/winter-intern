@extends('faculty.layouts.dashboard')
@section('section')

<style>
  ul, ol {
    list-style: none;
  }
  #accordion1 li.panel-body{
    margin-bottom: 0px;
    border:1px solid;
    /* text-align: center; */
  }

</style>

{{-- <div class = "page-container"> 
    @foreach($students as $student) 
  <div class="panel-group" id="accordion">
    <div class="panel panel-default">
      <div class="panel-heading">
        <h4 class="panel-title">
        <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion" href="#collapse{{$student->application_id}}">
            <label>Application ID: {{$student->application_id}}</label>
            <label>{{$student->full_name}}</label>
          </a>
        </h4>
      </div>
      <div id="collapse{{$student->application_id}}" class="panel-collapse collapse in">
        <div class="panel-body">
                <img src="/storage/student_idcard_photo/{{$student->photo}}" alt="Student photo" class="img-rounded col-sm-3">
          <table class="">
            <tr>
                <td class="col-sm-3">                            
                    <p><b>ADMISSION YEAR {{ $student->admission_year }}</b></p>
                    <p>Full Name: {{ $student->full_name }}</p>
                    <p>Date of Birth: {{ $student->date_of_birth }}</p>
                    <p>Blood Group: {{ $student->blood_group}}</p>
                    <p><b>{{ $student->course }}</b></p>                    
                </td>
                <td  class="col-sm-3">
                    <p><b>Residential Address: </b>{{ $student->residential_address }}</p>
                    <p><b>Contact:</b> {{ $student->mobile_no }}</p>
                    <p><b>E-mail-id:</b> {{ $student->email_id }}</p>
                </td>
            </tr>
          </table>
          <button type="submit" class="btn btn-danger">Revert</button>
          <button type="submit" class="btn btn-success">Verified</button>
        </div>
      </div>
    </div>
  </div> 
  @endforeach 
</div> --}}
{{-- <div class="page-container"> --}}
{{-- <div class="row"> --}}

  <div class="row">
    <h3>No. of applications to be verified:{{ $applications_count }}</h3>
  </div>
  <div class="container-fluid">
      <ul class="panel-collapse collapse in" id="accordion1">

        @foreach($students as $student)
          <li class="panel-body"> <a data-toggle="collapse" data-parent="#accordion1" href="#applicationId{{$student->application_id}}">Application ID: {{$student->application_id}}</a>

            <div id="applicationId{{$student->application_id}}" class="collapse">
                <div class="col-sm-3">
                  <img src="/storage/student_idcard_photo/{{$student->photo}}" alt="Student photo" class="img-rounded" style="width:100%">
                </div>
                <div class="col-sm-9">
                  {{-- <table class="col-sm-9"> --}}
                    {{-- <tr> --}}
                        {{-- <td >                             --}}
                          {{-- </td> --}}
                          <p class="col-sm-12"><b>ADMISSION YEAR {{ $student->admission_year }}</b></p>
                          <p class="col-sm-6">Full Name: {{ $student->full_name }}</p>
                          <p class="col-sm-6"><b>Residential Address: </b>{{ $student->residential_address }}</p>
                          <p class="col-sm-6">Date of Birth: {{ $student->date_of_birth }}</p>
                          <p class="col-sm-6"><b>Contact:</b> {{ $student->mobile_no }}</p>
                          <p class="col-sm-6">Blood Group: {{ $student->blood_group}}</p>
                          <p class="col-sm-6"><b>E-mail-id:</b> {{ $student->email_id }}</p>
                          <p class="col-sm-6"><b>Course:{{ $student->course }}</b></p>                    
                          {{-- <p class="col-sm-12"><b>ADMISSION YEAR {{ $student->admission_year }}</b></p>
                          <p>Full Name: {{ $student->full_name }}</p>
                          <p>Date of Birth: {{ $student->date_of_birth }}</p>
                          <p>Blood Group: {{ $student->blood_group}}</p>
                          <p><b>{{ $student->course }}</b></p>                     --}}
                        {{-- <td  > --}}
                            {{-- <p><b>Residential Address: </b>{{ $student->residential_address }}</p>
                            <p><b>Contact:</b> {{ $student->mobile_no }}</p>
                            <p><b>E-mail-id:</b> {{ $student->email_id }}</p> --}}
                        {{-- </td> --}}
                    {{-- </tr> --}}
                  {{-- </table> --}}

                  <div class="col-sm-12 text-right">
                    <a type="submit" href="{{url('/staff/revertForIdEdit/'.$student->application_id)}}" class="btn btn-danger">Revert</a>
                    <a type="submit" href="{{url('/staff/forwardForIdPrint/'.$student->application_id)}}" class="btn btn-success">Verified</a>
                  </div>
                </div>
            </div>

          </li>
        @endforeach

      </ul>
  </div>
{{-- </div> --}}
{{-- </div> --}}
@endsection