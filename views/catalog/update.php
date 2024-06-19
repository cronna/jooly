<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\entity\Categories $model */

?>
<div class="categories-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
