<?php
/**
 * @copyright Copyright (c) 2016 Orba Sp. z o.o. (http://orba.co)
 */
namespace App\Service\Currency;

interface RatesGetterInterface
{
    /**
     * Gets conversion rate from $currencyFrom to $currencyTo.
     * @param string $currencyFrom
     * @param string $currencyTo
     * @return float
     * @throws Exception
     */
    public function getRate($currencyFrom, $currencyTo);
}