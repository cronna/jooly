<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use app\repository\ProductRepository;

/** @var yii\web\View $this */
/** @var app\entity\Products $model */
/** @var yii\widgets\ActiveForm $form 
 * @var $cat;
*/

?>



<div class="products-form">

    <?php $form = ActiveForm::begin(['options' => ['enctype' => 'multipart/form-data']]); ?>

    <?= $form->field($model, 'title')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'description')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'price')->textInput() ?>

    <?= $form->field($model, 'quantity')->textInput() ?>

    <?= $form->field($model, 'category_id')->dropDownList($cat) ?>

    <?= $form->field($model, 'img')->fileInput() ?>
    
    <?= $form->field($model, 'img2')->fileInput() ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
