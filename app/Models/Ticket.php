<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ticket extends Model
{
    use HasFactory;

    protected $fillable = [
        'folio', 'country_code', 'user_id', 'branch_office_id', 'status', 'type', 'ticket_details', 'details', 'extra_discount', 'total_price', 'payment_method', 'qr_code'
    ];

    public function user() {
        return $this->belongsTo(User::class);
    }

    public function branchOffice() {
        return $this->belongsTo(BranchOffice::class);
    }
}
