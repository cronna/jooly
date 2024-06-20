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
            <div class="links">
                <?= Html::a('<img src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAADAAAAAwCAYAAABXAvmHAAAACXBIWXMAAAsTAAALEwEAmpwYAAABZElEQVR4nO2ZTUoDQRCFv1WOkfi7nwhewIleSMWFa8UTxOQEuYFnMUESY7YGjQpuAiMDvSgGxCxedyzoD5rs3qvXM11paiCTyWT+OzvAEFgAa6ASrHXQGwCdmMWfAR+ion9bK6AXa+djF1+ZEG11gKExmAInQEukXeuUwMx43CNmYcTr4mNQGo+5WtweWNXON2kB38HjSy1u39GY3ACf4ddlgGjkABuyD1wABzh9AuPgsQSOPAZ4ND7SEKkCdEPh8hApD3EBvBq/N+DYWxcq1CG20UYLZYi/AtTt7xy4Eq9Rw3sZzok8wFOiq3YFTLwHGMcIsAdcA3fi9ZDqFXJ/iNUUntto4fmPrOv9KjHxfpmber9OHwKXwK5aeBttVEoOsCG3scYq7gdbLwlGiz3j8awWHxjxWTBTDndPG8PdPmI6Yeyd4rr8HmO8Ttj1VYLiSyLSDo93Lv7EVOv1Y+18JpPJkIQfKpKPLTg0kzEAAAAASUVORK5CYII=">', ['logout', 'id' => Yii::$app->user->id], [
                        'class' => 'btn btn-danger',
                        'data' => [
                        'confirm' => 'Вы уверены что хотите выйти?',
                        'method' => 'post',
                    ],
                ]) ?> 
            </div>
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
                            <div class="order-lenght"><?= count($orders) ?> 
                                <?php $i = count($orders) ?> <?php 
                                    if($i % 10000 === 1){
                                        echo 'товар';
                                    }else if($i % 10000 === 2 || $i % 10000 === 3 || $i % 10000 === 4){
                                        echo 'товара';
                                    }else{
                                        echo 'товаров';
                                    }
                                ?>
                            </div>
                            <h4><?= $orders[0]->full_price ?> ₽</h4>
                        </div>
                        <ol class="order-products">
                            <?php $i = 0;
                             foreach($orders as $order): ?>
                                <?php foreach($products as $product):?> 
                                    <?php if($product->id === $order->product_id):?>
                                        <li>
                                            <span><?= $product->title ?></span>
                                            <span><?= $product->price ?> ₽</span>
                                        </li>
                                    <?php $i++; endif ?>
                                <?php endforeach ?>
                            <?php endforeach?>
                        </ol>
                    </div>
                </div>
                <?php if(count($orders) == 0): ?>
                    <div class="non-products">
                        <div >В корзине пока пусто.</div>
                    </div>
                <?php endif; ?>
            <?php endforeach ?>
            <?php if(empty($arrayOrders)): ?>
           <div class="non-products">
                <div class="">У вас пока нет заказов.</div>
            </div>
        <?php endif; ?>
    </div>
</div>
