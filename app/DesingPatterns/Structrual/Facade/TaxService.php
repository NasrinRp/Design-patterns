<?php

namespace App\DesingPatterns\Structrual\Facade;

class TaxService
{
    public function calculateTax($amount)
    {
        return $amount * 0.1; // Assume 10% tax
    }
}
