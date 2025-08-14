<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Job extends Model
{
    use HasFactory;
    public function jobType()
    {
        return $this->belongsTo(JobType::class, 'job_type_id');
    }
    public function category()
    {
        return $this->belongsTo(Category::class, 'job_type_id');
    }
}