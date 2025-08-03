# Bookstore Management System

A Laravel-based web application for managing a bookstore with book ratings and popularity tracking.

## Features

### 1. Books List with Filter
- Displays books ordered by average rating (highest to lowest)
- Filter by number of items per page (10, 20, 30, ..., 100)
- Search functionality for book names and author names
- Pagination support

### 2. Top 10 Most Famous Authors
- Shows authors ordered by voter count
- Only includes voters with ratings greater than 5
- Displays author name and total voter count

### 3. Book Rating System
- Dropdown selection for authors
- Dynamic book selection based on chosen author
- Rating scale from 1 to 10
- Form validation and success feedback

## Technical Requirements

- **Framework:** Laravel 12.0+
- **PHP Version:** 8.2+
- **Database:** MySQL
- **Data Generation:** Faker library for fake data

## Database Structure

- **Authors:** 100 fake authors (can be increased to 1,000)
- **Categories:** 300 fake categories (can be increased to 3,000)
- **Books:** 1,000 fake books (can be increased to 100,000)
- **Ratings:** 5,000 fake ratings (can be increased to 500,000)

## Installation

1. Clone the repository
2. Install dependencies: `composer install`
3. Copy `.env.example` to `.env` and configure database
4. Generate application key: `php artisan key:generate`
5. Run migrations: `php artisan migrate`
6. Seed the database: `php artisan db:seed`
7. Start the server: `php artisan serve`

## Usage

- **Home Page:** `/` - Books list with filtering
- **Top Authors:** `/top-authors` - Top 10 most famous authors
- **Rate Books:** `/rate` - Submit book ratings

## Notes

- No caching is used as per requirements
- All data is generated using Faker for demonstration
- The system is designed to handle large datasets efficiently
