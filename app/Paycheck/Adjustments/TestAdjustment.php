<?php

namespace App\Paycheck\Adjustments;

use Money\Money;

class TestAdjustment extends Adjustment
{
    public function toBeAdjustedAmount(Money $start): Money
    {
        $percentage = $start->allocate([5, 95]);

        return $start->subtract($percentage[0]);
    }
}