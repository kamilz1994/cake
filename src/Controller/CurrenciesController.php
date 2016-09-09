<?php
/**
 * @copyright Copyright (c) 2016 Orba Sp. z o.o. (http://orba.co)
 */
namespace App\Controller;

use App\Service\Currency;

class CurrenciesController extends AppController
{
    const DEFAULT_CURRENCY_FROM = 'PLN';
    const DEFAULT_CURRENCY_TO   = 'EUR';

    /**
     * Main currency converter controller action.
     */
    public function index()
    {
        if ($this->request->is('post')) {
            try {
                $currencyService = new Currency();
                $currencyFrom = $this->request->data('currency_from');
                $currencyTo = $this->request->data('currency_to');
                $amount = (float)$this->request->data('amount');
                if($amount<0) {
                    $this->Flash->error(__('Liczba nie może być ujemna. Spróbuj ponowanie...'));
                    $amount = 0;
                }
                $result = $currencyService->convert($amount, $currencyFrom, $currencyTo);
                $this->set('amount', $amount);
                $this->set('currencyFrom', $currencyFrom);
                $this->set('currencyTo', $currencyTo);
                $this->set('result', $result);
            } catch (\Exception $e) {
                $this->log($e->getMessage());
                $this->Flash->error(__('Unexpected error. Sorry...'));
            }
        } else {
            $this->set('amount', 1);
            $this->set('currencyFrom', self::DEFAULT_CURRENCY_FROM);
            $this->set('currencyTo', self::DEFAULT_CURRENCY_TO);
        }
    }
}