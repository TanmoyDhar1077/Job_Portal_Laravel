<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class JobView extends Model
{
    protected $fillable = [
        'job_post_id',
        'user_id',
        'ip_address',
        'user_agent'
    ];

    /**
     * Get the job post that was viewed
     */
    public function jobPost(): BelongsTo
    {
        return $this->belongsTo(JobPost::class);
    }

    /**
     * Get the user who viewed the job
     */
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
