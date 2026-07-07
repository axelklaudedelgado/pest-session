<?php

use App\Models\Post;

/**
 * EXERCISE 2 — SOLUTION
 *
 * What changed:
 *   - No class, no "extends TestCase".
 *   - No uses(RefreshDatabase::class) — tests/Pest.php already binds it
 *     globally to every it()/test() file in tests/Feature.
 *   - getJson(), postJson(), assertDatabaseHas() are UNCHANGED.
 *   - The "creates a post" test mixes styles on purpose:
 *       assertStatus() is PHPUnit-style. toBeJson() and toHaveKey() are
 *       Pest-style — toBeJson() confirms the response body is valid JSON,
 *       toHaveKey() checks a specific key + value inside it.
 *
 * 
 * Run this file while you work on it:
 *   vendor/bin/pest tests/Solutions/FeatureTest/PostControllerTest.php
 */

it('lists only published posts', function () {
    Post::factory()->create(['title' => 'Published One', 'is_published' => true]);
    Post::factory()->create(['title' => 'Draft One', 'is_published' => false]);

    $response = $this->getJson('/posts');

    $response->assertStatus(200);
    $response->assertJsonCount(1);
    $response->assertJsonFragment(['title' => 'Published One']);
});

it('creates a post with valid data', function () {
    $payload = [
        'title' => 'My First Post',
        'body'  => 'Some interesting content here.',
    ];

    $response = $this->postJson('/posts', $payload);

    // PHPUnit-style assertion
    $response->assertStatus(201);

    // Pest-style expectations, same response, same test
    expect($response->content())->toBeJson();
    expect($response->json())->toHaveKey('title', 'My First Post');

    $this->assertDatabaseHas('posts', ['title' => 'My First Post']);
});