<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ChartModel extends Model
{
    protected $fillable = ['desk_id', 'height', 'time'];
}