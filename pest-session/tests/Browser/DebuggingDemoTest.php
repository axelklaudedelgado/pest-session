<?php

use App\Models\User;
/**
 * PEST V4 PREVIEW — Debugging Tests
 * --------------------------------------------------
 * Two helpers for figuring out why a browser test is failing.
 * Both are temporary — add while diagnosing, remove before committing.
 *
 *   ->debug()   Pauses execution and opens an inspectable browser view
 *               at that exact point in the test.
 *
 *   ->tinker()  Opens a live Tinker REPL mid-test with the page in scope.
 *
 * You can also trigger debug mode from the CLI without editing the file:
 *   vendor/bin/pest --debug
 *   vendor/bin/pest --headed
 *
 * Run it (->debug() will pause and open a browser window):
 *   vendor/bin/pest tests/Browser/DebuggingDemoTest.php
 */
it('shows validation errors when the name is empty', function () {
    $user = User::factory()->create(['name' => 'Sey']);

    $this->actingAs($user);

    $page = visit('/settings/profile');

    $page->clear('name')
        ->click('Save')
        ->debug()           // <-- pauses here, opens inspectable browser view
        // ->tinker()          // <-- drops you into a Tinker shell
        ->assertSee('Profile updated.');
});

/**
 * To try ->tinker() instead, swap ->debug() for ->tinker() above and run again.
 * It drops you into a Tinker shell with context of the page in scope.
 */
