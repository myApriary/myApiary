<?php
use kartik\widgets\Select2;
use yii\helpers\ArrayHelper;
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
                'class'=>'kartik\grid\EditableColumn',
                'attribute'=>'translation',
                'format'=>'ntext',
                'editableOptions' => function ($model, $key, $index) {
                    return [
                        'inputType' => 'textArea',
                        'editableValueOptions' => ['style'=>(empty($model->translation)?'color:#F00':''),],
                    ];
                },
                //'pageSummary'=>false,
            ],
            [
                'class' => '\kartik\grid\ActionColumn',
                'template' => '{view} {delete}'
            ]  
        ],
        'containerOptions'=>['style'=>'overflow: auto'], // only set when $responsive = false
        'headerRowOptions'=>['class'=>'kartik-sheet-style'],
        'filterRowOptions'=>['class'=>'kartik-sheet-style'],
        'pjax'=>false,
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
            'before'=>'<div class="row"><div class="col-md-4"><form>'.Select2::widget([
                'model' => $searchModel,
                //'value' => $locale_model->language_id,
                'size' => 'sm',
                'attribute' => 'language',
                'data' => ArrayHelper::map(backend\modules\translate\models\Locale::find()->asArray()->all(), 'language_id', 'name'),
                'options' => ['placeholder' => 'Select a locale ...'],
                'pluginOptions' => [
                    'allowClear' => true
                ],
                'pluginEvents' => [
                     "change" => "function() { this.form.submit(); }",
                ],
            ]).'</form></div></div>',
        ],
        'persistResize'=>false,
    ]); ?>


</div>
