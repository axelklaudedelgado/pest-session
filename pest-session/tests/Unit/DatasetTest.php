<?php 

// The first one shows a simple example of using datasets without descriptions.
//Run using `./vendor/bin/pest --filter='has emails'`
it('has emails', function (string $email) {
    expect($email)->not->toBeEmpty();
})->with(['enunomaduro@gmail.com', 'other@example.com']);

// The second one shows a simple example of using datasets with descriptions.
// Run using `./vendor/bin/pest --filter='formats employee display names'`
it('formats employee display names', function (
    string $last,
    string $first,
    string $expected
) {
    expect(displayName($last, $first))
        ->toBe($expected);
})->with([
    'faculty' => ['Santos', 'Juan', 'Santos, Juan'],
    'staff'   => ['Reyes',  'Maria', 'Reyes, Maria'],
    'single'  => ['',       'Cher',  'Cher'],
]);