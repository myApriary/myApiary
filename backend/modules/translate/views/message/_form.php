<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\modules\translate\models\Message */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="message-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'sourcemessage_id')->textInput() ?>

    <?= $form->field($model, 'language_id')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'translation')->textarea(['rows' => 6]) ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
