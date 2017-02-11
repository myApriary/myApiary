<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use kartik\select2\Select2;

/* @var $this yii\web\View */
/* @var $model backend\models\SourceMessage */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="message-form">

    <?php $form = ActiveForm::begin(); ?>


 		<div class="row">
 		    <div class="col-md-12">
		    	<?= $form->field($model, 'id')->widget(Select2::classname(), [
				    'name' => 'id',
				    'data' => $model->sourceList(),
				    'size' => Select2::LARGE,
				    'options' => ['placeholder' => 'source...'],
				    'pluginOptions' => [
				        'allowClear' => true
				    ],
				])->label('source'); ?>
			</div>		
		</div>
		<br/>
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
