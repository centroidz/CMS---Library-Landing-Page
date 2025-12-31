<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Testimonial extends Model
{
    use HasFactory;

    // This allows these fields to be saved to the database
    protected $fillable = [
        'user_id', 
        'content', 
        'rating'
    ];

    // Link back to the user
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}