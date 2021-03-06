<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model frontend\models\HivesSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="hives-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
        'options' => [
            'data-pjax' => 1
        ],
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'apiary_id') ?>

    <?= $form->field($model, 'type') ?>

    <?= $form->field($model, 'kindOfFrame0.labelT') ?>

    <?= $form->field($model, 'capacity') ?>

    <?php // echo $form->field($model, 'number_of_frames') ?>

    <?php // echo $form->field($model, 'start_date') ?>

    <?php // echo $form->field($model, 'end_date') ?>

    <?php // echo $form->field($model, 'ts_insert') ?>

    <?php // echo $form->field($model, 'ts_update') ?>

    <?php // echo $form->field($model, 'name') ?>

    <?php // echo $form->field($model, 'family_condition') ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app_frontend', 'Search'), ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton(Yii::t('app_frontend', 'Reset'), ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
