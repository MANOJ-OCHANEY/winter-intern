<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Term;
use App\Student;
use App\StudentAllotment;

/* --------------------------------------------------
|   This controller is used while enrolling students
|  --------------------------------------------------
*/

class ExamDeptController extends Controller
{
    /*
    | ---------------------------------------------------------------------------------------------
    |   Index function loads data from database if the students were enrolled in the term specified
    |   otherwise returns a form to enter term id and division
    |  ---------------------------------------------------------------------------------------------
    |   input: term , division and error
    |   output: returns the updateStudent page
    */
    public function index($error = null,$term=null) {
    	if(session('e_id')){
            $data = array(
                'term_error' => $error,
                'term' => $term
            );
            if($term) {
                $fullList = StudentAllotment::where(['term_id'=>$term['term_id'],'division'=>$term['division'],'status'=>1])->get(['uid']);
                $midList = StudentAllotment::where(['term_id'=>$term['term_id'],'division'=>$term['division'],'status'=>2])->get(['uid']);
                $droppedList = StudentAllotment::where(['term_id'=>$term['term_id'],'division'=>$term['division'],'status'=>3])->get(['uid','date']);

                $fullList = $fullList->pluck('uid')->toArray();
                $midList = $midList->pluck('uid')->toArray();
                $droppedListUid = $droppedList->pluck('uid')->toArray();
                $droppedListDate = $droppedList->pluck('date','uid')->toArray();

	            $full = Student::whereIn('uid', $fullList)->orderBy('last_name')->get(['uid','last_name','first_name'])->toArray();
	            $mid = Student::whereIn('uid', $midList)->orderBy('last_name')->get(['uid','last_name','first_name'])->toArray();
                $dropped = Student::whereIn('uid', $droppedListUid)->orderBy('last_name')->get(['uid','last_name','first_name']);
                foreach($dropped as $d) {
                    $d['date'] = $droppedListDate[$d['uid']];
                }
                $dropped = $dropped->toArray();
                
	            $data['full'] = $full;
	            $data['mid'] = $mid;
	            $data['dropped'] = $dropped;
            }
            return view('faculty.pages.updateStudent')->with('data',$data);
        }
        else {
            return redirect()->back()->with('error','Unauthorised Access');
        }
    }


    /*
    | ---------------------------------------------------------------------------------------------
    |   verifyTerm function checks whether term is present or not
    |  ---------------------------------------------------------------------------------------------
    |   input: term_id, division
    |   output: term error if present otherwise returns term
    */
    public function verifyTerm() {
        if(session('e_id')){
            $term_id = request('term_id');
            $term = Term::where('term_id',$term_id)->first();
            $div = request('division');

            if($term) {
                $term = $term->toarray();
                $term['division'] = $div;
            	return $this->index(null,$term);
            }
            else {
            	return $this->index(true);
            }
        }
        else{
            return redirect()->back()->with('error','Unauthorised Access');
        }
    }


    /*
    | ---------------------------------------------------------------------------------------------
    |   addByUid function takes multiple UIDs at the same time, stores in an array and adds all
    |   of them in database
    |  ---------------------------------------------------------------------------------------------
    |   input: UID(s)
    |   output: Invalid UIDs array if any and student(s) data for valid UIDs
    */
    public function addByUid() {
    	if(session('e_id')){
            $var = request('uids');
            $term_id = request('term_id');

            $arr = array();
            $tok = strtok($var, " ,");
            array_push($arr,$tok);
            while ($tok !== false) {
                $tok = strtok(" ,");
                array_push($arr,$tok);
            }
            array_pop($arr);
            $invalid = array();
            $alreadyEnrolled = array();
            
            $enrolled = StudentAllotment::where(['term_id'=>$term_id])->whereIn('status', [1, 2])->get(['uid']);
            $enrolled = $enrolled->pluck('uid')->toArray();
            foreach($arr as $a) {
                if(strlen($a) != 8 || !is_numeric($a) || $a[2] != $term_id[2] || $a[3] != $term_id[3]) {
                    array_push($invalid,$a);
                }
                if(array_search($a,$enrolled) !== false) {
                    array_push($alreadyEnrolled,$a);
                }
            }
            $arr = array_diff($arr,$invalid);
            $arr = array_diff($arr,$alreadyEnrolled);
            $results = Student::whereIn('uid', $arr)->orderBy('last_name')->get(['uid','last_name','first_name']);
            foreach($results as $result) {
                $result['full_name'] = $result['last_name'].' '.$result['first_name'];
            }
            $results = $results->toJson();
            return array($results,$invalid,$alreadyEnrolled);
        }
        else {
            return redirect()->back()->with('error','Unauthorised Access');
        }
    }


    /*
    | ---------------------------------------------------------------------------------------------
    |   fetchStudents function fetches the list of students from previous semester to carry forward 
    |   them to next semester
    |  ---------------------------------------------------------------------------------------------
    |   input: term
    |   output: list of students in the term
    */
    public function fetchStudents() {
    	if(session('e_id')){
            $term = request('term');
            $div = request('division');
            $studentList = StudentAllotment::where(['term_id'=>$term,'division'=>$div])->whereIn('status', [1,2])->get(['uid']);
            $studentList = $studentList->pluck('uid')->toArray();
            $results = Student::whereIn('uid', $studentList)->orderBy('last_name')->get(['uid','last_name','first_name'])->toJson();
            return $results;
        }
        else {
            return redirect()->back()->with('error','Unauthorised Access');
        }
    }


    /*
    |  ---------------------------------------------------------------------------------------------
    |   addToDB function adds students data in database
    |  ---------------------------------------------------------------------------------------------
    |   input: term_id, division and UIDs of students to be enrolled
    |   output: redirects to the updateStudents(initial) page
    */
    public function addToDB() {
    	if(session('e_id')){
            $term_id = request('term');
            $div = request('division');
            $status = request('status');
            $uid = request('uid');
            $uids = json_decode($uid);
            $date = request('date');
            if($status == 1) {
                $date = null;
            }

            $term = Term::where('term_id',$term_id)->first();
            foreach ($uids as $uid) {
                $student = StudentAllotment::where(['term_id'=>$term_id,'division'=>$div,'uid'=>$uid])->first();
                if($student == null) {
                    $term->students()->attach($uid,['division' => $div, 'date' => $date, 'status' => $status]);
                }
                else {
                    $student->update(['status' => $status, 'date' => $date]);
                }
            }
            $term = $term->toarray();
            $term['division'] = $div;
            return $this->index(null,$term);
        }
        else {
            return redirect()->back()->with('error','Unauthorised Access');
        }
    }


    /* ---------------------------------------------------------------------------------------------
    |   removeFromDB function removes students data from database
    |  ---------------------------------------------------------------------------------------------
    |   input: term_id, division and UIDs of students to be removed
    |   output: N/A
    */
    public function removeFromDB() {
        if(session('e_id')){
            $term_id = request('term');
            $div = request('division');
            $option = request('option');
            $uid = request('uid');
            $uids = json_decode($uid);

            if($option == 1) {
                $date = request('date');
                foreach ($uids as $uid) {
                    StudentAllotment::where(['term_id'=>$term_id,'division'=>$div,'uid'=>$uid])->first()->update(['status' => 3, 'date' => $date]);
                }
            }
            else {
                foreach ($uids as $uid) {
                    StudentAllotment::where(['term_id'=>$term_id,'division'=>$div,'uid'=>$uid])->delete();
                }
            }
            return;
        }
        else {
            return redirect()->back()->with('error','Unauthorised Access');
        }
    }
}
