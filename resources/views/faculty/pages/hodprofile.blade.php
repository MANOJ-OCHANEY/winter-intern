@extends('faculty.layouts.dashboard')

@section('section')
<form action="search" method="post">{{csrf_field()}}
<h1>Faculty search</h1>
    <h3><u>Year</u></h3>
        <label for="chkPassport1">Do you want to search :
        1)by year ?<input type="checkbox" id="chkPassport1" onclick="ShowHideDiv1(this)" />
        </label>
        <div id="dvPassport1" style="display: none">
            Year:
            <input type="number" name="search_year" id="txtPassportNumber" />
        </div>
        <b>2)Entire year</b><input type="checkbox" name="all_year" value="all">
    <h3><u>Faculty name</u></h3>
        <label for="chkPassport2">
        Do you want to search :
        1)by Faculty ?<input type="checkbox" id="chkPassport" onclick="ShowHideDiv2(this)" />
        </label>
        <div id="dvPassport2" style="display: none">
            Faculty Name:
            <input type="text" name="search_faculty" id="txtPassportNumber" />
        </div>
        <b>2)All Faculty</b><input type="checkbox" name="all_faculty" value="all">
    <br>
    <label> What do you want??</label><br>
    <input type="checkbox" name="paper" value="paper">paper<br>
    <input type="checkbox" name="course" value="course">course<br>
    <input type="checkbox" name="patent" value="patent">patent<br>
    <input type="checkbox" name="activity" value="activity">activity<br>
    <input type="checkbox" name="industry_interaction" value="industry_interaction">industry interaction<br>
    <input type="checkbox" name="invitation" value="invitation">invitation<br>
    <input type="checkbox" name="research_grant" value="research_grant">research grant<br>
    <button type="submit"><i class="fa fa-search"></i></button>
</form>

<script type="text/javascript">
    function ShowHideDiv1(chkPassport1) {
        var dvPassport = document.getElementById("dvPassport1");
        dvPassport1.style.display = chkPassport1.checked ? "block" : "none";
    }
    function ShowHideDiv2(chkPassport2) {
        var dvPassport = document.getElementById("dvPassport2");
        dvPassport.style.display = chkPassport2.checked ? "block" : "none";
    }
</script>


@endsection