<?php

namespace App\DesingPatterns\Creational\FactoryMethod;

class NewCustomerEmail implements EmailNotification
{
    public function sendEmail(): void
    {
        echo 'This email is for new customers';
    }
}
