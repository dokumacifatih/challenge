<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FiniteStateMachine extends Model
{
    use HasFactory;
    
    const S = [
        0 => [
            0 => 0,
            1 => 1
        ],
        1 => [
            0 => 2,
            1 => 0
        ],
        2 => [
            0 => 1,
            1 => 2
        ],
    ];
}
