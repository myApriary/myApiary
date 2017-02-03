<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model frontend\models\Matki */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="matki-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'kolor_opalitki')->dropDownList([ '0', '1', '2', '3', '4', ], ['prompt' => '']) ?>

    <?= $form->field($model, 'rasa')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'ul_zarodowy')->textInput() ?>

    <?= $form->field($model, 'idpnia')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'pienczas')->textInput() ?>

    <?= $form->field($model, 'idulikaweselnego')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'czasulikaweselnego')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
