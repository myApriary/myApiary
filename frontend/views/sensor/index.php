<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;
/* @var $this yii\web\View */
/* @var $searchModel frontend\models\SensorSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app_frontend', 'Sensors');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="sensor-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php Pjax::begin(); ?>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a(Yii::t('app_frontend', 'Create Sensor'), ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'sn',
            'name',
            'description',
            'value',
            // 'hive_id',
            // 'ts_insert',
            // 'ts_update',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
    <?php Pjax::end(); ?>
</div>
