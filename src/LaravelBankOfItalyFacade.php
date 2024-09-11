<?php

namespace OfflineAgency\LaravelBankOfItaly;

use Illuminate\Support\Facades\Facade;

/**
 * @see \OfflineAgency\LaravelBankOfItaly\Skeleton\SkeletonClass
 */
class LaravelBankOfItalyFacade extends Facade
{
    /**
     * Get the registered name of the component.
     *
     * @return string
     */
    protected static function getFacadeAccessor()
    {
        return 'laravel-bank-of-italy';
    }
}
