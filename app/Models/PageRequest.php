<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PageRequest extends Model
{
    protected $fillable = ['user_id', 'title', 'status'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}