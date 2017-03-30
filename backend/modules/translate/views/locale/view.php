<?php
use kartik\detail\DetailView;
use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\modules\translate\models\Locale */

$this->title = $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Locales', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="locale-view">

    <?= DetailView::widget([
        'model'=>$model,
        'mode' => (empty($model->language_id)?'edit':'view'),
        'bordered' => true,
        'striped' => true,
        'condensed' => true,
        'responsive' => false,
        'hover' => false,
        'hAlign'=>'center',
        'vAlign'=>'middle',
        'fadeDelay'=>500,
        'panel'=>[
            'heading'=>'# '.$model->language_id,
            //'type'=>DetailView::TYPE_INFO,
        ],
        'attributes' => [
            'language_id',
            'language',
            'country',
            'name',
            'name_ascii',
            [
                'attribute'=>'status', 
                'label'=>'Available?',
                'format'=>'raw',
                'value'=>$model->status ? 
                    '<span class="label label-success">Yes</span>' : 
                    '<span class="label label-danger">No</span>',
                'type'=>DetailView::INPUT_SWITCH,
                'widgetOptions'=>[
                    'pluginOptions'=>[
                        'onText'=>'Yes',
                        'offText'=>'No',
                    ]
                ]
            ],
        ],
        'deleteOptions'=>[
            'params' => ['custom_param'=>true],
            'url'=>['delete', 'id' => $model->language_id],
        ]
    ]); ?>

</div>
