<?php

namespace App\Models;

use Money\Money;
use Illuminate\Database\Eloquent\Model;

class Invoice extends Model
{
    public function getAmountAttribute($value): Money
    {
        return Money::EUR($value);
    }
}
