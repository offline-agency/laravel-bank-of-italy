<?php

namespace OfflineAgency\LaravelBankOfItaly\Entities;

abstract class AbstractEntity
{
    public function __construct(array $exchange_rate)
    {
        foreach ($exchange_rate as $property => $value) {
            if (property_exists($this, $property)) {
                $this->$property = $value;
            }
        }
    }
}
