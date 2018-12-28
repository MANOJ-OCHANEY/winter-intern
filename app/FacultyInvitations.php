<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class FacultyInvitations extends Model
{
    protected $table = 'invitation';
    protected $primaryKey = 'id';
    public $timestamps = 'false';

    public function faculty() {
        return $this->belongsTo('App\Faculty','e_id','e_id');
    }
}
