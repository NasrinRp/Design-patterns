<?php

namespace App\DesingPatterns\Structrual\Facade;

class ShoppingFacade
{
    protected $inventoryService;
    protected $pricingService;
    protected $taxService;
    protected $paymentService;

    public function __construct()
    {
        $this->inventoryService = new InventoryService();
        $this->pricingService = new PricingService();
        $this->taxService = new TaxService();
        $this->paymentService = new PaymentService();
    }

    public function checkout($cartItems, $discountCode = null): string
    {
        // Check stock for each item
        foreach ($cartItems as $item) {
            if (!$this->inventoryService->checkStock($item['id'], $item['quantity'])) {
                return "Item {$item['name']} is out of stock.";
            }
        }

        // Calculate the total price with discount
        $total = $this->pricingService->calculateTotal($cartItems);
        $totalAfterDiscount = $this->pricingService->applyDiscount($total, $discountCode);

        // Calculate tax and final total
        $tax = $this->taxService->calculateTax($totalAfterDiscount);
        $finalTotal = $totalAfterDiscount + $tax;

        // Process payment
        return $this->paymentService->processPayment($finalTotal);
    }
}
