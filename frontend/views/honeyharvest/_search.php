<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model frontend\models\HoneyharvestSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="honeyharvest-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
        'options' => [
            'data-pjax' => 1
        ],
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'honey_amount') ?>

    <?= $form->field($model, 'kind_of_honey') ?>

    <?= $form->field($model, 'hive_id') ?>

    <?= $form->field($model, 'time') ?>

    <?php // echo $form->field($model, 'ts_insert') ?>

    <?php // echo $form->field($model, 'ts_update') ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app_frontend', 'Search'), ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton(Yii::t('app_frontend', 'Reset'), ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
