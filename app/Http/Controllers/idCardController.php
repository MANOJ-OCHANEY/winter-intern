<?php

namespace App\Http\Controllers;
use Carbon\Carbon;
use App\IdCard;
use App\Faculty;
use Illuminate\Http\Request;
use App\Http\Resources\Article as ArticleResource;   
use Illuminate\Support\Facades\Input;
use Illuminate\Validation\Rule;


class idCardController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if(session('e_id')){
            return view('faculty.pages.addIdDetails');
        }
        else {
            return redirect()->back()->with('error','Unauthorised Access');
        }
    }

    public function takeApplicationId()
    {
        return view('faculty.pages.takeApplicationId');
    }

    public function verifyApplicationId(Request $request) {
        $this->validate($request, [
            'mobile_no'=>'required|numeric|digits:10',
            'application_id'=>'required|numeric',
        ]);

        $student = IdCard::where(['application_id'=>$request->application_id,'mobile_no'=>$request->mobile_no])->first();

        if(isset($student)){
            if($student->flag == 1){
                // return view('faculty.pages.editIdDetails')->with('student', $student)->with('application_id', $request->application_id);
                return redirect('/staff/editIdDetails/'.$student->application_id);
            }
            else{
                return redirect()->back()->with('error','You are not allowed to edit the form.Contact concerned ID Card Incharge.');     
            }
            
        }
        else{
            return redirect()->back()->with('error','Invalid Application ID or Mobile No.'); 
        }
    }

    public function verifyIdDetails()
    {
        $students = IdCard::where('flag','=',0)->get();
        $applications_count = IdCard::where('flag','=',0)->count();
        // return $students;
        return view('faculty.pages.verifyIdDetails')->with('students',$students)->with('applications_count',$applications_count);
    }

    public function reverted($application_id)
    {
        // echo "reverted for editing";
        $student = IdCard::find($application_id);
        $student->flag = 1;
        $student->save();
        return redirect()->back()->with('success','Form reverted for Editing.');
    }
    
    public function forwarded($application_id)
    {
        // echo "Forwarded for printing";
        $student = IdCard::find($application_id);
        $student->flag = 2;
        $student->save();
        return redirect()->back()->with('success','Form forwarded for Printing.');
    }



    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $dt=Carbon::now()->format('Y-m-d');
        $arr = explode("-",$dt);
        $arr[0] = (string)((int)$arr[0] - 16);
        $dt =implode ( "-" , $arr );
        // return $dt;
        $yr=Carbon::now()->format('Y');
        $this->validate($request, [
            'user_photo' => 'required|nullable|max:1999',
            'email_id'=>'required|email',
            'mobile_no'=>'required|numeric|digits:10|unique:idcard',
            'residential_address'=>'required',
            'course'=>'required|regex:/^[A-Z. ]/i',
            'blood_group'=>'required',
            'date_of_birth'=> 'required|date_format:Y-m-d|before:'.$dt,
            'last_name'=>'required|alpha',
            'middle_name'=>'nullable|alpha',
            'first_name'=>'required|alpha',
            // 'admission_year'=>'required|numeric|digits:4',
            'admission_year' => ['required', Rule::in([$yr]),],
         
            // 'dte_id'=>'required|alpha_num|size:10',
        ]);
        
        if(isset($request->user_photo)){
            // Get filename with the extension
            $filenameWithExt = $request->file('user_photo')->getClientOriginalName();
            // Get just filename
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
            // Get just ext
            $extension = $request->file('user_photo')->getClientOriginalExtension();
            // Filename to store
            $fileNameToStore= $filename.'_'.time().'.'.$extension;
            // Upload Image
            // $fileNameToStore= $request->user_photo;
            $path = $request->file('user_photo')->storeAs('public/student_idcard_photo', $fileNameToStore);
        } else {
            $fileNameToStore =null;
        }
        
        
        
        $students = new IdCard;
        $students->email_id=$request->input('email_id');
        $students->admission_year=$request->input('admission_year');
        $students->first_name=$request->input('first_name');
        $students->middle_name=$request->input('middle_name');
        $students->last_name=$request->input('last_name');
        $students->full_name=$request->input('full_name');
        $students->course=strtoupper($request->input('course'));
        // $dte_id=strtoupper($request->input('dte_id'));
        // $students->dte_id=$dte_id;
        // return $students->dte_id;
        // return $students->dte_id;
        $students->blood_group=$request->input('blood_group');
        // return $students->blood_group;
        $date_of_birth=$request->input('date_of_birth');
        $datedob=date("Y-m-d");
        $students->date_of_birth=$datedob; 
        $students->date_of_birth=$request->input('date_of_birth');
        $students->mobile_no=$request->input('mobile_no');
        $students->landline_no=$request->input('landline_no');
        $students->residential_address=$request->input('residential_address');
        // echo $fileNameToStore;
        $students->photo=$fileNameToStore;
        $students->save();
        // $student = IdCard::find($dte_id);
        // return $students;
        // $application_id = IDCard::find('application_id');
        // return $students->application_id;
        // return $student->toJson();

        // return redirect('/staff/idView/'.$application_id)->with('success', 'Data added');
        return redirect('/staff/idView/'.$students->application_id)->with('success', 'Data added'); 
        // return redirect('/staff/idView/'.$dte_id)->with('success', 'Data added'); 
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    
    public function show($application_id)
    {
        if(session('e_id')){
            // $students = IdCard::where('dte_id','=',$dte_id)->get();
            $student = IdCard::where('application_id','=',$application_id)->first();
            $student->mobile_no = implode('/',[$student->mobile_no,$student->landline_no]);
            // return $student->landline_no;
            // $students = IdCard::get();
            // return $students;
            // $students = IdCard::all()->where('flag','=','0');
            $admissionTillYear = ((int)($student->admission_year)+1)%100;
            $student->admission_year = implode('-',[$student->admission_year,$admissionTillYear]);
            return view('faculty.pages.idView')->with('student',$student)->with('application_id',$application_id);
        }
        else{
            //
        }
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($application_id)
    {
        // return $dte_id;
        $student = IdCard::where('application_id','=',$application_id)->first();
        // return $student;

        return view('faculty.pages.editIdDetails')->with('student', $student)->with('application_id', $application_id);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $dt=Carbon::now()->format('Y-m-d');
        //  echo var_dump($dt).'<br />';
        $dt=Carbon::now()->format('Y-m-d');
        $arr = explode("-",$dt);
        $arr[0] = (string)((int)$arr[0] - 16);
        $dt =implode ( "-" , $arr );
        // return $dt;
        $yr=Carbon::now()->format('Y');
        $application_id = $request->input('application_id');
        $this->validate($request, [
            'user_photo' => 'nullable|max:1999',
            'email_id'=>'required|email',
            // 'landline_no'=>'numeric|digits:11',
            'mobile_no'=>'required|numeric|digits:10|unique:idcard,mobile_no,'.(string)$application_id.',application_id',
            'residential_address'=>'required',
            // 'course'=>'required|regex:/^[A-Z. ]/i',
            'blood_group'=>'required',
            'date_of_birth'=> 'required|date_format:Y-m-d|before:'.$dt,
            'last_name'=>'required|alpha',
            'middle_name'=>'nullable|alpha',
            'first_name'=>'required|alpha', 
            // 'admission_year'=>'required|numeric|digits:4',
            'admission_year' => ['required', Rule::in([$yr]),],
         
            // 'dte_id'=>'required|alpha_num|size:10',
        ]);
        
        if(isset($request->user_photo)){
            // Get filename with the extension
            $filenameWithExt = $request->file('user_photo')->getClientOriginalName();
            // Get just filename
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
            // Get just ext
            $extension = $request->file('user_photo')->getClientOriginalExtension();
            // Filename to store
            $fileNameToStore= $filename.'_'.time().'.'.$extension;
            // Upload Image
            // $fileNameToStore= $request->user_photo;
            $path = $request->file('user_photo')->storeAs('public/student_idcard_photo', $fileNameToStore);
        } else {
            // $student = IdCard::where('application_id','=',$application_id)->first();
            // if(isset($student->photo)){
            //     return $student->photo;
            //     $fileNameToStore=$student->photo;
            // }
            $fileNameToStore =null;
        }

    

        $student = IdCard::find($application_id);
        // return $student;
        $student->email_id=$request->input('email_id');
        $student->admission_year=$request->input('admission_year');
        // $admissionTillYear = ((int)($student->admission_year)+1)%100;
        // $student->admission_year = implode('-',array($student->admission_year,$admissionTillYear));
        $student->first_name=$request->input('first_name');
        $student->middle_name=$request->input('middle_name');
        $student->last_name=$request->input('last_name');
        $student->full_name=$request->input('full_name');
        $student->course=strtoupper($request->input('course'));
        // $student->dte_id=strtoupper($request->input('dte_id'));
        // return $student->dte_id;
        $student->blood_group=$request->input('blood_group');
        // return $student->blood_group;
        $date_of_birth=$request->input('date_of_birth');
        $datedob=date("Y-m-d");
        $student->date_of_birth=$datedob; 
        $student->date_of_birth=$request->input('date_of_birth');
        $student->mobile_no=$request->input('mobile_no');
        $student->landline_no=$request->input('landline_no');
        $student->residential_address=$request->input('residential_address');
        // echo $fileNameToStore;
        // return isset($request->user_photo);
        if(isset($fileNameToStore)){
            $student->photo=$fileNameToStore;
            }

           $student->flag = 0; 
            
            // return $student;
            $student->save();
            // return $request->user_photo;

        // return view('faculty.pages.idView')->with('students',$students)->with('dte_id',$dte_id);
        //  return redirect('/staff/')->with('success', 'Information Updated'); 
        return redirect('/staff/idView/'.$student->application_id)->with('success', 'Data Updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    // public function showfaculty($eid) {
    //     return Faculty::find($eid);
    // }

    public function idsToPrint($orientation) {
        $students = IdCard::where('flag','=',2)->get();
        $students_count = IdCard::where('flag','=',2)->count();
        return view('faculty.pages.idsToPrint')->with('students',$students)->with('students_count',$students_count)->with('orientation',$orientation);
    }

    // public function webcamImage() {
    //     return view('faculty.pages.webcamUpload');
    // }

    public function webcamImage(Request $request)
    {
        return view('faculty.pages.webcamUpload');  
        $requestData = $request->all();
 
            if (! empty ( $_POST[ 'photos' ])) {
                  $encoded_data = $_POST['namafoto'];
                    $binary_data = base64_decode( $encoded_data );
 
                    // save to server (beware of permissions // set ke 775 atau 777)
                    $namafoto = uniqid().".png";
                    $result = file_put_contents( 'photos/shares/'.$namafoto, $binary_data );
                    if (!$result) die("Could not save image!  Check file permissions.");
                }
        $Frontapp = new Frontapp;
        $Frontapp->photos = $photos ;
        $Frontapp->save();
 
        return redirect('edit');
    }
}