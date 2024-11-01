<?php

namespace App\DesingPatterns\Structrual\Facade;

class PricingService
{
    public function calculateTotal($cartItems): float|int
    {
        $total = 0;
        foreach ($cartItems as $item) {
            $total += $item['price'] * $item['quantity'];
        }
        return $total;
    }

    public function applyDiscount($total, $discountCode = null)
    {
        if ($discountCode) {
            // Imagine a 10% discount for simplicity
            return $total * 0.90;
        }
        return $total;
    }
}
