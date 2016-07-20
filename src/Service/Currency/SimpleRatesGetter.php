<?php
/**
 * @copyright Copyright (c) 2016 Orba Sp. z o.o. (http://orba.co)
 */
namespace App\Service\Currency;

class SimpleRatesGetter implements RatesGetterInterface
{
    /**
     * Hardcoded conversion rates
     *
     * @var array
     */
    private $rates = [
        'PLN' => [
            'PLN' => 1,
            'EUR' => 0.2268
        ],
        'EUR' => [
            'PLN' => 4.4099,
            'EUR' => 1
        ]
    ];

    /**
     * Gets conversion rate from $currencyFrom to $currencyTo.
     * @param string $currencyFrom
     * @param string $currencyTo
     * @return float
     * @throws Exception
     */
    public function getRate($currencyFrom, $currencyTo)
    {
        if (!isset($this->rates[$currencyFrom][$currencyTo])) {
            throw new Exception('Unable to get conversion rate from "' . $currencyFrom . '" to "' . $currencyTo . '"');
        }
        return $this->rates[$currencyFrom][$currencyTo];
    }
}