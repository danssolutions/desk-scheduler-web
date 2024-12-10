<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
class Post extends Model
{
    use HasFactory;
    protected $table = "posts";
    protected $primaryKey = "id";
    protected $fillable = [
        'name',
        'desk_id',
        'height',
        'time_from',
        'days',
        'alarm_sound',
    ];

    protected $casts = [
        'desk_id' => 'string',
        'days' => 'string',
    ];

}
