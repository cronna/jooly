<?php

namespace app\repository;
use app\entity\Orders;
use yii\db\Expression;
use Yii;
class OrdersRepository
{
    public static function addProductToOrders($order_id, $user_id, $product_id, $fullPrice)
    {
        $order = new Orders;
        $order->order_id = $order_id;
        $order->user_id = $user_id;
        $order->product_id = $product_id;
        $order->date = date('d.m.Y');
        $order->full_price = $fullPrice;
        $order->save();
    }

    public static function getAll()
    {
        return Orders::find()->orderBy('order_id')->all();
    }

    public static function getOrdersByUserId($userId)
    {
        return Orders::find()->where(['user_id' => $userId])->all();
    }

    
}