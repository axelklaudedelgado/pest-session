# Pest Training — Commands & Setup Reference

Everything you need to get the repo running. All commands are listed in order — copy-paste ready.

---

## 1. Clone and install

```bash
git clone https://github.com/axelklaudedelgado/pest-session.git
cd pest-session

composer install
npm install

cp .env.example .env
php artisan key:generate
```

---

## 2. Database

This project uses SQLite.

```bash
php artisan migrate
```

---

## 3. Enable required PHP extensions

If you run into extension errors, find your `php.ini` file first:

```bash
php --ini
```

Open the file it prints and look for these lines. Remove the leading `;` to uncomment each one. Save the file, then restart your terminal.

```ini
extension=pdo_sqlite
extension=sqlite3
extension=sockets
```
---

## 4. Run the test suite

```bash
# Run everything
vendor/bin/pest

# Run just the exercises (starter files, PHPUnit-style)
vendor/bin/pest tests/Exercises

# Run just the solutions (Pest-style, for comparison)
vendor/bin/pest tests/Solutions

# Run a specific file
vendor/bin/pest tests/Exercises/Warmup/CalculatorTest.php

# Run with a filter (matches test description)
vendor/bin/pest --filter="adds two numbers"
```

---

## 5. Browser testing setup (required for v4 preview demos)

> This is separate from `composer install` and `npm install`.
> Playwright's browser binaries are not included in the repo — every machine needs to download them once.

```bash
npm install playwright@latest
npx playwright install
```

Run a browser test headed (watch the browser open live):

```bash
vendor/bin/pest --headed tests/Browser/BrowserDemoTest.php
```

Run headless (no browser window, just pass/fail):

```bash
vendor/bin/pest tests/Browser/BrowserDemoTest.php
```

Run all browser tests:

```bash
vendor/bin/pest tests/Browser
```

---

## 6. Development server (needed for browser tests)

Browser tests need a running server to hit. In a separate terminal:

```bash
composer run dev
```

Make sure your `.env` has `APP_URL=http://localhost:8000` (or whatever port `artisan serve` uses).

---

## 7. Useful Pest flags

```bash
vendor/bin/pest --headed          # open a real browser window (browser tests only)
vendor/bin/pest --debug           # pause on failure, open inspectable browser view
vendor/bin/pest --filter="text"   # run only tests whose description matches "text"
vendor/bin/pest --bail            # stop on first failure
vendor/bin/pest --parallel        # run tests in parallel (faster on larger suites)
```
