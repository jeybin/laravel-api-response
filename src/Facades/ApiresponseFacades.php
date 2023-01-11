<?php

namespace Jeybin\Apiresponse\Facades;

use Illuminate\Support\Facades\Facade;

class ApiresponseFacades extends Facade
{
    protected static function getFacadeAccessor()
    {
        return 'throwresponse';
    }
}