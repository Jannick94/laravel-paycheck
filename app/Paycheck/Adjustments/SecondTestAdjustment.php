<?php

namespace App\Paycheck\Adjustments;

use Money\Money;

class SecondTestAdjustment extends Adjustment
{
    public function adjust(Money $start): Money
    {
        return $start->subtract(Money::EUR(50));
    }
}
