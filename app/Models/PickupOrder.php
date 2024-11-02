<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PickupOrder extends Model
{
    use HasFactory;

    protected $fillable = [
        'qr_code',
        'user_id',
        'status',
        'payment_method',
        'total_price',
        'items',
    ];
    
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
