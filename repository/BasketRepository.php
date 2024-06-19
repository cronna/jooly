<?php

namespace app\repository;
use app\entity\Basket;
class BasketRepository
{
    public static function addProductToBasket($user_id, $product_id)
    {
        $basket = new Basket;
        $basket->user_id = $user_id;
        $basket->product_id = $product_id;
        $basket->save();
    }

    public static function getAll()
    {
        return Basket::find()->all();
    }

    public static function deleteAllFromBasket()
    {
        Basket::deleteAll();
    }

}