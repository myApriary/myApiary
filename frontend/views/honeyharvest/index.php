<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;
/* @var $this yii\web\View */
/* @var $searchModel frontend\models\HoneyharvestSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app_frontend', 'Honeyharvests');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="honeyharvest-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php Pjax::begin(); ?>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a(Yii::t('app_frontend', 'Create Honeyharvest'), ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'honey_amount',
            'kind_of_honey',
            'hive_id',
            'time',
            // 'ts_insert',
            // 'ts_update',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
    <?php Pjax::end(); ?>
</div>
