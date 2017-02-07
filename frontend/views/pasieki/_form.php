<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;


/* @var $this yii\web\View */
/* @var $model frontend\models\Pasieki */
/* @var $form yii\widgets\ActiveForm */
// google api key: AIzaSyCDNigM5ah2vT2IxRNUsyHh0m-3W3qtZYQ
?>


<div class="pasieki-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'id_user')->textInput() ?>

    <?= $form->field($model, 'nazwa')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'lokalizacja')->widget('kolyunya\yii2\widgets\MapInputWidget',
    [
   		'key' => 'AIzaSyCDNigM5ah2vT2IxRNUsyHh0m-3W3qtZYQ',
   		'latitude' => '51.0945308',
        'longitude' => '17.0826728',
        'zoom' => 9,
        'width' => '100%',
        'height' => '420px',
        'animateMarker' => true,
        'enableSearchBar' => true,
        'pattern' => '%latitude%,%longitude%',
        'mapType' => 'hybrid',

    ]
    ); ?>

    <?= $form->field($model, 'status')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>
</div>
