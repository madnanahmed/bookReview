<?php

namespace App\Http\Controllers;

use App\Models\ChatMessage;
use App\Models\Book;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class ChatbotController extends Controller
{
    public function handle(Request $request)
    {
        $message = $request->input('message');
        $sessionId = Session::getId();

        // Save user message
        ChatMessage::create([
            'message' => $message,
            'is_bot' => false,
            'session_id' => $sessionId,
        ]);

        $response = $this->generateResponse($message);

        // Save bot response
        ChatMessage::create([
            'message' => $response,
            'is_bot' => true,
            'session_id' => $sessionId,
        ]);

        return response()->json([
            'response' => $response
        ]);
    }

    private function generateResponse($query)
    {
        $query = strtolower($query);

        if (str_contains($query, 'top rated')) {
            $books = Book::withAvgRating()->orderBy('reviews_avg_rating', 'desc')->take(3)->get();
            if ($books->isEmpty()) {
                return "I couldn't find any books with ratings yet. Why not be the first to review one?";
            }
            $titles = $books->pluck('title')->toArray();
            return "Our top rated books are: " . implode(', ', $titles) . ".";
        }

        if (str_contains($query, 'popular')) {
            $books = Book::withReviewsCount()->orderBy('reviews_count', 'desc')->take(3)->get();
            if ($books->isEmpty()) {
                return "We don't have many reviews yet, so popularity is still growing!";
            }
            $titles = $books->pluck('title')->toArray();
            return "The most discussed books right now are: " . implode(', ', $titles) . ".";
        }

        if (str_contains($query, 'hello') || str_contains($query, 'hi')) {
            return "Hello! How can I help you discover your next great read today?";
        }

        if (str_contains($query, 'books')) {
            $count = Book::count();
            return "We currently have $count books in our collection. You can browse them by registering or logging in!";
        }

        if (str_contains($query, 'join') || str_contains($query, 'register') || str_contains($query, 'signup')) {
            return "Joining is easy! Just click the 'Register' button at the top of the page.";
        }

        if (str_contains($query, 'admin') || str_contains($query, 'login')) {
            return "Admins can manage books and users from the dashboard. Guests can read reviews.";
        }

        return "I'm still learning! You can ask me about 'top rated' books, 'popular' books, or how to 'join'.";
    }
}
