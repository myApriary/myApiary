<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model frontend\models\CostSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="cost-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
        'options' => [
            'data-pjax' => 1
        ],
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'amount') ?>

    <?= $form->field($model, 'description') ?>

    <?= $form->field($model, 'comment') ?>

    <?= $form->field($model, 'user_id') ?>

    <?php // echo $form->field($model, 'ts_insert') ?>

    <?php // echo $form->field($model, 'ts_update') ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app_frontend', 'Search'), ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton(Yii::t('app_frontend', 'Reset'), ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
