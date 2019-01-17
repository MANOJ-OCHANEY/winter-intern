@extends('faculty.layouts.dashboard')
@section('page_heading','Profile')
@section('section')

<div class="container-fluid">
    @isset($paper_publications)
    <p>Paper</p>
    {{ $paper_publications }}<br><br>
    @endisset
    @isset($courses_conducted)
    <p>CC</p>
    {{ $courses_conducted }}<br><br>
    @endisset
    @isset($courses_attended)
    <p>CA</p>
    {{ $courses_attended }}<br><br>
    @endisset
    @isset($activities)
    <p>ACt</p>
    {{ $activities }}<br><br>
    @endisset
    @isset($industry_interactions)
    <p>II</p>
    {{ $industry_interactions }}<br><br>
    @endisset
    @isset($invitations)
    <p>In</p>
    {{ $invitations }}<br><br>
    @endisset
    @isset($patents)
    <p>Pat</p>
    {{ $patents }}<br><br>
    @endisset
    @isset($research_grants)
    <p>RG</p>
    {{ $research_grants }}<br><br>
    @endisset
</div>


@stop