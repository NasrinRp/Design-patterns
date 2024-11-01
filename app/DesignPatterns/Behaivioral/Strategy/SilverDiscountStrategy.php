<?php

namespace App\DesingPatterns\Behaivioral\Strategy;

class SilverDiscountStrategy implements DiscountStrategy
{
    public function calculateNewPrice($price): float
    {
        return $price * 0.1;
    }
}
