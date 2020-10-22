<?php

namespace App\Models;

use Exception;
use Money\Money;
use Illuminate\Database\Eloquent\Model;
use App\Paycheck\Adjustments\Adjustment;

class Paycheck extends Model
{
    public $resultAmount;

    protected $adjustments = [];

    public function addAdjustment(Adjustment $adjustment): Paycheck
    {
        $this->adjustments[] = $adjustment;

        return $this;
    }

    public function getResult(Money $startingAmount)
    {
        $adjustments = collect($this->adjustments);

        $adjustments->each(function (Adjustment $adjustment) use (&$startingAmount) {
            $startingAmount = $adjustment->adjust($startingAmount);

            if ($startingAmount->isNegative()) {
                throw new Exception('Paycheck has reached negative amount.');
            }
        });

        $this->resultAmount = $startingAmount;

        return $this;
    }
}
