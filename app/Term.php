<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Term extends Model
{
    protected $table = "term";
    protected $primaryKey = "term_id";
    public $timestamps =false;

    public function students() {
        return $this->belongsToMany('App\Student','student_allotment','term_id','uid');
    }
}
