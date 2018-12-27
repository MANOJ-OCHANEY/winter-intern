<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class FacultyResearchGrants extends Model
{
    protected $table = 'faculty_research_grants';
    protected $primaryKey = 'id';
    public $timestamps = false;

    public function faculty() {
        return $this->belongsTo('App\Faculty','e_id','e_id');
    }
}
