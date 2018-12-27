<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class FacultyInvitations extends Model
{
    protected $table = 'faculty_invitations';
    protected $primaryKey = 'id';
    public $timestamps = false;

    public function faculty() {
        return $this->belongsTo('App\Faculty','e_id','e_id');
    }
}
