<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Work extends Model
{
    protected $fillable = [
        'name',
        'description',
        'user_id',
        'image'
    ];
}
