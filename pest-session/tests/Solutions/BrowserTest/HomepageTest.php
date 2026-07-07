<?php

/**
 * EXERCISE 3 — SOLUTION
 *
 * What changed:
 *   - click('Log in') finds the link by its visible text and clicks it —
 *     no CSS selector needed for simple, uniquely-labeled links.
 *   - Pest waits for the resulting navigation to finish before the next
 *     assertion runs, so there's no manual "wait" step.
 *   - assertPathIs() checks the browser's current URL path, the browser
 *     equivalent of assertRedirect() in a normal HTTP feature test.
 *
 * Run it:
 *   vendor/bin/pest tests/Solutions/BrowserTest/HomepageTest.php
 * Or run it headed:
 *   vendor/bin/pest --headed tests/Solutions/BrowserTest/HomepageTest.php
 */

it('navigates to the login page', function () {
    $page = visit('/');

    $page->click('Log in')
        ->assertPathIs('/login');
});

// BONUS
it('navigates to the register page', function () {
    $page = visit('/');

    $page->click('Register')
        ->assertPathIs('/register');
});
