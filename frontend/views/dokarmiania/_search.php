<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model frontend\models\DokarmianiaSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="dokarmiania-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
        'options' => [
            'data-pjax' => 1
        ],
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'cel') ?>

    <?= $form->field($model, 'rodzaj_pokarmu') ?>

    <?= $form->field($model, 'ilosc_cukru') ?>

    <?= $form->field($model, 'idpnia') ?>

    <?php // echo $form->field($model, 'czas') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
