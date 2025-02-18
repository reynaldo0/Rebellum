<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ConsultationDetail extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'email',
        'phone',
        'school',
        'address',
        'category',
        'description',
        'evidence',
        'evidence_description',
        'urgency',
        'agreement',
    ];
}
