<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class StudentAllotment extends Model
{
    protected $table = 'student_allotment';
    protected $primaryKey = 'student_allotment_id';

    protected $fillable = array('division','roll_no','batch','status','date');
    public $timestamps = false;

    // public function students() {
    //     return $this->hasMany('App\Student');
    // }
}
