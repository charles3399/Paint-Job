<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PaintJob extends Model
{
    use HasFactory;

    protected $fillable = [
        'plate_no',
        'current_color',
        'target_color',
    ];
    
}
