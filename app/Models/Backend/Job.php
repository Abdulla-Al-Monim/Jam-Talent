<?php

namespace App\Models\Backend;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Job extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id',
        'job_title',
        'location',
        'job_type',
        'job_category',
        'min_salary',
        'max_salary',
        'description',
    ];
    
}
