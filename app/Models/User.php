<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'user_token',
        'name',
        'email',
        'phone',
        'password',
        'verified_at',
        'admin_id',
        'external_id',
        'external_auth',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }

    /**
     * Set the admin relation.
     *
     * @return 
     */
    public function admin()
    {
        return $this->belongsTo(Admin::class);
    }

    // Relationship to access the branch office through the admin
    public function branchOffice()
    {
        // We use the indirect relationship through 'admin'
        return $this->hasOneThrough(BranchOffice::class, Admin::class, 'id', 'id', 'admin_id', 'branch_id');
    }
}
