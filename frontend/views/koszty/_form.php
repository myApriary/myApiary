<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model frontend\models\Koszty */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="koszty-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'kwota')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'opis')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'komentarz')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'emailuzytkownika')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
