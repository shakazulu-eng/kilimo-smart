<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AttackLog extends Model
{
    protected $fillable = [
        'attack_type',
        'payload',
        'ip_address',
        'url',
    ];
}
