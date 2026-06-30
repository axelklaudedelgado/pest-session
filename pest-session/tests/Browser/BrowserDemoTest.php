<?php

use App\Models\User;
use Illuminate\Support\Facades\Notification;
use Illuminate\Auth\Notifications\ResetPassword;

/**
 * PEST V4 PREVIEW — Browser Testing
 * --------------------------------------------------
 * This is a real browser test using Playwright under the hood, driven by
 * Pest's visit() helper. It opens an actual browser, navigates to the
 * login page, fills the form, and asserts on the rendered result —
 * not just a simulated HTTP response.
 *
 * Run it headed so you can watch the browser actually do this:
 *   ./vendor/bin/pest --headed tests/Browser/BrowserDemoTest.php
 *
 * Run it normally (headless, faster) to just see pass/fail:
 *   ./vendor/bin/pest tests/Browser/BrowserDemoTest.php
 */

it('can login', function () {
    $user = User::factory()->create();

    visit('/')
        ->click('Log in')
        ->type('email', $user->email)
        ->type('password', 'password')
        ->click('Log in')
        ->assertSee('Dashboard');
});

it('may reset the password', function () {
    Notification::fake();
    
    $user = User::factory()->create([
        'email' => 'test@laravel.com',
    ]);

    $page = visit('/')
        ->on()->mobile()
        ->inDarkMode();

    $page->click('Log in')
        ->click('Forgot your password?')
        ->type('email', $user->email)
        ->click('Email password reset link')
        ->assertSee('We have emailed your password reset link.');

    Notification::assertSentTo($user, ResetPassword::class);
});
