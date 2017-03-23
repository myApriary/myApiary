<?php

use yii\helpers\Html;
use kartik\grid\GridView;;
use yii\widgets\Pjax;
/* @var $this yii\web\View */
/* @var $searchModel backend\modules\translate\models\LocaleSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Locales';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="locale-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php Pjax::begin(); ?>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

  
    <?= GridView::widget([
        'id' => 'locale',
        'dataProvider'=>$dataProvider,
        'filterModel'=>$searchModel,
        'columns'=>[
            'language_id',
            'language',
            'country',
            'name',
            'name_ascii',
            [
                'class'=>'kartik\grid\BooleanColumn',
                'attribute'=>'status', 
                'vAlign'=>'middle'
            ],
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
            'heading'=>'<h3 class="panel-title"><i class="glyphicon glyphicon-globe"></i>Locale</h3>',
            'before'=>'',
            'after'=>'',
            'footer'=>false,
        ],
        'persistResize'=>false,
    ]); ?>
    
    
</div>
