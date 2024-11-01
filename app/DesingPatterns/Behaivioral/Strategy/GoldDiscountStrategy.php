<?php

namespace App\DesingPatterns\Behaivioral\Strategy;

class GoldDiscountStrategy implements DiscountStrategy
{
    public function calculateNewPrice($price): float
    {
        return $price * 0.2;
    }
}
