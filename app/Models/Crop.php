<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Crop extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'min_temp',
        'max_temp',
        'min_rain',
        'max_rain'
    ];

    public function regions()
    {
        return $this->hasMany(CropRegion::class);
    }
}

