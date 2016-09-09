<?php
/**
 * @copyright Copyright (c) 2016 Orba Sp. z o.o. (http://orba.co)
 */
/**
 * @var $formHelper Cake\View\Helper\FormHelper
 */
$formHelper = $this->Form;
?>
<div class="row">
    <div class="columns large-6">
        <h1><?php echo __('Convert currency'); ?></h1>
        <?= $formHelper->create(null); ?>
        <?= $formHelper->input('amount', ['val' => $amount]); ?>
        <?= $formHelper->input('currency_from', ['options' => ['PLN' => 'PLN', 'EUR' => 'EUR', 'USD' => 'USD', 'GBP' => 'GBP', 'RUB' => 'RUB'], 'val' => $currencyFrom]); ?>
        <?= $formHelper->input('currency_to', ['options' => ['PLN' => 'PLN', 'EUR' => 'EUR', 'USD' => 'USD', 'GBP' => 'GBP', 'RUB' => 'RUB'], 'val' => $currencyTo]); ?>
        <?= $formHelper->submit(__('Submit')); ?>
        <?= $formHelper->end(); ?>
    </div>
</div>
<?php if (isset($result)): ?>
<hr />
<div class="row">
    <div class="columns large-12 checks">
        <?= $amount . ' ' . $currencyFrom . ' = ' . $result . ' ' . $currencyTo; ?>
    </div>
</div>
<?php endif; ?>