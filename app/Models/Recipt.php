<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Recipt extends Model
{
    use HasFactory;
    protected $fillable = [
        'reason', 'content','staff_note', 'price', 'status',
    ];
}
