<?php

namespace UmutTaymaz\VerimorSMSAPI\Facades;

use Illuminate\Support\Facades\Facade;

class Verimor extends Facade
{
    protected static function getFacadeAccessor()
    {
        return 'Verimor';
    }
}