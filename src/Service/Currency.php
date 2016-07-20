<?php
/**
 * @copyright Copyright (c) 2016 Orba Sp. z o.o. (http://orba.co)
 */
namespace App\Service;

use App\Service\Currency\SimpleRatesGetter;

class Currency
{
    /**
     * @param float $amount
     * @param string $currencyFrom
     * @param string $currencyTo
     * @return float;
     */
    public function convert($amount, $currencyFrom, $currencyTo)
    {
        $ratesGetter = new SimpleRatesGetter();
        return $amount * $ratesGetter->getRate($currencyFrom, $currencyTo);
    }
}