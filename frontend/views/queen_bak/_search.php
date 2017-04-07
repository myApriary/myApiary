<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model frontend\models\QueenSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="queen-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
        'options' => [
            'data-pjax' => 1
        ],
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'mark_disk_color') ?>

    <?= $form->field($model, 'mark_disk_number') ?>

    <?= $form->field($model, 'variety') ?>

    <?= $form->field($model, 'reproductive_hive_id') ?>

    <?php // echo $form->field($model, 'hive_id') ?>

    <?php // echo $form->field($model, 'hive_time') ?>

    <?php // echo $form->field($model, 'matting_box_id') ?>

    <?php // echo $form->field($model, 'matting_box_time') ?>

    <?php // echo $form->field($model, 'ts_insert') ?>

    <?php // echo $form->field($model, 'ts_update') ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Search'), ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton(Yii::t('app', 'Reset'), ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
