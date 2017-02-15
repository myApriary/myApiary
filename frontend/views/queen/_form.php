<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model frontend\models\Queen */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="queen-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'mark_disk_color')->dropDownList([ '0', '1', '2', '3', '4', ], ['prompt' => '']) ?>

    <?= $form->field($model, 'marking_disk_number')->textInput() ?>

    <?= $form->field($model, 'variety')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'reproductive_hive_id')->textInput() ?>

    <?= $form->field($model, 'hive_id')->textInput() ?>

    <?= $form->field($model, 'hive_time')->textInput() ?>

    <?= $form->field($model, 'matting_box_id')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'matting_box_time')->textInput() ?>

    <?= $form->field($model, 'ts_insert')->textInput() ?>

    <?= $form->field($model, 'ts_update')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Save'), ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
