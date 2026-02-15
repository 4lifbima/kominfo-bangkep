<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Statistic extends Model
{
    use HasFactory;

    protected $fillable = [
        'label',
        'value',
        'unit', // e.g., %, orang, unit
        'year',
        'category', // e.g., Kependudukan, Pendidikan
    ];
}
