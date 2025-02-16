<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Quiz extends Model
{
    use HasFactory;

    protected $fillable = [
        'question',
        'option_a',
        'option_b',
        'option_c',
        'option_d',
        'correct_answer',
        'score',
        'category_id',
    ];

    /**
     * Relasi One-to-Many dengan Score.
     * Satu Quiz bisa memiliki banyak Score.
     */
    public function scores()
    {
        return $this->hasMany(Score::class);
    }
    public function category()
    {
        return $this->belongsTo(Category::class);
    }
}
