<?php

namespace App\Paycheck;

use Exception;
use Money\Money;
use App\Models\Paycheck as PaycheckModel;
use App\Paycheck\Adjustments\Adjustment;

class Paycheck
{
    protected $startingAmount;
    protected $adjustments = [];

    public function __construct(Money $startingAmount)
    {
        $this->startingAmount = $startingAmount;
    }

    public function addAdjustment(Adjustment $adjustment)
    {
        $this->adjustments[] = $adjustment;
    }

    public function getResult(): Money
    {
        $adjustments = collect($this->adjustments);

        $adjustments->each(function (Adjustment $adjustment) {
            $this->startingAmount = $this->startingAmount
                ->subtract($adjustment->toBeAdjustedAmount($this->startingAmount));

            if ($this->startingAmount->isNegative()) {
                throw new Exception('Paycheck has reached negative amount.');
            }
        });

        return $this->startingAmount;
    }
}