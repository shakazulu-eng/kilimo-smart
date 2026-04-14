<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FarmerProfile extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'region',
        'district',
        'crop',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
