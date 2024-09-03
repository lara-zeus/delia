<?php

namespace LaraZeus\Delia\Facades;

use Illuminate\Support\Facades\Facade;

class Delia extends Facade
{
    protected static function getFacadeAccessor(): string
    {
        return 'delia';
    }
}
