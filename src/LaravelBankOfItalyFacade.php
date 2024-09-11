<?php

namespace OfflineAgency\LaravelBankOfItaly;

use Illuminate\Support\Facades\Facade;

class LaravelBankOfItalyFacade extends Facade
{
    protected static function getFacadeAccessor(): string
    {
        return 'laravel-bank-of-italy';
    }
}
