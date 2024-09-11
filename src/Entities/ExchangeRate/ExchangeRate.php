<?php

namespace OfflineAgency\LaravelBankOfItaly\Entities\ExchangeRate;

use OfflineAgency\LaravelBankOfItaly\Entities\AbstractEntity;

class ExchangeRate extends AbstractEntity
{
    public string $currency;

    public string $currencyIsoCode;

    public string $currencyUicCode;

    public string $rate;

    public string $rateConvention;

    public string $referenceDate;
}
