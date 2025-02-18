<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Consultation extends Model
{
    use HasFactory;

    // Allow mass assignment for the fields
    protected $fillable = [
        'name',
        'email',
        'phone',
        'location',
        'message',
        'forms', 
    ];
}
