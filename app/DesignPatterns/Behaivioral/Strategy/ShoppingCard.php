<?php

namespace App\DesingPatterns\Behaivioral\Strategy;

class ShoppingCard
{
    // The Context that discount service use
    private DiscountStrategy $discountStrategy;
    private array $items = [];


    public function addItem($item): void
    {
        $this->items[] = $item;
    }

    public function setDiscountStrategy(DiscountStrategy $discountStrategy): void
    {
        $this->discountStrategy = $discountStrategy;
    }

    public function calculateTotalAmount(): float|int
    {
        $subtotal = 0;
        foreach ($this->items as $item) {
            $subtotal += $item->price;
        }

        $discount = $this->discountStrategy->calculateNewPrice($subtotal);

        return $subtotal - $discount;
    }
}
