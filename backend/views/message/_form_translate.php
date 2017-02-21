<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use kartik\select2\Select2;

/* @var $this yii\web\View */
/* @var $model backend\models\SourceMessage */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="message-form">

    <?php $form = ActiveForm::begin(['action' =>['create-translate']]); ?>

        <div class="row">
 		    <div class="col-md-12">
		    	<?= $form->field($model, 'id', ['enableClientValidation'=>false])->widget(Select2::classname(), [
				    //'name' => 'id',
				    'data' => backend\models\SourceMessage::sourceList(),
				    'size' => Select2::LARGE,
				    'options' => ['placeholder' => 'chose source and context...'],
				    'pluginOptions' => [
				        'allowClear' => true
				    ],
				])->label('source and context'); ?>
			</div>		
		</div>
        <p>Or new context and message</p>
        <div class="row">
        	<div class="col-md-12">
                <?= $form->field($modelSM, 'category')->textInput(['maxlength' => true,]) ?>
            </div>
        </div>
        <div class="row">
        	<div class="col-md-12">
                <?= $form->field($modelSM, 'message')->textarea(['rows' => 1]) ?>
            </div>
        </div>
        
		<div class="row">
        	<div class="col-md-12">
		    	<?= $form->field($model, 'language')->dropDownList(['pl-PL'=>'pl-PL','de-DE'=>'de-DE']) ?>
			</div>
		</div>
		
		<br/>
		
		<?= $form->field($model, 'translation')->textInput() ?>
		
		<br/>
		
		<div class="row">
	 		<div class="col-xs-12">
			        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
			</div>
		</div>



    <?php ActiveForm::end(); ?>

</div>
