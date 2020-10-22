<?php

namespace App\Http\Controllers;

use App\Models\Invoice;
use App\Models\Paycheck;
use App\Paycheck\Adjustments\TestAdjustment;
use App\Paycheck\Adjustments\SecondTestAdjustment;

class PagesController extends Controller
{
    public function index()
    {
        $paidInvoice = Invoice::first();

        $paycheck = (new Paycheck)
            ->addAdjustment(new TestAdjustment)
            ->addAdjustment(new SecondTestAdjustment)
            ->getResult($paidInvoice->amount);

        dd($paycheck->resultAmount);
    }
}
