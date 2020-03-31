<?php

namespace App\Paycheck;

use App\Paycheck\Paycheck;

class DefaultPaycheck extends Paycheck
{
    public function generatePdf()
    {
        dd('generating pdf', $this->getResult());
    }
}