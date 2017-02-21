<?php
use yii\bootstrap\Modal;
use yii\helpers\Html;
//use yii\grid\GridView;
use kartik\grid\GridView;
//use kartik\grid\EditableColumn;
use yii\widgets\Pjax;
/* @var $this yii\web\View */
/* @var $searchModel backend\models\MessageSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */
//print_r($dataProvider->keys());exit;
$this->title = 'Messages';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="message-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Message', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?php 
        Modal::begin([
            'options' => [
                'id' => 'kartik-modal',
                'tabindex' => false // important for Select2 to work properly
            ],
            'header' => '<h4 style="margin:0; padding:0">Create new message</h4>',
            'toggleButton' => ['label' => 'Create Message', 'class' => 'btn btn-success'],
        ]);
        echo $this->render('_form_translate', [
            'model' => $model,
            'modelSM' => $modelSM,
        ]);
        Modal::end();
    ?>
    
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        
        'pjax'=>true,
        'columns' => [

            [
                'class'=>'kartik\grid\EditableColumn',
                'editableOptions' => [
                    'formOptions'=>['action' => ['/message/edittranslation']],
                ],                

                'pageSummary'=>false,
				'attribute' => 'message',
            ],

            [
                'class'=>'kartik\grid\EditableColumn',
                'editableOptions' => [
                    'formOptions'=>['action' => ['/message/edittranslation']],
                ],
                'attribute' => 'category',
                'pageSummary'=>false,
            ],
            [
                'class'=>'kartik\grid\EditableColumn',
                'editableOptions' => [
                    'formOptions'=>['action' => ['/message/edittranslation']],
                ],
                'attribute'=>'language',
                'pageSummary'=>false,
            ],
            //'translation:ntext',
           
            [
                'class'=>'kartik\grid\EditableColumn',
                'editableOptions' => [
                    'formOptions'=>['action' => ['/message/edittranslation']],
                ],
                'attribute'=>'translation',
                'pageSummary'=>false,
            ], 

            ['class' => 'yii\grid\ActionColumn'],

        ],
        
    ]); ?>

</div>
