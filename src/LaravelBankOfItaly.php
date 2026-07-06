<?php

namespace OfflineAgency\LaravelBankOfItaly;

use Illuminate\Support\MessageBag;
use OfflineAgency\LaravelBankOfItaly\Api\ExchangeRate;
use OfflineAgency\LaravelBankOfItaly\Entities\Error;
use OfflineAgency\LaravelBankOfItaly\Entities\ExchangeRate\ExchangeRates;

class LaravelBankOfItaly
{
    public function getExchangeRates(
        array $query_params = []
    ): MessageBag|Error|ExchangeRates
    {
        return (new ExchangeRate())->getExchangeRates($query_params);
    }
}
