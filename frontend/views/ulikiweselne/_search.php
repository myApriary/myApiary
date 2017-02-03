<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model frontend\models\UlikiweselneSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="ulikiweselne-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
        'options' => [
            'data-pjax' => 1
        ],
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'typ') ?>

    <?= $form->field($model, 'rodzaj_ramki') ?>

    <?= $form->field($model, 'pojemnosc') ?>

    <?= $form->field($model, 'ilosc_ramek') ?>

    <?php // echo $form->field($model, 'data') ?>

    <?php // echo $form->field($model, 'nazwapasieki') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
