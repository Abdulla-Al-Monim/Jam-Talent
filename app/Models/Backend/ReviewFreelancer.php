<?php

namespace App\Models\Backend;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ReviewFreelancer extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id',
        'employer_id',
        'task_id',
        'task_apply_id',
    ];
    public function task(){
        return $this->belongsTo(Task::class);
    }
}
