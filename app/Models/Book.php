<?php

namespace App\Models;

use App\Enums\StatusBook;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    use HasFactory;

    protected $fillable = ['title', 'cover', 'author', 'publisher', 'publication_year', 'isbn', 'status'];

    protected $casts = [
        'status' => StatusBook::class,
    ];
    protected $appends = ['cover_url'];

    public function getCoverUrlAttribute(){
        return $this->cover ? asset('storage/' . $this->cover) : null;
    }

    public function users(){
        return $this->belongsToMany(User::class);
    }

    public function categories(){
        return $this->belongsToMany(Category::class);
    }

    public function reviews(){
        return $this->hasMany(Review::class);
    }

}
