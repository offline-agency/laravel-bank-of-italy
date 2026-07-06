# Changelog

All notable changes to `laravel-bank-of-italy` will be documented in this file

## Unreleased

- Added PHP 8.5 support and CI coverage.
- Raised the minimum supported PHP version from 8.0 to 8.2, matching the versions actually covered by CI (this is a support-floor change, not a code-level breaking change — no PHP 8.2+ language features are required by the codebase).
- Added `phpunit.xml.dist` so `vendor/bin/phpunit` actually discovers and runs the test suite (previously missing, so CI's test step silently ran zero tests).
- Raised the `guzzlehttp/guzzle` floor from `^7.2` to `^7.12.1` — the old floor permitted several CVE-affected releases (cross-domain cookie leakage, auth header/cookie leakage on redirect, port-change origin bypass, dot-only cookie domain matching, HTTPS-proxy cleartext downgrade).
- Dropped support for Laravel 8.x and 9.x (both EOL; every release in those lines is now flagged by Composer's security-advisory audit, so CI could no longer install them anyway). Minimum supported Laravel is now 10.x.
- Disabled `config.audit.block-insecure` in `composer.json` so `prefer-lowest` CI jobs can still resolve older-but-compatible dependency floors for compatibility testing; this only affects dependency resolution during `composer update`, not what `composer audit` reports.
- Fixed `README.md`'s "Custom Query Parameters" example, which used `01-01-2000` for `startDate`/`endDate` — that format fails the package's own `date_format:Y-m-d` validation rule and would return a validation error, not results. Corrected to `2000-01-01`.
- Fixed `ExchangeRateTest::test_get_exchange_rates`, which asserted a hardcoded row count (285) against a live, time-varying external dataset; it now asserts on structure (non-empty, correct boundary dates, consistent currency) instead, since the Bank of Italy's published history can legitimately grow/shrink between test runs.
- Fixed the `LaravelBankOfItaly` facade, which previously proxied to an empty, method-less class and would throw "call to undefined method" on any use. `LaravelBankOfItaly` now implements `getExchangeRates()`, delegating to `Api\ExchangeRate`, so the facade documented via `extra.laravel.aliases` actually works. `Api` no longer extends `LaravelBankOfItaly` (that inheritance had no functional purpose and only existed to nominally connect the two).

## 1.0.0 - 201X-XX-XX

- initial release
