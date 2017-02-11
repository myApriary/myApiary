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
            'format'=>'yyyy-MM-dd',
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

    
    <?= $form->field($model, 'type')->dropDownList(ArrayHelper::map(frontend\models\Status::find()->where(['table_name' => $model->tableName(), 'column_name'=>'type'])->all(), 'id', 'labelT'), ['maxlength' => true, 'prompt'=>'']) ?>

    <?= $form->field($model, 'status')->dropDownList(ArrayHelper::map(frontend\models\Status::find()->where(['table_name' => $model->tableName(), 'column_name'=>'status'])->all(), 'id', 'labelT'), ['maxlength' => true, 'prompt'=>'']) ?>
    
    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>
    

</div>
