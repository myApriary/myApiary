<?php

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

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'pjax'=>true,
        'columns' => [

            [
                'class'=>'kartik\grid\EditableColumn',
                
                'attribute'=>'message',
                'pageSummary'=>false,

            ],
            [
                'class'=>'kartik\grid\EditableColumn',

                'editableOptions' => function ($model, $key, $index, $widget) {
                   // print_r($column);
                    return [
                        //'inputType'=>\kartik\editable\Editable::INPUT_TEXT,
                        
                        'inputFieldConfig' => [
                            //'model' => $model->source,
                            //'attribute' => 'category',
                            'inputOptions' => ['name' => $model->source->formName().'['.$model->id.']['.$widget->attribute.']'],
                        ],
                        
                        //'model' => $model->source,
                        //'attribute' => 'category',
                        'name'=>'sdfsdfs',

                        'formOptions'=>['action' => ['/source-message/edittranslation']],
                    ];
                },
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
