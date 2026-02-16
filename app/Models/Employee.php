<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'nip',
        'position',
        'type', // PNS, PPPK, Honorer
        'status', // active, inactive
        'avatar',
        'education_history',
        'job_history',
        'social_media',
    ];

    protected $casts = [
        'education_history' => 'array',
        'job_history' => 'array',
        'social_media' => 'array',
    ];
}
