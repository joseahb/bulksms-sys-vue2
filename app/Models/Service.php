<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    use HasFactory;

    Protected $fillable = [
        'name', 'rate'
    ];
    Protected $casts = [
        'rate' => 'int',
    ];
}
