<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model frontend\models\Treatment */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="treatment-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'purpose')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'type_of_medicine')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'amount_of_medicine')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'hive_id')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'time')->textInput() ?>

    <?= $form->field($model, 'ts_insert')->textInput() ?>

    <?= $form->field($model, 'ts_update')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app_frontend', 'Save'), ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
