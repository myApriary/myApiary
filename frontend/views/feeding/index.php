<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;
/* @var $this yii\web\View */
/* @var $searchModel frontend\models\FeedingSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app_frontend', 'Feedings');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="feeding-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php Pjax::begin(); ?>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a(Yii::t('app_frontend', 'Create Feeding'), ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'purspose',
            'type_of_food',
            'sugar_amount',
            'hive_id',
            // 'ts_insert',
            // 'ts_update',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
    <?php Pjax::end(); ?>
</div>
