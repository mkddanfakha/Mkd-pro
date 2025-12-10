<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    protected $fillable = [
        'title',
        'client',
        'description',
        'features',
        'image',
        'order',
    ];

    protected $casts = [
        'features' => 'array',
        'order' => 'integer',
    ];
}
