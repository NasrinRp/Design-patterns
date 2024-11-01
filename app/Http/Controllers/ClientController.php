<?php

namespace App\Http\Controllers;

use App\DesingPatterns\Behaivioral\Strategy\GoldDiscountStrategy;
use App\DesingPatterns\Behaivioral\Strategy\Item;
use App\DesingPatterns\Behaivioral\Strategy\ShoppingCard;
use App\DesingPatterns\Behaivioral\Strategy\SilverDiscountStrategy;
use App\DesingPatterns\Creational\FactoryMethod\EmailNotificationFactory;
use App\DesingPatterns\Creational\Singleton\LoggerService;
use App\DesingPatterns\Structrual\Facade\ShoppingFacade;

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

    public function useFacade()
    {
        $cartItems = [
            ['id' => 1, 'name' => 'Product 1', 'price' => 100, 'quantity' => 2],
            ['id' => 2, 'name' => 'Product 2', 'price' => 50, 'quantity' => 1],
        ];
        $discountCode = 'SUMMER21';

        $shopping = new ShoppingFacade();
        $result = $shopping->checkout($cartItems, $discountCode);

        return response()->json(['message' => $result]);
    }


    //todo: fix it
//    public function useFacadeAsService()
//    {
//        $cartItems = [
//            ['id' => 1, 'name' => 'Product 1', 'price' => 100, 'quantity' => 2],
//            ['id' => 2, 'name' => 'Product 2', 'price' => 50, 'quantity' => 1],
//        ];
//        $discountCode = 'SUMMER21';
//
//        // for converting shopping facade as a service do these steps:
//        // 1.create shopping service in service provider files
//        // 2.add service provider name in providers file in config/app.php
//        // 3. add facade name in alias array
//        $result = Shopping::checkout($cartItems, $discountCode);
//        return response()->json(['message' => $result]);
//    }

    public function useSingleton()
    {
        $logger = LoggerService::getInstance();

        // Log a message
        $logger->log('Nasrin is testing this part.');

        return response()->json(['message' => 'Action logged successfully']);
    }
}
