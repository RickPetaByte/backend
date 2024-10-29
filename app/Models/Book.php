<?php

namespace App\Models;

// use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    /** @use HasFactory<\Database\Factories\BookFactory> */
    // use HasFactory;

    protected $fillable = [
        'book_title',
        'book_author',
        'publication_year',
        'genres',
    ];

    protected $casts = [
        'genres' => 'string'
    ];
}