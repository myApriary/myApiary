<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model frontend\models\Dokarmiania */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="dokarmiania-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'cel')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'rodzaj_pokarmu')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'ilosc_cukru')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'idpnia')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'czas')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
