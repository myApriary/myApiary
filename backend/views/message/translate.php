<?php

use yii\helpers\Html;
//use yii\grid\GridView;
use kartik\grid\GridView;
//use kartik\grid\EditableColumn;
use yii\widgets\Pjax;
/* @var $this yii\web\View */
/* @var $searchModel backend\models\MessageSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */
print_r($dataProvider->models);exit;
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
        'pjax'=>false,
        'columns' => [

            [
                'class'=>'kartik\grid\EditableColumn',
                'attribute'=>'message',
                'pageSummary'=>false,
            ],
            [
                'class'=>'kartik\grid\EditableColumn',
                'attribute'=>'category',
                'pageSummary'=>false,
            ],
            [
                'class'=>'kartik\grid\EditableColumn',
                'attribute'=>'language',
                'pageSummary'=>false,
            ],
            //'translation:ntext',
            [
                'class'=>'kartik\grid\EditableColumn',
                'attribute'=>'translation',
                'pageSummary'=>false,
            ],

            ['class' => 'yii\grid\ActionColumn'],

        ],
        
    ]); ?>

</div>
