<?php
/** @var $model ; */

use yii\helpers\Html;
use yii\widgets\ActiveForm;

?>

<div class="reg-form">
    <div class="form__wrapper">
        <h1><?= $this->title ?></h1>
        <?php $form = ActiveForm::begin([
            'fieldConfig' => [
                'template' => "{label}\n{input}\n{error}",
                'labelOptions' => ['class' => 'label'],
                'inputOptions' => ['class' => 'input'],
                'errorOptions' => ['class' => 'error']
            ]
        ]) ?>
        <div>
            <?= $form->field($model, 'name')->textInput(['placeholder' => 'Said']) ?>
        </div>
        <div>
            <?= $form->field($model, 'surname')->textInput(['placeholder' => 'Akhmedov']) ?>
        </div>
        <div>
            <?= $form->field($model, 'phone')->textInput(['placeholder' => '+7(999)999-99-99']) ?>
        </div>
        <div>
            <?= $form->field($model, 'password')->passwordInput(['placeholder' => 'A-z, 1-9, !@-_#']) ?>
        </div>
        <div>
            <?= $form->field($model, 'passwordRepeat')->passwordInput(['placeholder' => 'A-z, 1-9, !@-_#']) ?>
        </div>
        <?= Html::submitButton('Зарегистрироваться', ['class' => 'btn']) ?>
        <?php ActiveForm::end(); ?>
    </div>
</div>