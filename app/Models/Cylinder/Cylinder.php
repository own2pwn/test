<?php

namespace App\Models\Cylinder;

use App\Core\Model;

class Cylinder extends Model
{
    protected $table = 'cylinders';

    protected $fillable = [
        'count',
        'show_status'
    ];
}