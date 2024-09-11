<?php

namespace OfflineAgency\LaravelBankOfItaly\Tests\Feature;

use Illuminate\Support\MessageBag;
use OfflineAgency\LaravelBankOfItaly\Api\ExchangeRate;
use OfflineAgency\LaravelBankOfItaly\Entities\ExchangeRate\ExchangeRates;
use OfflineAgency\LaravelBankOfItaly\Tests\TestCase;
use OfflineAgency\LaravelBankOfItaly\Entities\ExchangeRate\ExchangeRate as ExchangeRateEntity;
use OfflineAgency\LaravelBankOfItaly\Entities\Error;

class ExchangeRateTest extends TestCase
{
    public function test_get_exchange_rates_validation()
    {
        $exchange_rate = new ExchangeRate();
        $response = $exchange_rate->getExchangeRates([
            'lang' => [],
            'baseCurrencyIsoCode' => [],
            'currencyIsoCode' => [],
            'startDate' => '01-01-2000',
            'endDate' => '01-01-2000'
        ]);

        $this->assertInstanceOf(MessageBag::class, $response);
        $this->assertObjectHasProperty('messages', $response);
        $this->assertArrayHasKey('lang', $response->messages());
        $this->assertArrayHasKey('baseCurrencyIsoCode', $response->messages());
        $this->assertArrayHasKey('currencyIsoCode', $response->messages());
        $this->assertArrayHasKey('startDate', $response->messages());
        $this->assertArrayHasKey('endDate', $response->messages());
    }

    public function test_get_exchange_rates()
    {
        $exchange_rate = new ExchangeRate();
        $response = $exchange_rate->getExchangeRates([
            'lang' => 'en',
            'startDate' => '2023-08-01',
            'endDate' => '2024-09-11'
        ]);

        $this->assertInstanceOf(ExchangeRates::class, $response);
        $this->assertIsArray($response->getItems());
        $this->assertCount(285, $response->getItems());
        $this->assertInstanceOf(ExchangeRateEntity::class, $response->getItems()[0]);
    }

    public function test_get_exchange_rates_error()
    {
        $exchange_rate = new ExchangeRate();
        $response = $exchange_rate->getExchangeRates([
            'lang' => 'en',
            'baseCurrencyIsoCode' => 'error',
            'startDate' => '2023-08-01',
            'endDate' => '2024-09-11'
        ]);

        $this->assertInstanceOf(Error::class, $response);
        $this->assertIsString(Error::class, $response->getError());
    }
}
