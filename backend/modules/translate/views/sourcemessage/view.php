<?php

use yii\helpers\Html;
use kartik\detail\DetailView;

/* @var $this yii\web\View */
/* @var $model backend\modules\translate\models\Sourcemessage */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Sourcemessages'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="sourcemessage-view">

    <?= DetailView::widget([
        'model'=>$model,
        'mode' => (empty($model->id)?'edit':'view'),
        'bordered' => true,
        'striped' => true,
        'condensed' => true,
        'responsive' => false,
        'hover' => false,
        'hAlign'=>'center',
        'vAlign'=>'middle',
        'fadeDelay'=>500,
        'panel'=>[
            'heading'=>'# '.$model->id,
            //'type'=>DetailView::TYPE_INFO,
        ],
        'attributes' => [
            [
                'attribute'=>'id',
                'displayOnly'=>true,
            ],
            'category',
            [
                'attribute'=>'message',
                'format'=>'ntext',
                'type'=>DetailView::INPUT_TEXTAREA, 
                'options'=>['rows'=>4]
            ]
        ],
        'deleteOptions'=>[
            'params' => ['custom_param'=>true],
            'url'=>['delete', 'id' => $model->id],
        ]
    ]); ?>


</div>
