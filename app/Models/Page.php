<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Page extends Model
{
    // These are the columns the 'create' command is allowed to touch
    protected $fillable = [
        'title',
        'slug',
        'is_default',
        'html_content',
        'css_content',
        'order_index'
    ];
}
