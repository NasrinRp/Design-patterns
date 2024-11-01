<?php

namespace App\DesingPatterns\Creational\FactoryMethod;

class EmailNotificationFactory
{
    public static function create(string $customerType): EmailNotification
    {
        return match ($customerType) {
            'regular' => new RegularCustomerEmail(),
            'vip' => new VipCustomerEmail(),
            'new' => new NewCustomerEmail(),
        };
    }
}
