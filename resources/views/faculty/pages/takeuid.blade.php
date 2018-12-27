@extends('faculty.layouts.dashboard')

@section('section')
    <h1>Enter the UID of Student</h1>
    {!! Form::open(['action'=>'StudentDetailController@passid', 'method'=>'POST']) !!}
        <div class="row">
            <div class="col-sm-3">
                <div class="form-group">
                    <label>Student UID:</label>
                    {{Form::text('uid', '', ['class' => 'form-control', 'placeholder' => 'Enter UID'])}}
                </div>             
            </div>
        </div>
        {{Form::submit('Submit', ['class'=>'btn btn-primary'])}}
    {!! Form::close() !!} 
@endsection