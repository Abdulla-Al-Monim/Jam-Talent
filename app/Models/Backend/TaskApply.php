<?php

namespace App\Models\Backend;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TaskApply extends Model
{
    use HasFactory;
    protected $fillable = [
        'task_id',
        'freelancer_id',
        'employer_id',
        'min_budget',
        'file',
        'delivery_type',
        'status',
        'delivary_time',
    ];
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
