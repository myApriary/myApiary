<?php

use yii\helpers\Html;
use kartik\grid\GridView;
use yii\widgets\Pjax;
/* @var $this yii\web\View */
/* @var $searchModel backend\modules\translate\models\SourcemessageSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'Sourcemessages');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="sourcemessage-index">

    <?php Pjax::begin(); ?>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>
    <?php Pjax::end(); ?>
    
    <?= GridView::widget([
        'id' => 'sourcemessage',
        'dataProvider'=>$dataProvider,
        'filterModel'=>$searchModel,
        'columns'=>[
            'category',
            'message:ntext',
            [
                'class' => '\kartik\grid\ActionColumn',
                'template' => '{view} {delete}'
            ]  
        ],
        'containerOptions'=>['style'=>'overflow: auto'], // only set when $responsive = false
        'headerRowOptions'=>['class'=>'kartik-sheet-style'],
        'filterRowOptions'=>['class'=>'kartik-sheet-style'],
        'pjax'=>true,
        'pjaxSettings'=>[
            'neverTimeout'=>true,
            //'beforeGrid'=>'My fancy content before.',
            //'afterGrid'=>'My fancy content after.',
        ],
        'toolbar'=> [
            ['content'=>
                Html::a('<i class="glyphicon glyphicon-plus"></i>', ['view'], ['data-pjax'=>1, 'class'=>'btn btn-success', 'title'=>'New']) . ' '.
                Html::a('<i class="glyphicon glyphicon-repeat"></i>', ['index'], ['data-pjax'=>1, 'class'=>'btn btn-default', 'title'=>'Reset Grid'])
            ],
            '{toggleData}',
        ],
        // set export properties
        'export'=>false,
        'exportConfig'=>false,
        'bordered'=>true,
        'striped'=>true,
        'condensed'=>true,
        'responsive'=>false,
        'hover'=>false,
        'showPageSummary'=>false,
        'panel'=>[
            'type'=>GridView::TYPE_PRIMARY,
            'heading'=>'<h3 class="panel-title"><i class="glyphicon glyphicon-globe"></i> Source message</h3>',
            'before'=>'',
            'after'=>'',
            'footer'=>false,
        ],
        'persistResize'=>false,
    ]); ?>


</div>
