<?php

namespace App\DesingPatterns\Creational\FactoryMethod;

class RegularCustomerEmail implements EmailNotification
{
    public function sendEmail(): void
    {
        echo 'This email is for regular customers';
    }
}
