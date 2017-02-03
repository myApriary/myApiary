<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model frontend\models\Ulikiweselne */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="ulikiweselne-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'id')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'typ')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'rodzaj_ramki')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'pojemnosc')->textInput() ?>

    <?= $form->field($model, 'ilosc_ramek')->textInput() ?>

    <?= $form->field($model, 'data')->textInput() ?>

    <?= $form->field($model, 'nazwapasieki')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
