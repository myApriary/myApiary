<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model frontend\models\PnieSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="pnie-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
        'options' => [
            'data-pjax' => 1
        ],
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'id_pasieki') ?>

    <?= $form->field($model, 'typ') ?>

    <?= $form->field($model, 'rodzaj_ramki') ?>

    <?= $form->field($model, 'pojemnosc') ?>

    <?php // echo $form->field($model, 'ilosc_ramek') ?>

    <?php // echo $form->field($model, 'data') ?>

    <?php // echo $form->field($model, 'nazwa') ?>

    <?php // echo $form->field($model, 'sila_rodziny') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
