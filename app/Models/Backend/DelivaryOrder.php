<?php

namespace App\Models\Backend;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DelivaryOrder extends Model
{
    use HasFactory;
    protected $fillable = [
        'freelancer_id',
        'employer_id',
        'order_id',
        'description',
        'file',
        'revision',
        'order_id',
        'status',
    ];
    public function reviewFreelancer(){
        return $this->belongsTo(ReviewFreelancer::class);
    }
    public function order(){
        return $this->belongsTo(Order::class,'order_id');
    }
}
