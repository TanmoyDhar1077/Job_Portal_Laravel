<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JobPost extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'job_title',
        'job_category',
        'company_name',
        'location',
        'job_type',
        'job_level',
        'salary_range',
        'experience_required',
        'education_level',
        'application_deadline',
        'job_description',
        'is_active',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
