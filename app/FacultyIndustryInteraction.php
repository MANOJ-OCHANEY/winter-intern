<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class FacultyIndustryInteraction extends Model
{
    protected $table = 'industry_interaction';
    protected $primaryKey = 'id';
    public $timestamps = 'false';

    public function faculty() {
        return $this->belongsTo('App\Faculty','e_id','e_id');
    }
}
