<?php

namespace App\Paycheck\Adjustments;

use Money\Money;

abstract class Adjustment
{
    abstract public function toBeAdjustedAmount(Money $start): Money;
}