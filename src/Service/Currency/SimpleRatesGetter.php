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
            'EUR' => 0.2268,
            'USD' => 2,
            'GBP' => 2.5,
            'RUB' => 2.4
        ],
        'EUR' => [
            'PLN' => 4.4099,
            'EUR' => 1,
            'USD' => 1.5,
            'GBP' => 1.7,
            'RUB' => 2.2
        ],
        'USD' => [
            'PLN' => 3.4099,
            'EUR' => 1.5,
            'USD' => 1,
            'GBP' => 1.6,
            'RUB' => 2.1
        ],
        'GBP' => [
            'PLN' => 2.4099,
            'EUR' => 1.5,
            'USD' => 1.6,
            'GBP' => 1,
            'RUB' => 2
        ],
        'RUB' => [
            'PLN' => 0.4099,
            'EUR' => 0.2,
            'USD' => 0.3,
            'GBP' => 1.1,
            'RUB' => 1
        ],
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