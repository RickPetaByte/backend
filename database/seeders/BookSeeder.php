<?php

namespace Database\Seeders;

use App\Models\Book;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class BookSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //

        Book::factory()->create([
            "book_title" => "Een test",
            "book_author" => "Rick",
            "publication_year" => "2001",
            "genres" => "Thriller",
        ]);
    }
}
