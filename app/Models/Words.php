<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Words extends Model
{
    use HasFactory;

    protected $fillable = [
        'key',
        'word_ru',
        'word_uz',
        'word_en',
    ];
}
