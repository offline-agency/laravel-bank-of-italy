<?php

namespace OfflineAgency\LaravelBankOfItaly\Api;

use Carbon\Carbon;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\MessageBag;
use OfflineAgency\LaravelBankOfItaly\Entities\Error;
use OfflineAgency\LaravelBankOfItaly\Entities\ExchangeRate\ExchangeRates;

class ExchangeRate extends Api
{
    public function getExchangeRates(
        array $query_params = []
    ): MessageBag|Error|ExchangeRates
    {
        $validation = Validator::make($query_params, [
            'lang' => 'nullable|string',
            'baseCurrencyIsoCode' => 'nullable|string',
            'currencyIsoCode' => 'nullable|string|in:EUR,USD,ITL',
            'startDate' => 'nullable|date_format:Y-m-d',
            'endDate' => 'nullable|date_format:Y-m-d'
        ]);

        if ($validation->fails()) {
            return $validation->getMessageBag();
        }

        $dates_info = $this->getDatesInfo(
            Arr::get($query_params, 'startDate'),
            Arr::get($query_params, 'endDate')
        );

        $query_params = $this->parseQueryParams($query_params, $dates_info, [
            'lang', 'baseCurrencyIsoCode', 'currencyIsoCode', 'startDate', 'endDate'
        ]);

        $response = Http::get(config('bank-of-italy.exchange-rate.url'), $query_params);

        if ($response->status() !== 200) {
            return new Error($response->body());
        }

        return new ExchangeRates($response->body());
    }

    private function parseQueryParams(
        array $query_params,
        array $dates_info,
        array $accepted_params
    ): array
    {
        $query_params = array_merge(config('bank-of-italy.exchange-rate.default_query_params'), $query_params);

        $query_params = array_merge($query_params, $dates_info);

        return $this->params($query_params, $accepted_params);
    }

    private function getDatesInfo(
        ?string $start_date,
        ?string $end_date
    ): array
    {
        $start_date = is_null($start_date)
            ? Carbon::now()->subYear()
            : Carbon::createFromFormat('Y-m-d', $start_date);

        $end_date = is_null($end_date)
            ? Carbon::now()
            : Carbon::createFromFormat('Y-m-d', $end_date);

        return [
            'startDate' => $start_date->format('Y-m-d'),
            'startYear' => $start_date->year,
            'startMonth' => $start_date->month,
            'endDate' => $end_date->format('Y-m-d'),
            'endYear' => $end_date->year,
            'endMonth' => $end_date->month,
        ];
    }
}
