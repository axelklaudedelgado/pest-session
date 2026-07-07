<?php

/**
 * EXERCISE 3 — Browser Test (Pest v4 preview)
 * --------------------------------------------------
 * Reference (full assertion + interaction list):
 *   https://pestphp.com/docs/browser-testing
 *
 * TASK:
 *   Write ONE test that:
 *     1. Visits the homepage ('/').
 *     2. Clicks the "Log in" link.
 *     3. Asserts the resulting path is '/login' using ->assertPathIs('[URL HERE]').
 *        (Pest waits for the navigation to finish automatically —
 *        no manual "wait for page load" step needed.)
 *
 * BONUS: Write a second test that clicks "Register" from the homepage
 * instead, and asserts the path is '/register'.
 *
 * Run this file while you work on it:
 *   vendor/bin/pest tests/Exercises/BrowserTest/HomepageTest.php
 */

it('navigates to the login page', function () {
    // Your code here
});

// BONUS
it('navigates to the register page', function () {
    // Your code here
});
