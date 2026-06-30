<?php

use App\Models\User;
/**
 * PEST V4 PREVIEW — Smoke Testing
 * --------------------------------------------------
 * assertNoSmoke() is the all-in-one check: it asserts there are no
 * JavaScript errors AND no console logs on the page, in a single call.
 * Useful as a fast "did anything obviously break" pass over multiple
 * routes before a deploy.
 *
 * You can also call the two checks it bundles separately:
 *   assertNoJavaScriptErrors()
 *   assertNoConsoleLogs()
 *
 * Run it:
 *   ./vendor/bin/pest tests/Browser/SmokeDemoTest.php
 */

it('has no smoke on the register page', function () {
    $page = visit('/register');

    $page->assertNoSmoke();
});

it('has no JS console errors on the dashboard', function () {
    $user = User::factory()->create();
    $this->actingAs($user);

    $page = visit('/dashboard');

    $page->assertNoJavaScriptErrors();
});

/**
 * NOTE: visit() accepts an array of URLs and checks them all in one call —
 * useful for a quick sanity sweep across the routes that matter most
 * (homepage, auth pages, dashboard) rather than writing one test per route.
 *
 * The "no JS console error" half of this is most valuable on React/Vue-heavy
 * pages, since that's where uncaught JS exceptions are most likely to appear.
 * On largely Blade/Livewire pages this check will mostly just pass trivially —
 * still fine to run, just don't expect it to be the dramatic part of the demo
 * if the page being tested doesn't ship much client-side JS.
 */
