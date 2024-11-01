<?php

namespace App\DesingPatterns\Behaivioral\Strategy;

interface DiscountStrategy
{
    public function calculateNewPrice($price): float;
}
