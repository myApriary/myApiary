<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\modules\translate\models\LocaleSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="locale-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
        'options' => [
            'data-pjax' => 1
        ],
    ]); ?>

    <?= $form->field($model, 'language_id') ?>

    <?= $form->field($model, 'language') ?>

    <?= $form->field($model, 'country') ?>

    <?= $form->field($model, 'name') ?>

    <?= $form->field($model, 'name_ascii') ?>

    <?php // echo $form->field($model, 'status') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
