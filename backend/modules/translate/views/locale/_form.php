<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\modules\translate\models\Locale */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="locale-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'language_id')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'language')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'country')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'name_ascii')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'status')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
