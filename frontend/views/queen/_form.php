<?php

use yii\helpers\Html;
//use yii\widgets\ActiveForm;
use kartik\form\ActiveForm;
use yii\helpers\ArrayHelper;
use kartik\date\DatePicker;
/* @var $this yii\web\View */
/* @var $model frontend\models\Queen */
/* @var $form yii\widgets\ActiveForm */
?>


<?php 
$this->registerJs( <<< EOT_JS_CODE

$('#queen-wherein').change(function () {
    $('.drop-down-show-hide').hide();
    $('#queen-hive_id').empty();
    $('#queen-matting_box_id').empty();
    $('#' + this.value).show();

});
     

EOT_JS_CODE
);
?>

<div class="queen-form">

    <?php $form = ActiveForm::begin(); ?>

    
     <div class="row">
        <div class="col-xs-3">
            <?= $form->field($model, 'mark_disk_color')->dropDownList(frontend\models\Status::dropDown($model->tableName(),'mark_disk_color'),['maxlength' => true]) ?>
        </div>
        <div class="col-xs-3">
            <?= $form->field($model, 'mark_disk_number')->textInput() ?>
        </div>
      <div class="col-xs-3">
           <?= $form->field($model, 'reproductive_hive_id')->dropDownList($model->hiveList())->label(Yii::t('app_frontend','Reproductive hive')) ?>
        </div>
        <div class="col-xs-3">
           <?= $form->field($model, 'variety')->textInput(['maxlength' => true]) ?>
        </div>
    </div> 
    

    <div class="row">
         <div class="col-xs-4">
                <?= $form->field($model, 'wherein')->dropDownList($model->getWherein())->label(Yii::t('app_frontend','Where')) ?>
        </div>
    </div>         


    <div class="row drop-down-show-hide" id="hive">
         <div class="col-xs-4">
                <?= $form->field($model, 'hive_id')->dropDownList($model->hiveList())->label(Yii::t('app_frontend','In hive')) ?>
        </div>
        <div class="col-xs-4">
              <?=$form->field($model, 'hive_time')->widget(DatePicker::classname(), [
                'options' => ['placeholder' => ''],
                'pluginOptions' => [
                    'autoclose'=>true,
                    'format'=>'yyyy-mm-dd',
                ]
            ]); ?>
        </div>        
    </div>         

     <div class="row drop-down-show-hide" id="matting" style="display:none">
        <div class="col-xs-4">
           <?= $form->field($model, 'matting_box_id')->textInput(['maxlength' => true])->label(Yii::t('app_frontend','In matting box')) ?>
        </div>
        <div class="col-xs-4">
              <?=$form->field($model, 'matting_box_time')->widget(DatePicker::classname(), [
                'options' => ['placeholder' => ''],
                'pluginOptions' => [
                    'autoclose'=>true,
                    'format'=>'yyyy-mm-dd',
                ]
            ]); ?>
        </div>

        
    </div>         

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Save'), ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
