<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model frontend\models\CzujnikiSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="czujniki-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
        'options' => [
            'data-pjax' => 1
        ],
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'sn') ?>

    <?= $form->field($model, 'nazwa') ?>

    <?= $form->field($model, 'opis') ?>

    <?= $form->field($model, 'wartosc') ?>

    <?php // echo $form->field($model, 'idpnia') ?>

    <?php // echo $form->field($model, 'czas') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
