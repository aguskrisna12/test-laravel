<?php

namespace App\Console\Commands;

use App\Models\Author;
use App\Models\Book;
use App\Models\Category;
use App\Models\Rating;
use Illuminate\Console\Command;

class GenerateFullDataset extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'generate:full-dataset';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Generate the full dataset as specified in requirements: 1,000 authors, 3,000 categories, 100,000 books, 500,000 ratings';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $this->info('Starting to generate full dataset...');

        // Clear existing data
        $this->info('Clearing existing data...');
        Rating::truncate();
        Book::truncate();
        Category::truncate();
        Author::truncate();

        // Generate 1,000 authors
        $this->info('Generating 1,000 authors...');
        Author::factory(1000)->create();

        // Generate 3,000 categories
        $this->info('Generating 3,000 categories...');
        Category::factory(3000)->create();

        // Generate 100,000 books
        $this->info('Generating 100,000 books...');
        Book::factory(100000)->create();

        // Generate 500,000 ratings
        $this->info('Generating 500,000 ratings...');
        Rating::factory(500000)->create();

        $this->info('Full dataset generated successfully!');
        $this->info('Authors: ' . Author::count());
        $this->info('Categories: ' . Category::count());
        $this->info('Books: ' . Book::count());
        $this->info('Ratings: ' . Rating::count());
    }
}
