<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class FacultyPaperPublication extends Model
{
    protected $table = 'faculty_paper_publications';
    protected $primaryKey = 'id';
    public $timestamps = false;

    public function faculty() {
        return $this->belongsTo('App\Faculty','e_id','e_id');
    }
}
