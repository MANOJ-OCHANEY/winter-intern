<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Faculty extends Model
{
    //table name
    protected $table = 'staff';

    //Primary Key

    protected $primaryKey = 'e_id';
    //Timestamp
    public $timestamps =false;

    //Relation
    public function dept_log(){
        return $this->hasMany('App\Dept_log', 'e_id');
    }

    //Relation
    public function design_log(){
        return $this->hasMany('App\Design_log', 'e_id');
    }


    //Relation
    public function qual_log(){
        return $this->hasMany('App\Qual_log', 'e_id');
    }

    //Relation
    public function shift_log(){
        return $this->hasMany('App\Shift_log', 'e_id');
    }

    //Relation
    public function type_log(){
        return $this->hasMany('App\Type_log', 'e_id');
    }

    //Relation
    public function non_teaching_staff(){
        return $this->hasOne('App\Non_teaching_staff', 'e_id');
    }

    //Relation
    public function teaching_staff(){
        return $this->hasOne('App\Teaching_staff', 'e_id');
    }

    protected function comments()
    {
        return $this->hasMany('App\Comment','e_id');
    }

    public function paper_publications() {
        return $this->hasMany('App\FacultyPaperPublication','e_id','e_id');
    }
    
    public function courses() {
        return $this->hasMany('App\FacultyCourses','e_id','e_id');
    }

    public function patents() {
        return $this->hasMany('App\FacultyPatents','e_id','e_id');
    }

    public function activities() {
        return $this->hasMany('App\FacultyActivities','e_id','e_id');
    }

    public function research_grants() {
        return $this->hasMany('App\FacultyResearchGrants','e_id','e_id');
    }
    
    public function industry_interactions() {
        return $this->hasMany('App\FacultyIndustryInteraction','e_id','e_id');
    }
    
    public function invitations() {
        return $this->hasMany('App\FacultyInvitations','e_id','e_id');
    }
}
