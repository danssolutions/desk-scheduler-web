<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
class Post extends Model
{
    use HasFactory;
    protected $table="posts";
protected $primaryKey="id";
    protected $fillable = [
        'name',
        'tables',
        'height',
        'time_from',
        'time_to',
        'week_start',
        'week_end',
        'alarm_sound',
    ];

    protected $casts = [
        'tables' => 'array', 
    ];
    
}
