<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\entity\Products $model 
 * @var $categories
*/

$this->title = 'Create Products';
$this->params['breadcrumbs'][] = ['label' => 'Products', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;

foreach($categories as $category){
    $cat[$category->id] = $category->title;
}

?>
<div class="products-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
        'cat' => $cat
    ]) ?>

</div>
