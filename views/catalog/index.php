<?php

use app\entity\Categories;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;

/** @var yii\web\View $this */
/** @var categories $dataProvider */

$this->title = 'Каталог';
?>
<div>
    <div class="page-header">
        <h1>Каталог</h1>
        <?php if(Yii::$app->user->can('creator')): ?>
            <div class='create-btn'>
                <svg class='create-button' xmlns="http://www.w3.org/2000/svg"  viewBox="0 0 64 64" width="40px" height="40px"><path d="M32,6C17.641,6,6,17.641,6,32s11.641,26,26,26s26-11.641,26-26S46.359,6,32,6z M49,34l-14,1l-1,14h-4l-1-14l-14-1v-4l14-1	l1-14h4l1,14l14,1V34z"/></svg>
                <ul class='create-ul'>
                    <li><a href="/catalog/create" class='create-li'>добавить категорию</a></li>
                    <li><a href="/products/create" class='create-li2'>добавить продукт</a></li>
                </ul>
            </div>   
        <?php endif ?>
    </div>
    <div class="row row-cols-4 gap-3">
        <?php foreach($categories as $category): ?>
            <a href='/catalog/view?id=<?= $category->id ?>' class="col card">
                <div class="category-card-body">
                    <img class='category-img' style='width: 150px;' src="/category_img/<?= $category->img ?>" alt="">
                    <h3 class="card-title"><?= $category->title ?></h5>
                </div>
            </a>
        <?php endforeach;
        ?>
    </div>


</div>
