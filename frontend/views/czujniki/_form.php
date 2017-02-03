<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model frontend\models\Czujniki */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="czujniki-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'sn')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'nazwa')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'opis')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'wartosc')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'idpnia')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'czas')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
