@extends('faculty.layouts.dashboard')
@section('section')

<div class="container-fluid">

    {{-- Enter term id and division form --}}
    <div class="row">
        <form class="form-inline" action="{{ url ('/staff/verifyterm' ) }}" method="post">
            {{ csrf_field() }}
            <div class="form-group">
                <input type="text" class="form-control" name="term_id" placeholder="Enter Term ID" required>
            </div>
            <div class="form-group m-2">
                <select class="form-control" name="division" required>
                    <option value="">Select Division</option>
                    <option value="A">A</option>
                    <option value="B">B</option>
                    <option value="C">C</option>
                </select>
            </div>
            <button type="submit" class="btn btn-primary" id="form-submit">Submit</button>
        </form>
        @if($data['term_error'])
        <h3>Term ID Error</h3>
        @endif
    </div>
    
    @isset($data['full'],$data['mid'],$data['dropped'])
    @if(count($data['full']) == 0 && count($data['mid']) == 0)
    <br>
    {{-- Image for no one enrolled --}}
    <div class="row">
        <div class="col-sm-2 col-sm-offset-5"><img src="{{ URL::to('images/icon_nodata.jpg') }}" alt="" style="width: 80%"></div>
        <div class="col-sm-6 col-sm-offset-3">
            <h3 class="text-center">You don't have any students enrolled!!</h3>
        </div>
    </div>
    <br>
    @endif
    @endisset
    
    @isset($data['full'],$data['mid'],$data['dropped'])
    @if(count($data['full']) == 0 && count($data['mid']) == 0 && $data['term']['semester'] > 1)
    <br>
    {{-- Fetch button --}}
    <div class="row">
        <div class="col-sm-6 col-sm-offset-3">
            <button type="submit" class="btn btn-primary btn-lg btn-block" data-toggle="modal" data-target="#fetchStudents" id="fetch" data-term="{{ $data['term']['term_id'] }}" data-division="{{ $data['term']['division'] }}">Fetch From Previous Term</button>
        </div>
    </div>
    @endif

    <br>
    {{-- Add by UID form --}}
    <div class="row">
        <div class="col-sm-6 col-sm-offset-3">
            <form class="input-group" action="/staff/submit_UIDs">
                <input class="form-control" name="uids" placeholder="Add Students By UIDs" type="text">
                <div class="input-group-btn">
                    <button class="btn btn-primary" type="submit" id="add-uids" data-term="{{ $data['term']['term_id'] }}">Submit</button>
                </div>
            </form>
        </div>
    </div>
    <br>
    @endisset

    @isset($data['term'])
    {{-- To be added to database section --}}
    <div class="row" id="to-add-main" data-term="{{ $data['term']['term_id'] }}" data-division="{{ $data['term']['division'] }}">
    </div>
    <br>

    @isset($data['full'])
    @if(count($data['full']) > 0)
    {{-- Enrolled For Full Term section --}}
    <br>
    <div class="row" id="full-main">
        <fieldset style="padding: 0.5rem !important;border: 2px solid #aaa !important;">
            <legend style="width: auto !important;text-align: center">{{ count($data['full']) }} Student(s) Enrolled For Full Term</legend>
            <div class="row" id="full" data-term="{{ $data['term']['term_id'] }}" data-division="{{ $data['term']['division'] }}">
                @foreach($data['full'] as $result)
                <div class="col-sm-6">
                    <div class="btn-group btn-lg" role="group" style="width: 100%">
                        <button type="button" class="btn btn-secondary btn-lg" style="width: 25%" disabled>{{ $result['uid'] }}</button>
                        <button type="button" class="btn btn-secondary btn-lg" style="width: 65%;overflow:hidden;text-overflow:ellipsis;" disabled>{{ $result['last_name'].' '.$result['first_name'] }}</button>
                        <button type="button" class="btn btn-secondary btn-lg remove-db" style="width: 10%" data-toggle="modal" data-target="#confirm-to-delete"><span class="fa fa-trash-o"></span></button>
                    </div>
                </div>
                @endforeach
            </div>
            <br>
            <div class="row">
                <div class="col-sm-6 col-sm-offset-6">
                    <button type="submit" class="btn btn-danger col-sm-4 col-sm-offset-1" id="reset-full" data-term="{{ $data['term']['term_id'] }}" data-division="{{ $data['term']['division'] }}" data-toggle="modal" data-target="#confirm-to-delete">Reset</button>
                    <button type="submit" class="btn btn-success col-sm-4 col-sm-offset-1" id="done">Done</button>
                </div>
            </div>
            <br>
        </fieldset>
    </div>
    <br>
    @endif
    @endisset

    @isset($data['mid'])
    @if(count($data['mid']) > 0)
    {{-- Enrolled In Between section --}}
    <br>
    <div class="row" id="mid-main">
        <fieldset style="padding: 0.5rem !important;border: 2px solid #aaa !important;">
            <legend style="width: auto !important;text-align: center">{{ count($data['mid']) }} Student(s) Enrolled In Between</legend>
            <div class="row" id="mid" data-term="{{ $data['term']['term_id'] }}" data-division="{{ $data['term']['division'] }}">
                @foreach($data['mid'] as $result)
                <div class="col-sm-6">
                    <div class="btn-group btn-lg" role="group" style="width: 100%">
                        <button type="button" class="btn btn-secondary btn-lg" style="width: 25%" disabled>{{ $result['uid'] }}</button>
                        <button type="button" class="btn btn-secondary btn-lg" style="width: 65%" disabled>{{ $result['last_name'].' '.$result['first_name'] }}</button>
                        <button type="button" class="btn btn-secondary btn-lg remove-db" style="width: 10%" data-toggle="modal" data-target="#confirm-to-delete"><span class="fa fa-trash-o"></span></button>
                    </div>
                </div>
                @endforeach
            </div>
            <br>
            <div class="row">
                <div class="col-sm-6 col-sm-offset-6">
                    <button type="submit" class="btn btn-danger col-sm-4 col-sm-offset-1" id="reset-mid" data-term="{{ $data['term']['term_id'] }}" data-division="{{ $data['term']['division'] }}" data-toggle="modal" data-target="#confirm-to-delete">Reset</button>
                    <button type="submit" class="btn btn-success col-sm-4 col-sm-offset-1" id="done">Done</button>
                </div>
            </div>
            <br>
        </fieldset>
    </div>
    <br>
    @endif
    @endisset

    @isset($data['dropped'])
    @if(count($data['dropped']) > 0)
    {{-- Already added to database section --}}
    <br>
    <div class="row" id="dropped-main">
        <fieldset style="padding: 0.5rem !important;border: 2px solid #aaa !important;">
            <legend style="width: auto !important;text-align: center">{{ count($data['dropped']) }} Student(s) Dropped</legend>
            <div class="row" id="dropped" data-term="{{ $data['term']['term_id'] }}" data-division="{{ $data['term']['division'] }}">
                @foreach($data['dropped'] as $result)
                <div class="col-sm-6">
                    <div class="btn-group btn-lg" role="group" style="width: 100%">
                        <button type="button" class="btn btn-secondary btn-lg" style="width: 25%" disabled>{{ $result['uid'] }}</button>
                        <button type="button" class="btn btn-secondary btn-lg" style="width: 75%" disabled>{{ $result['last_name'].' '.$result['first_name'] }}</button>
                        <p style="text-align: right;margin: 0 15px 0 0;color: graytext;font-style: italic">~Dropped on {{ $result['date'] }}</p>
                    </div>
                </div>
                @endforeach
            </div>
            <br>
        </fieldset>
    </div>
    <br>
    @endif
    @endisset
    @endisset

    {{-- Modal for fetch students --}}
    <div class="modal fade" id="fetchStudents" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog" role="document" style="width: 90%;">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel"></h5>
                </div>
                <div class="modal-body row" id="fetch-students">
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-primary" id="add-fetched" data-dismiss="modal">Add</button>
                </div>
            </div>
        </div>
    </div>

    {{-- Modal for confirmation to add --}}
    <div class="modal fade" id="confirm-to-add" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Confirm</h5>
                </div>
                <div class="modal-body">
                    <p>Do you want to add them as full term.</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-primary add-db" data-status="1" data-dismiss="modal">Yes</button>
                    <button type="button" class="btn btn-primary date-input-btn">No</button><br><br>
                    <form class="input-group" id="date-input">
                        <span class="input-group-addon">Select date of enrollment :</span>
                        <input class="text-center form-control" onkeydown="return false" id="date" name="dt1" max="{{date("Y")}}-{{date("m")}}-{{date("d")}}" onfocus="(this.type='date')" placeholder="Select Date" required/>
                        <div class="input-group-btn">
                            <button type="submit" class="btn btn-primary add-db" data-status="2" data-dismiss="modal">Submit</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    {{-- Modal for confirmation to delete --}}
    <div class="modal fade" id="confirm-to-delete" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Confirm</h5>
                </div>
                <div class="modal-body">
                    <p>If student(s) has/have got a DROP then select the date to drop and click on 'Drop'</p>
                </div>
                <div class="modal-body">
                    <form class="input-group">
                        <span class="input-group-addon">Select date to drop :</span>
                        <input class="text-center form-control" onkeydown="return false" id="date" name="dt2" max="{{date("Y")}}-{{date("m")}}-{{date("d")}}" onfocus="(this.type='date')" placeholder="Select Date" required/>
                        <div class="input-group-btn">
                            <button type="button" class="btn btn-primary delete-db" data-option="1" data-dismiss="modal">Drop</button>
                        </div>
                    </form>
                </div><hr>
                <div class="modal-body">
                    <p>If student(s) was/were enrolled by mistake then click on 'Delete Permanent'</p>
                </div>
                <div class="modal-body">
                    <button type="button" class="btn btn-danger delete-db" data-option="2" data-dismiss="modal">Delete Permanent</button>
                </div>
            </div>
        </div>
    </div>

</div>

@stop