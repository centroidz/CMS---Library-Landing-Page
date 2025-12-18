<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class LandingPage extends Model
{
    protected $fillable = [
        'template',
        'title',
        'description',
        'button',
        'image',
        'mission',
        'vision',
        'goals',
        'related_links'
    ];

    protected $casts = [
        'related_links' => 'array'
    ];

}
