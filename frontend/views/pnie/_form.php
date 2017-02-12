<?php

use yii\helpers\Html;
#use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use kartik\form\ActiveForm;
use kartik\date\DatePicker;

/* @var $this yii\web\View */
/* @var $model frontend\models\Pnie */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="pnie-form">

    <?php $form = ActiveForm::begin(); ?>

    

    <div class="row">
     <div class="col-xs-4">
            <?= $form->field($model, 'pasieka')->dropDownList($model->apiaryList())->label(Yii::t('app_frontend','apiary')) ?>
        </div>
        <div class="col-xs-4">
            <?= $form->field($model, 'type')->dropDownList(frontend\models\Status::dropDown($model->tableName(),'type'),['maxlength' => true]) ?>
        </div>
        <div class="col-xs-4">
            <?= $form->field($model, 'kind_of_frame')->dropDownList(frontend\models\Status::dropDown($model->tableName(),'kind_of_frame'),['maxlength' => true]) ?>         
        </div>
    </div> 
    <br/>
    <div class="row">
     <div class="col-xs-3">
            <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>
        </div>
        <div class="col-xs-3">
            <?= $form->field($model, 'capacity')->textInput() ?>
        </div>
        <div class="col-xs-3">
            <?= $form->field($model, 'number_of_frames')->textInput() ?>
        </div>
        <div class="col-xs-3">
            <?= $form->field($model, 'family_condition')->textInput() ?>
        </div>
    </div> 

    
    <div class="row">
     <div class="col-xs-6">
          <?=$form->field($model, 'start_data')->widget(DatePicker::classname(), [
                'options' => ['placeholder' => ''],
                'pluginOptions' => [
                    'autoclose'=>true,
                    'format'=>'yyyy-mm-dd',
                ]
            ]); ?>
        </div>
        <div class="col-xs-6">
            <?=$form->field($model, 'end_date')->widget(DatePicker::classname(), [
                'options' => ['placeholder' => ''],
                'pluginOptions' => [
                    'autoclose'=>true,
                    'format'=>'yyyy-mm-dd',
                ]
            ]); ?>
        </div>
    </div>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app_frontend', 'Save'), ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
