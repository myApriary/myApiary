<?php

use yii\helpers\Html;
#use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use kartik\form\ActiveForm;
use kartik\date\DatePicker;
use kartik\slider\Slider;

/* @var $this yii\web\View */
/* @var $model frontend\models\Hives */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="hives-form">

    <?php $form = ActiveForm::begin(); ?>
    
    <div class="row">
     <div class="col-xs-4">
            <?= $form->field($model, 'apiary_id')->dropDownList($model->apiaryList())->label(Yii::t('app_frontend','apiary')) ?>
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
        <div class="col-xs-2">
            <?= $form->field($model, 'number')->textInput(['maxlength' => true]) ?>
        </div>
        <div class="col-xs-3">
            <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>
        </div>
        <div class="col-xs-2">
            <?= $form->field($model, 'capacity')->textInput() ?>
        </div>
        <div class="col-xs-2">
            <?= $form->field($model, 'number_of_frames')->textInput() ?>
        </div>
        <div class="col-xs-2">
           <?= $form->field($model, 'family_condition')->widget(Slider::classname(), [
                'name'=>'family_condition',
                //'value'=>3,
                'pluginOptions'=>[
                    'min'=>1,
                    'max'=>5,
                    'step'=>1,
                    'tooltip'=>'always',
                    'formatter'=>new yii\web\JsExpression('function(val) { 
                        if (val == 1) {
                            return "'.ucfirst(Yii::t('app_frontend_female','poor')).'";
                        }
                        if (val == 2) {
                            return "'.ucfirst(Yii::t('app_frontend_female','fair')).'";
                        }
                        if (val == 3) {
                            return "'.ucfirst(Yii::t('app_frontend_female','good')).'";
                        }
                        if (val == 4) {
                            return "'.ucfirst(Yii::t('app_frontend_female','excellent')).'";
                        }
                         if (val == 5) {
                            return "'.ucfirst(Yii::t('app_frontend_female','Brilliant')).'";
                        }
                    }')
                ]
            ]);
        ?>
        </div>
    </div> 

    
    <div class="row">
     <div class="col-xs-6">
          <?=$form->field($model, 'start_date')->widget(DatePicker::classname(), [
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
        <?= Html::submitButton(ucfirst(Yii::t('app_frontend_bttn', 'save')), ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
