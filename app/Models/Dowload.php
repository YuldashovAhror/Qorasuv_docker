<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Dowload extends Model
{
    use HasFactory;

    protected $fillable = [
        'photo',
        'name_uz',
        'name_ru',
        'name_en',
    ];
}
