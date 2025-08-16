<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class JobApplication extends Model
{
    protected $fillable = ['job_id', 'user_id', 'employer_id', 'applied_date'];
    public function user(){
        return $this->belongsTo(User::class);
    }

    public function employer(){
        return $this->belongsTo(User::class,'employer_id');
    }
}
