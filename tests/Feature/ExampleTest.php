<?php

namespace Tests\Feature;

// use Illuminate\Foundation\Testing\RefreshDatabase;
use App\Models\Book;
use Tests\TestCase;

class ExampleTest extends TestCase
{
    /**
     * A basic test example.
     */
    /*    public function test_the_application_returns_a_successful_response(): void
        {
            $this->markTestSkipped('Skipping this test');
            $response = $this->get('/');
            $response->assertStatus(200);
        }

        public function check_home_page_content()
        {
            $this->markTestSkipped('Skipping this test');
            $test = $this->get('/books');
            $test->assertSee('Books');
            $test->assertStatus(200);
        }*/

    public function test_book_page_have_book_title()
    {
        // First, get a book from the database
        $book = Book::with('reviews')
            ->withReviewsCount()
            ->first();

        $response = $this->get('/books');
    }
}
