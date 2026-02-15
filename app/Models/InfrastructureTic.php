<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class InfrastructureTic extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'type', // Tower, Server, Fiber Optic
        'location',
        'status', // Active, Maintenance, Down
        'capacity',
    ];
}
