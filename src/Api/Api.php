<?php

namespace OfflineAgency\LaravelBankOfItaly\Api;

use OfflineAgency\LaravelBankOfItaly\LaravelBankOfItaly;

class Api extends LaravelBankOfItaly
{
    protected function params(
        array $query_params,
        array $accepted_params
    ): array
    {
        $parsed_data = [];
        foreach ($query_params as $key => $value) {
            if (in_array($key, $accepted_params)) {
                $parsed_data[$key] = $value;
            }
        }

        return $parsed_data;
    }
}
