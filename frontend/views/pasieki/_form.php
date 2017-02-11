<?php

use yii\helpers\Html;
use yii\helpers\ArrayHelper;
//use yii\widgets\ActiveForm;
use kartik\form\ActiveForm;
use kartik\date\DatePicker;

/* @var $this yii\web\View */
/* @var $model frontend\models\Pasieki */
/* @var $form yii\widgets\ActiveForm */
// google api key: AIzaSyCDNigM5ah2vT2IxRNUsyHh0m-3W3qtZYQ
?>


<div class="pasieki-form">

    <?php $form = ActiveForm::begin(); ?>


    
    <?=$form->field($model, 'start_date')->widget(DatePicker::classname(), [
        'options' => ['placeholder' => ''],
        'pluginOptions' => [
            'autoclose'=>true,
            'format'=>'yyyy-mm-dd',
        ]
    ]); ?>
    
    <?=$form->field($model, 'end_date')->widget(DatePicker::classname(), [
        'options' => ['placeholder' => ''],
        'pluginOptions' => [
            'autoclose'=>true,
            'format'=>'yyyy-mm-dd',
        ]
    ]); ?>

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

    <div class="row">
        <div class="col-xs-6">
            <?= $form->field($model, 'type')->dropDownList(frontend\models\Status::dropDown($model->tableName(),'type'),['maxlength' => true]) ?>
        </div>
        <div class="col-xs-6">
            <?= $form->field($model, 'status')->dropDownList(frontend\models\Status::dropDown($model->tableName(),'status'),['maxlength' => true]) ?>
        </div>
    </div> 
        
    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? ucfirst(Yii::t('app_frontend_bttn','create')) : ucfirst(Yii::t('app_frontend_bttn','save')), ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>
    

</div>
