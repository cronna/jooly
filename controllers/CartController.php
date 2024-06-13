<?php

namespace app\controllers;
use app\entity\Basket;
use app\repository\BasketRepository;
use app\repository\ProductRepository;
use Yii;


class CartController extends \yii\web\Controller
{
    public function actionIndex()
    {
        $basket_products = BasketRepository::getAll();
        $products = ProductRepository::getAll();

        return $this->render('index', ['basket_products' => $basket_products, 'products' => $products]);
    }

    public function actionAdd($user_id, $product_id)
    {
        BasketRepository::addProductToBasket($user_id, $product_id);
        $notify = 'Товар добавлен в корзину';
        
        return $this->redirect(Yii::$app->request->referrer);
    }



}

