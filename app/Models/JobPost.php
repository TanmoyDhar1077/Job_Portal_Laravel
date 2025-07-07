<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class JobPost extends Model
{
    protected $fillable = [
        'job_title',
        'job_description',
        'salary_range',
        'company_name',
        'location',
        'job_type',
        'job_level',
        'experience_required',
        'education_level',
        'application_deadline',
        'is_active',
    ];
}
