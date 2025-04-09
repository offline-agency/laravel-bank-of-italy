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

        $this->items = [];

        foreach ($exchange_rates as $exchange_rate) {
            if (empty($exchange_rate)) {
                continue;
            }

            $exchange_rate_parts = explode(',', $exchange_rate);

            if (count($exchange_rate_parts) < 6) {
                continue;
            }

            $parsed_exchange_rate = [
                'currency' => $exchange_rate_parts[0],
                'currencyIsoCode' => $exchange_rate_parts[1],
                'currencyUicCode' => $exchange_rate_parts[2],
                'rate' => $exchange_rate_parts[3],
                'rateConvention' => $exchange_rate_parts[4],
                'referenceDate' => $exchange_rate_parts[5]
            ];

            $this->items[] = new ExchangeRate($parsed_exchange_rate);
        }
    }
}
