<?php

namespace OfflineAgency\LaravelBankOfItaly\Tests\Feature;

use OfflineAgency\LaravelBankOfItaly\Entities\ExchangeRate\ExchangeRates;
use OfflineAgency\LaravelBankOfItaly\LaravelBankOfItalyFacade as LaravelBankOfItaly;
use OfflineAgency\LaravelBankOfItaly\Tests\TestCase;

class LaravelBankOfItalyFacadeTest extends TestCase
{
    public function test_facade_proxies_to_exchange_rate_api()
    {
        $response = LaravelBankOfItaly::getExchangeRates([
            'lang' => 'en',
            'startDate' => '2023-08-01',
            'endDate' => '2024-09-11'
        ]);

        $this->assertInstanceOf(ExchangeRates::class, $response);
        $this->assertNotEmpty($response->getItems());
    }
}
