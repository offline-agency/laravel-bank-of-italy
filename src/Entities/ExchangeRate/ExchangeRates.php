<?php

namespace OfflineAgency\LaravelBankOfItaly\Entities\ExchangeRate;

class ExchangeRates
{
    private array $items;

    public function __construct(string $exchange_rates_response)
    {
        $this->setItems($exchange_rates_response);
    }

    public function getItems(): array
    {
        return $this->items;
    }

    public function setItems(
        string $exchange_rates_response
    ): void
    {
        $exchange_rates = explode("\n", trim($exchange_rates_response));
        $exchange_rates = array_slice($exchange_rates, 1);

        $this->items = array_map(function ($exchange_rate) {
            $exchange_rate = explode(",", $exchange_rate);

            $exchange_rate = [
                'currency' => $exchange_rate[0],
                'currencyIsoCode' => $exchange_rate[1],
                'currencyUicCode' => $exchange_rate[2],
                'rate' => $exchange_rate[3],
                'rateConvention' => $exchange_rate[4],
                'referenceDate' => $exchange_rate[5]
            ];

            return new ExchangeRate($exchange_rate);
        }, array_filter($exchange_rates, function ($exchange_rate) {
            return !empty($exchange_rate);
        }));
    }
}
