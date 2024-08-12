<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class Gallery extends Model
{
    use HasFactory;

    protected $table = 'gallery';

    protected $fillable = [
        'title',
        'photos',
    ];

    protected $casts = [
        'photos' => 'array',
    ];

    public function getFormattedUpdatedAtAttribute()
    {
        return Carbon::parse($this->updated_at)->isoFormat('dddd D [de] MMMM [del] YYYY [a las] h:mm A');
    }
}
