#!/bin/bash

echo "Generating full dataset as specified in requirements..."
echo "This will create:"
echo "- 1,000 authors"
echo "- 3,000 categories" 
echo "- 100,000 books"
echo "- 500,000 ratings"
echo ""
echo "This may take several minutes..."

# Update the seeder to use full amounts
sed -i '' 's/Author::factory(100)/Author::factory(1000)/g' database/seeders/BookstoreSeeder.php
sed -i '' 's/Category::factory(300)/Category::factory(3000)/g' database/seeders/BookstoreSeeder.php
sed -i '' 's/Book::factory(1000)/Book::factory(100000)/g' database/seeders/BookstoreSeeder.php
sed -i '' 's/Rating::factory(5000)/Rating::factory(500000)/g' database/seeders/BookstoreSeeder.php

# Update the comments
sed -i '' 's/100 authors (for testing, can be increased to 1,000)/1,000 authors/g' database/seeders/BookstoreSeeder.php
sed -i '' 's/300 categories (for testing, can be increased to 3,000)/3,000 categories/g' database/seeders/BookstoreSeeder.php
sed -i '' 's/1,000 books (for testing, can be increased to 100,000)/100,000 books/g' database/seeders/BookstoreSeeder.php
sed -i '' 's/5,000 ratings (for testing, can be increased to 500,000)/500,000 ratings/g' database/seeders/BookstoreSeeder.php

# Run the migration and seeding
php artisan migrate:fresh --seed

echo ""
echo "Full dataset generation completed!"
echo "You can now access the application at: http://localhost:8000" 