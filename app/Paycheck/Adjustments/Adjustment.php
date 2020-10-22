<?php

namespace App\Paycheck\Adjustments;

use Money\Money;

abstract class Adjustment
{
    abstract public function adjust(Money $start): Money;
}
