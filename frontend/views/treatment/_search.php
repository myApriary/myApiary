<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model frontend\models\TreatmentSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="treatment-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
        'options' => [
            'data-pjax' => 1
        ],
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'purpose') ?>

    <?= $form->field($model, 'type_of_medicine') ?>

    <?= $form->field($model, 'amount_of_medicine') ?>

    <?= $form->field($model, 'hive_id') ?>

    <?php // echo $form->field($model, 'time') ?>

    <?php // echo $form->field($model, 'ts_insert') ?>

    <?php // echo $form->field($model, 'ts_update') ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app_frontend', 'Search'), ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton(Yii::t('app_frontend', 'Reset'), ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
