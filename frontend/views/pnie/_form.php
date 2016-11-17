<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model frontend\models\Pnie */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="pnie-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'id_pasieki')->textInput() ?>

    <?= $form->field($model, 'typ')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'rodzaj_ramki')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'pojemnosc')->textInput() ?>

    <?= $form->field($model, 'ilosc_ramek')->textInput() ?>

    <?= $form->field($model, 'data')->textInput() ?>

    <?= $form->field($model, 'nazwa')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'sila_rodziny')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
