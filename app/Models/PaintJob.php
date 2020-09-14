<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class PaintJob extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $fillable = [
        'plate_no',
        'current_color',
        'target_color',
        'is_done',
    ];

    protected $dates = ['deleted_at'];
    
}
