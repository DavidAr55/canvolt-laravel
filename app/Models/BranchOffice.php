<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BranchOffice extends Model
{
    use HasFactory;

    protected $fillable = [
        'name', 'address', 'phone', 'email', 'image', 'status', 'schedule', 'latitude', 'longitude'
    ];

    public function tickets() {
        return $this->hasMany(Ticket::class);
    }

    public function admins() {
        return $this->hasMany(Admin::class);
    }
}
