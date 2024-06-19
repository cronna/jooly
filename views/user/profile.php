<?php
/**
 * @var $user;
 * @var $orders;
 * @var $products;
*/

use yii\helpers\Html;
use yii\widgets\ActiveForm;

$arrayOrders =  array();
$lastId = 1;

foreach($orders as $order){
    $newId = $order->order_id;

    if (array_key_exists($newId, $arrayOrders)) {  
        array_push($arrayOrders[$newId], $order);
    }else{
        $arrayOrders[$newId] = [$order];
    }
    $lastId = $newId;

}

?>

<h1 class="profile-title">Профиль</h1>
<div class="profile-page">
    <div class="profile-card basket-info">
        <div class="p-c-title">
            <h3><?= $user->name, ' ', $user->surname ?></h3>
            <?= Html::a('<svg xmlns="http://www.w3.org/2000/svg" fill="gray" viewBox="0 0 50 50" width="20px" height="20px"><path d="M 43.050781 1.9746094 C 41.800781 1.9746094 40.549609 2.4503906 39.599609 3.4003906 L 38.800781 4.1992188 L 45.699219 11.099609 L 46.5 10.300781 C 48.4 8.4007812 48.4 5.3003906 46.5 3.4003906 C 45.55 2.4503906 44.300781 1.9746094 43.050781 1.9746094 z M 37.482422 6.0898438 A 1.0001 1.0001 0 0 0 36.794922 6.3925781 L 4.2949219 38.791016 A 1.0001 1.0001 0 0 0 4.0332031 39.242188 L 2.0332031 46.742188 A 1.0001 1.0001 0 0 0 3.2578125 47.966797 L 10.757812 45.966797 A 1.0001 1.0001 0 0 0 11.208984 45.705078 L 43.607422 13.205078 A 1.0001 1.0001 0 1 0 42.191406 11.794922 L 9.9921875 44.09375 L 5.90625 40.007812 L 38.205078 7.8085938 A 1.0001 1.0001 0 0 0 37.482422 6.0898438 z"/></svg>', ['update', 'id' => $user->id], ['class' => 'btn btn-primary']) ?>
        </div>
        <div class="user-phone">
            <span><b>Номер телефона: </b></span>
            <span><?= $user->phone ?></span>
        </div>
        <div class="user-id">
            <span><b>USER ID: </b></span>
            <span><?= $user->id ?></span>
        </div>
    </div>
    <div class="user-orders">
        <h2 class="profile-title">Мои заказы:</h2>
        
            <?php foreach($arrayOrders as $orders): ?>
                <div clas  s="user-orders-cards">
                    <div class="order-card">
                        <div class="card-header">
                            <h4>Заказ № <?= $orders[0]->order_id ?></h4>
                            <span><?= $orders[0]->date ?></span>
                        </div>
                        <div class="card-footer">
                            <div class="order-lenght"><?= count($orders) ?> товара</div>
                            <h4><?= $orders[0]->full_price ?></h4>
                        </div>
                        <ol class="order-products">
                            <?php foreach($orders as $order): ?>
                                <?php foreach($products as $product):?> 
                                    <?php if($product->id === $order->product_id):?>
                                        <li>
                                            <span><?= $product->title ?></span>
                                            <span><?= $product->price ?></span>
                                        </li>
                                    <?php endif ?>
                                <?php endforeach ?>
                            <?php endforeach ?>
                        </ol>
                    </div>
                </div>
            <?php endforeach ?>
        
    </div>
</div>
