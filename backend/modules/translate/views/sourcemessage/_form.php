<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\modules\translate\models\Sourcemessage */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="sourcemessage-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'category')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'message')->textarea(['rows' => 6]) ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Save'), ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
