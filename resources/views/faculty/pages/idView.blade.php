@extends('faculty.layouts.dashboard')
@section('section')
<style>

.id-card-front {
width: 3.370in;
height:2.125in;
background-color: #fff;
border-radius: 10px;		
box-shadow: 0 0 1.5px 0px #b9b9b9;
position:relative;
border:1px solid;
}
.id-card-back {
width: 3.370in;
height:2.125in;
padding:0.1in;
background-color: #fff;
border-radius: 10px;		
box-shadow: 0 0 1.5px 0px #b9b9b9;
position:relative;
border:1px solid;
}
.header{
width:3.35in;
height:0.67in;
background-color: #ffff66; 
border-top-left-radius: 10px;
border-top-right-radius: 10px;
}
.photo{
width:0.67in;
height:0.9in;
position:absolute;
top:0.79in;
left:0.24in;
border:2px solid;
}
.details{
width:2.37in;
height:0.9in;
position:absolute;
top:0.79in;
left:1in;

}
.sign{
width:0.79in;
height:0.4in;
position:absolute;
top:1.725in;
left:2.58in;
}

.id-card img {
    margin: 0 auto;
}

.photo img {

}
h2 {
    font-size: 15px;
    margin: 5px 0;
}
h3 {
    font-size: 12px;
    margin: 2.5px 0;
    font-weight: 300;
}
p {
    font-size: 9px;
    margin:1px;
}
.header p{
    margin:0;
    text-align: center;
}
</style>


<h1>Your Application ID is {{$application_id}}</h1>
<div id="printableArea">
    <table class="table_disp">

        {{-- @foreach($students as $student) --}}
        <tr>
            <td style="padding-right:0.7in;padding-bottom:0.5975in">
                <div class="id-card-front">

                        <div class="header">
                            <p style="font-size: 8px"><b>"Arise! Awake! And stop not till the goal is reached"</b></p>
                            <p style="color:crimson;font-size: 11px"><b> VIVEKANAND EDUCATION SOCIETY</p>
                            <p style="color:crimson;font-size:11px"> Institute of Technology</b></p>
                            <p style="font-size: 8px">Collector's Colony,Chembur,Mumbai-74</p> <p style="font-size: 8px">Tel.:022-61532532 Fax: 022-61532555</p>
    
                            <img src="{{ URL::to('images/logo.png') }}" alt="logo" style="position:absolute; left: 0.16in; top: 0.22in; width: 0.16in;height: 0.35in">
    
                            <img src="{{ URL::to('images/vivek.jpg') }}" alt="vivek" style="position:absolute;right: 0.20in; top: 0.20in; float:right; width: 0.22in; height: 0.35in">
                        </div>

                        <div class="photo">
                            <img style="width:100%;height:100%" src="/storage/student_idcard_photo/{{$student->photo}}">
                        </div>
                        
                        <div class="details">
                            <p><b>ADMISSION YEAR {{ $student->admission_year }}</b></p>
                            <p>Full Name: {{ $student->full_name }}</p>
                            <p>Date of Birth: {{ $student->date_of_birth }}</p>
                            <p>Blood Group: {{ $student->blood_group}}</p>
                            <p><b>{{ $student->course }}</b></p>
                        </div>
                        
                        <div class="sign">
                            {{-- <img src="{{ URL::to('images/idsign.jpg') }}" style="width:100%;height:100%;border-radius:10px"> --}}
                            <p>Principal Sign</p>
                        </div>
                </div>
            </td>
            <td style="padding-bottom:0.5975in">
                    {{-- BACK SIDE --}}
                <div class="id-card-back">
                    <div class="contact-info">
                        <p><b>Residential Address: </b>{{ $student->residential_address }}</p>
                        <p><b>Contact:</b> {{ $student->mobile_no }}</p>
                        <p><b>E-mail-id:</b> {{ $student->email_id }}</p>
                    <div class="instructions">
                            <p><b>INSTRUCTION:</b></p>
                            
                            <p>1.  It is mandatory to bring the ID card while inside the campus,
                                and also as and when required.
                            </p>
                
                            <p>2.  In case of loss, the students must inform the principal
                                immediately in writing.
                            </p>
                
                            <p>3.  Duplicate card will be issued on payment of Rs.250 only</p>
                
                            <p>4.  This card should be surrendered on completion of final year for
                                obtaining leaving certificate
                            </p>
                    </div>
                </div>
            </td>
        </tr>
        {{-- @endforeach --}}

        

    </table>
</div> 


<div class="row">
    {{-- <input type="button" onclick="printPage('printableArea');" value="Print View" />     --}}
    {{-- <input type="button" value="Edit" />     --}}
    {{-- <a href=" {{ url('/staff/editidDetails/'.$student[0]->dte_id) }} " class="btn btn-primary">Edit</a> --}}
    <a href=" {{ url('/staff/editIdDetails/'.$application_id) }} " class="btn btn-primary">Edit</a>
    {{-- <a class="btn btn-primary" onclick="printPage();">Print View</a>     --}}
</div>

{{-- <script>
function printPage(){
    html = document.getElementById('printableArea').outerHTML; 
    var mystyle = '<link rel="stylesheet" href="/css/idcardstyle.css" media="all"/>'
    var w = window.open("");
    w.document.write( mystyle+html); 
}
</script> --}}
@endsection