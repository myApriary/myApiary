<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model frontend\models\Miodobrania */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="miodobrania-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'ilosc_miodu')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'rodzaj_miodu')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'idpnia')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'czas')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
