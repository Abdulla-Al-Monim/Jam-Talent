<?php

namespace App\Models\Backend;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    use HasFactory;
    protected $fillable = [
        'employer_id',
        'freelancer_id',
        'task_name',
        'category_name',
        'location',
        'budget_type',
        'delivery_time',
        'min_budget',
        'max_budget',
        'description',
        'file',
        'status',
    ];
    public function taskApplies(){
        return $this->hasMany(TaskApply::class);
    }
    public function delivaryOrder(){
        return $this->belongsTo(DelivaryOrder::class);
    }
    public function reviewEmployer(){
        return $this->belongsTo(ReviewEmployer::class);
    }
    public function reviewFreelancer(){
        return $this->belongsTo(ReviewFreelancer::class);
    }
}
