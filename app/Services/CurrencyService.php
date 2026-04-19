<?php
// app/Services/CurrencyService.php
namespace App\Services;

use Money\Currencies\ISOCurrencies;
use Money\Parser\DecimalMoneyParser;

class CurrencyService
{
    public function getCurrencies()
    {
        $currencies = new ISOCurrencies();

        return $currencies->getIterator();
    }
}
