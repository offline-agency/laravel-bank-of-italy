<?php

return [
    'exchange-rate' => [
        'url' => 'https://tassidicambio.bancaditalia.it/terzevalute-wf-web/rest/v1.0/dailyTimeSeries',
        'default_query_params' => [
            'lang' => 'it',
            'baseCurrencyIsoCode' => 'USD',
            'currencyIsoCode' => 'EUR'
        ]
    ]
];
