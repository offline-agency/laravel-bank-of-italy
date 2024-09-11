<?php

namespace OfflineAgency\LaravelBankOfItaly\Tests;

use Illuminate\Foundation\Testing\TestCase as BaseTestCase;
use OfflineAgency\LaravelBankOfItaly\LaravelBankOfItalyFacade;
use OfflineAgency\LaravelBankOfItaly\LaravelBankOfItalyServiceProvider;
use Orchestra\Testbench\Concerns\CreatesApplication;

abstract class TestCase extends BaseTestCase
{
    use CreatesApplication;

    public function setUp(): void
    {
        parent::setUp();
    }

    public function getPackageProviders(
        $app
    ): array {
        return [
            LaravelBankOfItalyServiceProvider::class,
        ];
    }

    public function getPackageAliases(
        $app
    ): array {
        return [
            'LaravelBankOfItaly' => LaravelBankOfItalyFacade::class,
        ];
    }
}
