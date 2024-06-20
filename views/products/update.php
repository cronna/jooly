<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\entity\Products $model 
 * @var $categories
*/

$this->title = 'Update Products: ' . $model->title;
$this->params['breadcrumbs'][] = ['label' => 'Products', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->title, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';

foreach($categories as $category){
    $cat[$category->id] = $category->title;
}
?>
<div class="products-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
        'cat' => $cat
    ]) ?>

</div>
