<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model frontend\models\Cost */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="cost-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'amount')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'description')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'comment')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'user_id')->textInput() ?>

    <?= $form->field($model, 'ts_insert')->textInput() ?>

    <?= $form->field($model, 'ts_update')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app_frontend', 'Save'), ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
