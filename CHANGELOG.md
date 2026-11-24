# Changelog

All notable changes to `laravel-bank-of-italy` will be documented in this file

## Unreleased

- Supported PHP versions are now 8.4, 8.5 and 8.6 (`php` `^8.4`).
- Added support for Laravel 12 and 13 (`illuminate/*` `^12.0|^13.0`, `orchestra/testbench` `^10.0|^11.0`, `phpunit/phpunit` `^11.5.3|^12.0.1|^13.0`).
- The `test` and `test-coverage` Composer scripts now run PHPUnit with the PHP binary that runs Composer.
- Dropped Laravel 8 and 9. Laravel 10 and 11 are not supported either: Composer now blocks every release of Laravel 8 to 11 because of security advisories.
- Added `phpunit.xml.dist`, so `vendor/bin/phpunit` runs the test suite.
- `test_get_exchange_rates` now checks the response structure and the requested date range instead of an exact row count from the live API.
- CI now runs on the `main` branch and tests PHP 8.4, 8.5 and 8.6 with Laravel 12 and 13. The PHP 8.6 + Laravel 13 job fails on any deprecation.

## 1.0.0 - 201X-XX-XX

- initial release
