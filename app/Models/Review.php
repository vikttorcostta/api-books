<?php

namespace App\Models;

use App\Enums\Rate;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Validation\Rules\Enum;

class Review extends Model
{
    use HasFactory;

    protected $fillable = ['rating', 'review'];

    protected $casts = [
        'rating' => Rate::class,
    ];

    public function books(){
        return $this->belongsTo(Book::class);
    }

    public function user(){
        return $this->belongsTo(User::class);
    }
}
