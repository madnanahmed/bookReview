<?php

namespace Database\Seeders;

use App\Models\Book;
use App\Models\Review;
use Illuminate\Database\Seeder;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        /*User::factory(1)->create([
            'email' => 'admin@gmail.com',
            'is_admin' => true,
        ]);*/

        // good review
        Book::factory(33)->create()->each(function ($book) {
            $numReviews = rand(5, 30);
            Review::factory($numReviews)
                ->good()
                ->for($book) // Associate each review with the current book relationship
                ->create();
        });
        // average review
        Book::factory(33)->create()->each(function ($book) {
            $numReviews = rand(5, 30);
            Review::factory($numReviews)
                ->average()
                ->for($book) // Associate each review with the current book relationship
                ->create();
        });
        // bad review
        Book::factory(34)->create()->each(function ($book) {
            $numReviews = rand(5, 30);
            Review::factory($numReviews)
                ->bad()
                ->for($book) // Associate each review with the current book relationship
                ->create();
        });


        // User::factory(10)->create();

        /*User::factory()->create([
            'name' => 'Test User',
            'email' => 'test@example.com',
        ]);*/
    }
}
