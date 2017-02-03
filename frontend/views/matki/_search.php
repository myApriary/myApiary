<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model frontend\models\MatkiSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="matki-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
        'options' => [
            'data-pjax' => 1
        ],
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'kolor_opalitki') ?>

    <?= $form->field($model, 'rasa') ?>

    <?= $form->field($model, 'ul_zarodowy') ?>

    <?= $form->field($model, 'idpnia') ?>

    <?php // echo $form->field($model, 'pienczas') ?>

    <?php // echo $form->field($model, 'idulikaweselnego') ?>

    <?php // echo $form->field($model, 'czasulikaweselnego') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
