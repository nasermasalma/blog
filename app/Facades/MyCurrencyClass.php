<?php

namespace App\Facades;



use Illuminate\Support\Facades\Facade;



class MyCurrencyClass extends Facade{



    protected static function getFacadeAccessor() { return 'mycurrencyclass'; }

}