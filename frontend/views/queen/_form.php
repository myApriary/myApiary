<?php

use yii\helpers\Html;
//use yii\widgets\ActiveForm;
use kartik\form\ActiveForm;
use yii\helpers\ArrayHelper;
/* @var $this yii\web\View */
/* @var $model frontend\models\Queen */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="queen-form">

    <?php $form = ActiveForm::begin(); ?>

    
     <div class="row">
        <div class="col-xs-6">
            <?= $form->field($model, 'mark_disk_color')->dropDownList(frontend\models\Status::dropDown($model->tableName(),'mark_disk_color'),['maxlength' => true]) ?>
        </div>
        <div class="col-xs-6">
            <?= $form->field($model, 'mark_disk_number')->textInput() ?>
        </div>
    </div> 
    

    <div class="row">
     <div class="col-xs-4">
            <?= $form->field($model, 'hive_id')->dropDownList($model->hiveList())->label(Yii::t('app_frontend','hive')) ?>
        </div>
        <div class="col-xs-4">
            <?= $form->field($model, 'reproductive_hive_id')->dropDownList($model->hiveList())->label(Yii::t('app_frontend','reproductive hive')) ?>
        </div>
        <div class="col-xs-4">
            <?= $form->field($model, 'variety')->textInput(['maxlength' => true]) ?>
        </div>
        
    </div>         

    

    
    <?= $form->field($model, 'hive_time')->textInput() ?>

    <?= $form->field($model, 'matting_box_id')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'matting_box_time')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Save'), ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
