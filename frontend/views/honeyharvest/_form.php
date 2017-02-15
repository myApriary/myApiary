<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model frontend\models\Honeyharvest */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="honeyharvest-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'honey_amount')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'kind_of_honey')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'hive_id')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'time')->textInput() ?>

    <?= $form->field($model, 'ts_insert')->textInput() ?>

    <?= $form->field($model, 'ts_update')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app_frontend', 'Save'), ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
