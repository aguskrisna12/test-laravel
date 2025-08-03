<?php

namespace Database\Seeders;

use App\Models\Author;
use App\Models\Book;
use App\Models\Category;
use App\Models\Rating;
use Illuminate\Database\Seeder;

class BookstoreSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Create 100 authors (for testing, can be increased to 1,000)
        $this->command->info('Creating 1000 authors...');
        Author::factory(1000)->create();

        // Create 300 categories (for testing, can be increased to 3,000)
        $this->command->info('Creating 3000 categories...');
        Category::factory(3000)->create();

        // Create 1,000 books (for testing, can be increased to 100,000)
        $this->command->info('Creating 100,000 books...');
        Book::factory(100000)->create();

        // Create 5,000 ratings (for testing, can be increased to 500,000)
        $this->command->info('Creating 500,000 ratings...');
        Rating::factory(500000)->create();

        $this->command->info('Dataset created successfully!');
        $this->command->info('Authors: ' . Author::count());
        $this->command->info('Categories: ' . Category::count());
        $this->command->info('Books: ' . Book::count());
        $this->command->info('Ratings: ' . Rating::count());
    }
}
