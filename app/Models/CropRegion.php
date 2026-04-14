<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CropRegion extends Model
{
    use HasFactory;

    protected $table = 'crop_regions'; // jina la table
    public $timestamps = false;

    protected $fillable = [
        'crop_id',
        'region'
    ];

    public function crop()
    {
        return $this->belongsTo(Crop::class);
    }
}
