<?php

namespace App\DesingPatterns\Creational\FactoryMethod;

class VipCustomerEmail implements EmailNotification
{
    public function sendEmail(): void
    {
        echo 'This email is for Vip customers';
    }
}
