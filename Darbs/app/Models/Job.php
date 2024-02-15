<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Rating;

class Job extends Model
{
    public function getAllJobs()
    {
        return $this->paginate(6); 
    }

    protected $fillable = [
        'user_id',
        'job_title',
        'job_description',
        'job_category',
        'job_location',
        'job_salary',
        'job_posted_date',
        'job_expiry_date',


    ];

    protected $dates = [
        'job_posted_date',
        'job_expiry_date',
    ];

    public function ratings()
    {
        return $this->hasMany(Rating::class);
    }
    


    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
