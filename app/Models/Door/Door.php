<?php

namespace App\Models\Door;

use App\Core\Model;

class Door extends Model
{
    protected $table = 'doors';

    protected $fillable = [
        'count',
        'show_status'
    ];
}