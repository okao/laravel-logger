<?php

namespace Okao\LaravelLogger\Facades;

use Illuminate\Support\Facades\Facade;

class LaravelLogger extends Facade
{
    /**
     * Get the registered name of the component.
     *
     * @return string
     */
    protected static function getFacadeAccessor()
    {
        return 'laravellogger';
    }
}
