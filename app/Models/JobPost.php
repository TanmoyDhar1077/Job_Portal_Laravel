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
        'views',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function applications()
    {
        return $this->hasMany(Application::class);
    }

    /**
     * Get the views for this job post
     */
    public function jobViews()
    {
        return $this->hasMany(JobView::class);
    }

    /**
     * Increment the view count for this job post
     * Also tracks individual views to prevent duplicate counting
     */
    public function incrementViews($userId = null, $ipAddress = null, $userAgent = null)
    {
        // Try to create a new view record
        $viewData = [
            'job_post_id' => $this->id,
            'user_id' => $userId,
            'ip_address' => $ipAddress,
            'user_agent' => $userAgent,
        ];

        // For logged-in users, prevent duplicate views
        if ($userId) {
            $existing = JobView::where('job_post_id', $this->id)
                               ->where('user_id', $userId)
                               ->exists();
            
            if (!$existing) {
                JobView::create($viewData);
                $this->increment('views');
            }
        } else {
            // For anonymous users, allow views but try to prevent duplicate from same IP
            $recentView = JobView::where('job_post_id', $this->id)
                                 ->where('ip_address', $ipAddress)
                                 ->where('created_at', '>', now()->subHours(24))
                                 ->exists();
            
            if (!$recentView) {
                JobView::create($viewData);
                $this->increment('views');
            }
        }
    }

}