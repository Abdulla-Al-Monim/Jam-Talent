<?php

namespace App\Models\Backend;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;
    protected $fillable = [
        'order_type',
        'order_id',
        'offer_id',
        'freelancer_id',
        'employer_id',
        'budget',
        'delivery_type',
        'status',
    ];
    public function deliveryOrder(){
    	return $this->belongsTo(DelivaryOrder::class);
    }
}
