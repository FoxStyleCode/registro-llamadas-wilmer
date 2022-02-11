<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Llamada extends Model
{
    use HasFactory;

    protected $fillable = 
    [
        'municipality', 'type', 'caller_name', 'reason', 'detail', 
        'call_answer', 'call_answer_by'
    ];
}
