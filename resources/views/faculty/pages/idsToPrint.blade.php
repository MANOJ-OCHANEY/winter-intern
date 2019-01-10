@extends('faculty.layouts.dashboard')
@section('section')

@if($orientation == 1)
<style>
body{
    margin: 0%;
    font-family: 'verdana';
}

* {
box-sizing: border-box;
}

/* .id-card-front-column{
padding-right:0.7in;
padding-bottom:0.5975in
} */

/* .id-card-back-column{
    padding-bottom:0.5975in
} */

.id-card-front {
width: 3.370in;
height:2.125in;
background-color: #fff;
border-radius: 10px;		
box-shadow: 0 0 1.5px 0px #b9b9b9;
position:relative;
/* border:1px solid; */
}

.id-card-back {
width: 3.370in;
height:2.125in;
padding:0.1in;
background-color: #fff;
border-radius: 10px;		
box-shadow: 0 0 1.5px 0px #b9b9b9;
position:relative;
/* border:1px solid; */
}

.header{
width:3.37in;
height:0.67in;
background-color: #ffff66; 
border-top-left-radius: 10px;
border-top-right-radius: 10px;
}

/* .veslogo{
    position:absolute;
    left: 0.16in;
    top: 0.22in;
    width: 0.16in;
    height: 0.35in;
} */

/* .vivekanand{
position:absolute;
right: 0.20in;
top: 0.20in;
float:right;
width: 0.22in;
height: 0.35in;
} */

.photo{
width:0.67in;
height:0.9in;
position:absolute;
top:0.79in;
left:0.24in;
border:1px solid;
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
@elseif($orientation == 2)
<style> 
    body{
        margin: 0%;
        font-family: 'verdana';
    }
    
    * {
    box-sizing: border-box;
    }

    /* .id-card-front-column{
    padding-right:0.7in;
    padding-bottom:0.5975in
    } */

    /* .id-card-back-column{
        padding-bottom:0.5975in
    } */

    .id-card-front{
    width: 2.125in;
    height: 3.370in;
    background-color: #fff;
    border-radius: 10px;		
    box-shadow: 0 0 1.5px 0px #b9b9b9;
    position:relative;
    /* border:1px solid; */
    }
    
    .id-card-back {
        width: 2.125in;
        height: 3.370in;
        padding:0.1in;
        background-color: #fff;
        border-radius: 10px;		
        box-shadow: 0 0 1.5px 0px #b9b9b9;
        position:relative;
        /* border:1px solid; */
    }
    
    .header{
    width:2.125in;
    height:1in;
    background-color: #ffff66; 
    border-top-left-radius: 10px;
    border-top-right-radius: 10px;
    }
    
    /* .veslogo{
        position:absolute;
        left: 0.05in;
        top: 0.22in;
        width: 0.16in;
        height: 0.35in;
    } */

    /* .vivekanand{
    position:absolute;
    right:0.03in;
    top: 0.20in;
    float:right;
    width:0.2in;
    height: 0.35in;
    } */

    .photo{
    /* margin-top: 5%; */
    /* margin-left: auto; */
    /* margin-right: auto; */
    width:0.67in;
    height:0.9in;
    position: absolute;
    /* top:0.79in; */
    top:1in;
    /* left:0.15in; */
    left:0.73in;
    border:1px solid;
    }

    .details{
    /* margin-top: 5%; */
    /* margin-left: 10%; */
    width:2.125in;
    height:0.9in;
    /* position: relative; */
    /* top:0.79in; */
    position:absolute;
    top:1.9in;
    /* left:1in; */
    /* left:0.1in; */
    text-align: center;
    }

    .sign{
    width:0.79in;
    height:0.4in;
    position:absolute;
    /* top:3.1in; */
    top:2.97in;
    /* left:1.3in; */
    left:1.335in;
    }
    
    .id-card img {
        margin: 0 auto;
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
@endif   


<div class="btn-group" role="group">
<a href="{{url('/staff/idsToPrint/1')}}" class="btn btn-primary" >Horizontal</a>
<a href="{{url('/staff/idsToPrint/2')}}" class="btn btn-primary" >Vertical</a>
</div>

<div class="row">
    <h2>No. of verified ID(s) which can be printed now is/are {{ $students_count }}</h2>
</div>
<div id="printableArea">
    {{-- <table class="table_disp"> --}}
    <table>

        @foreach($students as $student)
        <tr>
            @if($orientation == 1)
            <td class="id-card-front-column" style="padding-right:0.7in;
            padding-bottom:0.5975in">
            @elseif($orientation == 2)
            <td class="id-card-front-column" style="padding-right:0.7in;
            padding-bottom:0.5975in">
            @endif
                <div class="id-card-front">

                        <div class="header">
                            <p style="font-size: 8px"><b>"Arise! Awake! And stop not till the goal is reached"</b></p>
                            <p style="color:crimson;font-size:11px"><b> VIVEKANAND EDUCATION SOCIETY's</p>
                            <p style="color:crimson;font-size:11px"> Institute of Technology</b></p>
                            <p style="font-size:8px">Collector's Colony,Chembur,Mumbai-74</p> <p style="font-size:8px">Tel.:022-61532532 Fax: 022-61532555</p>
                            
                            {{--For Horizontal --}}
                            @if($orientation == 1)
                            <img src="{{ URL::to('images/veslogo.png') }}" alt="veslogo" class="veslogo" style="position:absolute;left: 0.16in;top: 0.22in;width: 0.16in;height: 0.35in;">

                            <img src="{{ URL::to('images/vivekanand.jpg') }}" alt="vivekanand" class="vivekanand" style="position:absolute;right: 0.20in;top: 0.20in;float:right;width: 0.22in;height: 0.35in;">
                            
                            {{--For Vertical --}}
                            @elseif($orientation == 2)
                            <img src="{{ URL::to('images/veslogo.png') }}" alt="veslogo" class="veslogo" style="position:absolute;left: 0.05in;top: 0.22in;width: 0.16in;height: 0.35in">

                            <img src="{{ URL::to('images/vivekanand.jpg') }}" alt="vivekanand" class="vivekanand" style="position:absolute;right:0.03in;top: 0.20in;float:right;width:0.2in;height: 0.35in;">
                            
                            @endif

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

                        {{-- <div class="barcode"style="position:absolute; top:1.5in; left:0.95in;width: 0.5in; height:0.2in">
                            {!! DNS1D::getBarcodeHTML("44456456", "C128") !!}
                        </div> --}}
                        
                        <div class="sign">
                            {{-- <img src="{{ URL::to('images/idsign.jpg') }}" style="width:100%;height:100%;border-radius:10px"> --}}
                            <p>Principal Sign</p>
                        </div>
                </div>
            </td>
            @if($orientation == 1)
            <td class="id-card-back-column" style="padding-bottom:0.5975in">
            @elseif($orientation == 2)
            <td class="id-card-back-column" style="padding-bottom:0.5975in">
            @endif
            {{-- <td class="id-card-back-column"> --}}
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
                            <p style="text-align:center"><b>Validity of the card:{{($student->admission_year+4)}}</b></p>
                    </div>
                </div>
            </td>
        </tr>
        @endforeach

        

    </table>
</div> 


<div class="row">
    {{-- <input type="button" onclick="printPage('printableArea');" value="Print View" />     --}}
    {{-- <input type="button" value="Edit" />     --}}
    {{-- <a href=" {{ url('/staff/editidDetails/'.$student[0]->dte_id) }} " class="btn btn-primary">Edit</a> --}}
    {{-- <a href=" {{ url('/staff/editIdDetails/'.$application_id) }} " class="btn btn-primary">Edit</a> --}}
    <a class="btn btn-primary" onclick="printPage();">Print View</a>    
</div>

<script>
var orientation = {{ $orientation }};
// console.log(typeof(or));
function printPage(){
    html = document.getElementById('printableArea').outerHTML;
    var mystyle;
    if(orientation == 1){
    mystyle = '<link rel="stylesheet" href="/css/idcardhorizontal.css" media="all"/>';
    }
    else {
        mystyle = '<link rel="stylesheet" href="/css/idcardvertical.css" media="all"/>';
    }
    var w = window.open("");
    w.document.write( mystyle+html); 
}
</script>
@endsection