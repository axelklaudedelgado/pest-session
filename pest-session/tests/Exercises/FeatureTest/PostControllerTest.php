<?php

namespace Tests\Exercises\FeatureTest;

use App\Models\Post;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

/**
 * EXERCISE 2 — Laravel Feature Test Translation
 * --------------------------------------------------
 * Convert this PHPUnit feature test into Pest syntax.
 *
 * TASKS:
 *   1. Remove the class declaration and "extends TestCase".
 *   2. Drop the "use RefreshDatabase" trait entirely. tests/Pest.php already
 *      binds RefreshDatabase globally for every it()/test() file in
 *      tests/Feature (see the Setup slide) — no uses() call needed here.
 *   3. Convert test_it_lists_only_published_posts() and
 *      test_it_creates_a_post_with_valid_data() to it('...', function () { ... }).
 *   4. In the "creates a post" test, mix styles on purpose:
 *        - keep $response->assertStatus(201)               (PHPUnit-style)
 *        - add  expect($response->content())->toBeJson()   (Pest-style)
 *        - add  expect($response->json())
 *                 ->toHaveKey('title', 'My First Post')     (Pest-style)
 *      Pest lets both live in the same test — use whichever reads best
 *      for a given line. Docs for these two expectations:
 *        https://pestphp.com/docs/expectations#expect-toBeJson
 *        https://pestphp.com/docs/expectations#content-tohavekeystring-key
 *   5. Note: getJson(), postJson(), assertDatabaseHas() — completely
 *      unchanged either way. Pest doesn't reinvent Laravel's HTTP
 *      testing helpers, it just removes the class/method ceremony
 *      around them.
 *
 * 
 * Run this file while you work on it:
 *   vendor/bin/pest tests/Exercises/FeatureTest/PostControllerTest.php
 */
class PostControllerTest extends TestCase
{
    use RefreshDatabase;

    public function test_it_lists_only_published_posts(): void
    {
        Post::factory()->create(['title' => 'Published One', 'is_published' => true]);
        Post::factory()->create(['title' => 'Draft One', 'is_published' => false]);

        $response = $this->getJson('/posts');

        $response->assertStatus(200);
        $response->assertJsonCount(1);
        $response->assertJsonFragment(['title' => 'Published One']);
    }

    public function test_it_creates_a_post_with_valid_data(): void
    {
        $payload = [
            'title' => 'My First Post',
            'body'  => 'Some interesting content here.',
        ];

        $response = $this->postJson('/posts', $payload);

        $response->assertStatus(201);
        $this->assertDatabaseHas('posts', ['title' => 'My First Post']);
    }
}
