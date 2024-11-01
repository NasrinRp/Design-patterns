<?php

namespace App\Http\Controllers;

use App\DesingPatterns\Behaivioral\Strategy\GoldDiscountStrategy;
use App\DesingPatterns\Behaivioral\Strategy\Item;
use App\DesingPatterns\Behaivioral\Strategy\ShoppingCard;
use App\DesingPatterns\Behaivioral\Strategy\SilverDiscountStrategy;
use App\DesingPatterns\Creational\FactoryMethod\EmailNotification;
use App\DesingPatterns\Creational\FactoryMethod\EmailNotificationFactory;
use App\DesingPatterns\Creational\Singleton\LoggerService;
use Illuminate\Http\Request;

class ClientController extends Controller
{
    public function useFactoryMethod(): void
    {
        $customerType = 'new';
        $email = EmailNotificationFactory::create($customerType);
        $email->sendEmail();
    }


    public function useStrategy(): void
    {
        $item1 = new Item('item1', 1000);
        $item2 = new Item('item2', 1000);

        $shoppingCard = new ShoppingCard();

        $shoppingCard->addItem($item1);
        $shoppingCard->addItem($item2);

        $shoppingCard->setDiscountStrategy(new SilverDiscountStrategy());

        $totalAmount = $shoppingCard->calculateTotalAmount();

        echo 'this is silver discount amount: ' . $totalAmount;
        echo '<br>';

        $shoppingCard->setDiscountStrategy(new GoldDiscountStrategy());
        $totalAmount = $shoppingCard->calculateTotalAmount();

        echo 'this is Gold discount amount: ' . $totalAmount;
    }

    public function useSingleton()
    {
        $logger = LoggerService::getInstance();

        // Log a message
        $logger->log('Nasrin is testing this part.');

        return response()->json(['message' => 'Action logged successfully']);
    }
}
