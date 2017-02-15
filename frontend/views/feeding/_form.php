<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model frontend\models\Feeding */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="feeding-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'purspose')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'type_of_food')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'sugar_amount')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'hive_id')->textInput() ?>

    <?= $form->field($model, 'ts_insert')->textInput() ?>

    <?= $form->field($model, 'ts_update')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app_frontend', 'Save'), ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
