<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Faculty;
use App\Staff;
use App\Department;
use App\Faculty_teaching_staff;
use App\Student;
use Illuminate\Support\Facades\Input;
use App\Course_map;
use App\SubjectAllotment;
use App\Term;
use App\CtCC;
use App\Profile_images;
use File;
use Illuminate\Support\Facades\URL;
use Maatwebsite\Excel\Facades\Excel;
use Carbon\Carbon;
use Validator;
use Redirect;

class StudentDetailController extends Controller
{
    public function takeuid()
    {
        if(session('e_id'))
        {
            return view('faculty.pages.takeuid');
        }
        else
        {
            return redirect()->back()->with('error','Unauthorised Access');
        }     
    }
    public function passid(Request $request)
    {
        $this->validate($request, [
            'uid'=>'required|exists:student',
        ]);

        $temp=$request->input('uid');
        return Redirect::action('StudentDetailController@edit', array('uid'=>$temp));
    }
    
    public function create()
    {
        return view('faculty.pages.addstudent');
    }


    public function edit(Request $request, $uid)
    {
        $student = Student::find($uid);
        return view('faculty.pages.editstudent')->with('student', $student);
    }


    public function store(Request $request)
    {
        
        $dt=Carbon::now()->format('Y-m-d');
        
        $this->validate($request, [
            
            'uid'=>'required|numeric|unique:student',
            'email_id'=>'required|email|unique:student,email_id,',
            'secondary_email_id'=>'required|email|unique:student,secondary_email_id,',
            'admission_year'=>'required|numeric|digits:4',
            'defaulter_action_needed'=>'nullable|alpha',

            'type_of_admission'=>'required',
            'middle_name'=>'nullable|alpha',
            'first_name'=>'required|alpha',
           'last_name'=>'required|alpha',
            'gender'=>'required',
            'mother_name'=>'required|alpha',
            'father_name'=>'required|alpha',
            'nearest_rail_station'=>'nullable|alpha',
            'date_of_birth'=> 'required|date_format:Y-m-d|before:'.$dt,
            'blood_group'=>'required',
            'dte_id'=>'alphanum|size:10',
            'mobile_no'=>'required|numeric|digits:10|unique:student',
            'landline_no'=>'required|numeric|digits_between:8,15|unique:student',
            'permanent_address'=>'required',
            'local_address'=>'required',
             'PIN_permanent_address'=>'required',
             'PIN_local_address'=>'required',
             'nationality'=>'required',
             'aadhar_id'=>'required|digits:12|unique:student',
             'category'=>'required',
             'additional_category'=>'nullable|alpha',
             'mentor_id'=>'numeric|digits:10',
             'branch'=>'required',
        
               'father_phone_no'=>'required|numeric|digits:10|unique:student',
               'mother_phone_no'=>'required|numeric|digits:10|unique:student',

            
            
                        
        ]);


        $students = new Student;
        $students->uid=$request->input('uid');
        $students->email_id=$request->input('email_id');
        $students->secondary_email_id=$request->input('secondary_email_id');
        $students->admission_year=$request->input('admission_year');

        $students->type_of_admission=$request->input('type_of_admission');
       // $staff->short_form=$request->input('short_form');
        $students->first_name=$request->input('first_name');
        $students->middle_name=$request->input('middle_name');
        $students->last_name=$request->input('last_name');
        $students->gender=$request->input('gender');
        $students->mentor_id=$request->input('mentor_id');
        $students->nationality=$request->input('nationality');
        $students->branch=$request->input('branch');
        $students->category=$request->input('category');
        $students->additional_category=$request->input('additional_category');
        $students->dte_id=$request->input('dte_id');
        $students->blood_group=$request->input('blood_group');
        $students->defaulter_action_needed=$request->input('defaulter_action_needed');
        $students->nearest_rail_station=$request->input('nearest_rail_station');
         
       // // $datedoj=$request->input('doj');
       // // $datedoj=date("Y-m-d");
       // // $staff->doj=$datedoj;
       // $staff->doj=$request->input('doj');
       
        $date_of_birth=$request->input('date_of_birth');
        $datedob=date("Y-m-d");
        $students->date_of_birth=$datedob; 
       $students->date_of_birth=$request->input('date_of_birth');
       $students->father_phone_no=$request->input('father_phone_no');
       $students->mother_phone_no=$request->input('mother_phone_no');
       $students->mother_name=$request->input('mother_name');
       $students->father_name=$request->input('father_name');


       // $staff->designation=$request->input('designation');
        $students->mobile_no=$request->input('mobile_no');
        $students->landline_no=$request->input('landline_no');
        $students->permanent_address=$request->input('permanent_address');
        $students->local_address=$request->input('local_address');

        $students->PIN_local_address=$request->input('PIN_permanent_address');
        $students->PIN_local_address=$request->input('PIN_local_address');

        $students->aadhar_id=$request->input('aadhar_id');
       
       
       $students->save();

        return redirect('/students/home')->with('success', 'Student added'); 
   }


        // $input = $request->all();

        // $date = str_replace("-", "", $input['dob']);
        // $input['dob'] = Carbon::parse($date)->format('Y-m-d');

        // $date = str_replace("-", "", $input['dol']);
        // $input['dol'] = Carbon::parse($date)->format('Y-m-d');

        // $date = str_replace("-", "", $input['doj']);
        // $input['doj'] = Carbon::parse($date)->format('Y-m-d');

        // $date = str_replace("-", "", $input['probation_start']);
        // $input['probation_start'] = Carbon::parse($date)->format('Y-m-d');

        // $date = str_replace("-", "", $input['probation_end']);
        // $input['probation_end'] = Carbon::parse($date)->format('Y-m-d');

        // $request->replace($input);



        //Create Post
       
        
    

    
    public function update(Request $request, $uid)
    {
         $dt=Carbon::now()->format('Y-m-d');
        //  echo var_dump($dt).'<br />';
         $this->validate($request, [
            'email_id'=>'required|email|unique:student,email_id,'.(string)$uid.',uid',
            'secondary_email_id'=>'required|email|unique:student,secondary_email_id,'.(string)$uid.',uid',
            'admission_year'=>'required|numeric|digits:4',
            // 'defaulter_action_needed'=>'nullable|alpha',

            'type_of_admission'=>'required',
            'middle_name'=>'required|alpha',
            'first_name'=>'required|alpha',
           'last_name'=>'required|alpha',
            'gender'=>'required',
            'mother_name'=>'required|alpha',
            'father_name'=>'required|alpha',
            'nearest_rail_station'=>'nullable|alpha',
            'date_of_birth'=> 'required|date_format:Y-m-d|before:'.$dt,
        //     'doj'=> 'required|date_format:Y-m-d|before_or_equal:'.$dt,
        //     'dol'=> 'nullable|date_format:Y-m-d|after_or_equal:doj',
        //     'probation_start'=> 'required|date_format:Y-m-d|before_or_equal:'.$dt,
        //     'probation_end'=> 'required|date_format:Y-m-d|after_or_equal:probation_start',
        //     'designation' => 'nullable|alpha',
        //     'department_id'=>'nullable',
            'blood_group'=>'nullable',
            'dte_id'=>'nullable|alphanum|size:10',
            'mobile_no'=>'required|numeric|digits:10|unique:student,mobile_no,'.(string)$uid.',uid',
            'landline_no'=>'required|numeric|digits_between:8,15|unique:student,landline_no,'.(string)$uid.',uid',
            'permanent_address'=>'required',
            'local_address'=>'required',
            'PIN_permanent_address'=>'required|numeric|digits:6',
            'PIN_local_address'=>'required|numeric|digits:6',
            'nationality'=>'required',
            'aadhar_id'=>'required|digits:12|unique:student,aadhar_id,'.(string)$uid.',uid',
            'category'=>'required',
            'additional_category'=>'nullable|alpha',
            'mentor_id'=>'nullable|numeric|digits:3',
            'branch'=>'required',
            'father_phone_no'=>'required|numeric|digits:10|unique:student,father_phone_no,'.(string)$uid.',uid',
            'mother_phone_no'=>'required|numeric|digits:10|unique:student,mother_phone_no,'.(string)$uid.',uid'
        ]);

      
       // Create Post
        $students = Student::find($uid);
        // echo var_dump($students).'<br />';
         $students->uid=$request->input('uid');
         $students->email_id=$request->input('email_id');
         $students->secondary_email_id=$request->input('secondary_email_id');
         $students->admission_year=$request->input('admission_year');

         $students->type_of_admission=$request->input('type_of_admission');
        // $staff->short_form=$request->input('short_form');
         $students->first_name=$request->input('first_name');
         $students->middle_name=$request->input('middle_name');
         $students->last_name=$request->input('last_name');
         $students->gender=$request->input('gender');
         $students->mentor_id=$request->input('mentor_id');
         $students->nationality=$request->input('nationality');
         $students->branch=$request->input('branch');
         $students->category=$request->input('category');
         $students->additional_category=$request->input('additional_category');
         $students->dte_id=$request->input('dte_id');
         $students->blood_group=$request->input('blood_group');
        //  $students->defaulter_action_needed=$request->input('defaulter_action_needed');
         $students->nearest_rail_station=$request->input('nearest_rail_station');
          
        // $datedoj=$request->input('doj');
        // $datedoj=date("Y-m-d");
        // $staff->doj=$datedoj;
        // $staff->doj=$request->input('doj');
        
        //  $date_of_birth=$request->input('date_of_birth');
        //  echo var_dump($date_of_birth).'<br />';
        //  $date_of_birth=date("Y-m-d");
        //  echo var_dump($date_of_birth).'<br />';
        //  $students->date_of_birth=$date_of_birth; 
        $students->date_of_birth=$request->input('date_of_birth');
        $students->father_phone_no=$request->input('father_phone_no');
        $students->mother_phone_no=$request->input('mother_phone_no');
        $students->mother_name=$request->input('mother_name');
        $students->father_name=$request->input('father_name');


        // $staff->designation=$request->input('designation');
         $students->mobile_no=$request->input('mobile_no');
         $students->landline_no=$request->input('landline_no');
         $students->permanent_address=$request->input('permanent_address');
         $students->local_address=$request->input('local_address');

         $students->PIN_permanent_address=$request->input('PIN_permanent_address');
         $students->PIN_local_address=$request->input('PIN_local_address');

         $students->aadhar_id=$request->input('aadhar_id');
        
        
        $students->save();

         return redirect('/staff/update/edit')->with('success', 'Information Updated'); 
    }
}
