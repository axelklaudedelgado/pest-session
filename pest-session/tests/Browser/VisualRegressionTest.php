<?php

/**
 * PEST V4 PREVIEW — Visual Regression Testing
 * --------------------------------------------------
 * assertScreenshotMatches() takes a screenshot of the current page and
 * compares it against a saved baseline image.
 *
 *   - First run: no baseline exists yet, so Pest saves the current
 *     screenshot AS the baseline and the test passes.
 *   - Every run after that: Pest compares the new screenshot against
 *     the saved baseline. If pixels differ beyond the tolerance, the
 *     test fails and a diff image is saved next to the baseline.
 *
 * Run it:
 *   ./vendor/bin/pest tests/Browser/VisualRegressionDemoTest.php
 *
 * To intentionally accept new baselines after a real visual change:
 *   ./vendor/bin/pest tests/Browser/VisualRegressionDemo.php --update-snapshots
 */

it('login page looks right', function () {
    $page = visit('/');
    
    $page->assertScreenshotMatches(true, true); // Full page, show diff
});