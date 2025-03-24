<?php

use App\Models\Book;
use App\Models\Review;
use App\Models\User;
use function Pest\Laravel\{postJson, getJson, putJson, deleteJson};

beforeEach(function () {
    $this->user = User::factory()->create();
    $this->book = Book::factory()->create([
        'user_id' => $this->user->id,
    ]);
});

test('Criação de uma avaliação', function () {
    $response = postJson('/api/reviews', [
        'rating' => 5,
        'review' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit.',
        'user_id' => $this->user->id,
        'book_id' => $this->book->id,
    ]);

    $response->assertStatus(201)->assertJsonStructure([
        'id', 'rating', 'review', 'user_id', 'book_id'
    ]);
});
