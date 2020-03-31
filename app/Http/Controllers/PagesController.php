<?php

namespace App\Http\Controllers;

use Money\Money;
use App\Paycheck\DefaultPaycheck;
use App\Paycheck\Adjustments\TestAdjustment;

class PagesController extends Controller
{
    public function index()
    {
        $startingAmount = Money::EUR(100000);

        $paycheck = new DefaultPaycheck($startingAmount);

        $paycheck->addAdjustment(new TestAdjustment());
        $paycheck->generatePdf();
    }
}
