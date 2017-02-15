<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;
/* @var $this yii\web\View */
/* @var $searchModel frontend\models\PasiekiSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */
//\Yii::$app->language = 'pl-PL';
//\Yii::$app->language = 'de-DE';
//\Yii::$app->language = 'en-EN';

$this->title = ucwords(Yii::t('app_frontend','apiaries'));
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="pasieki-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php Pjax::begin(); ?>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a(ucfirst(Yii::t('app_frontend_bttn','create new apiary')), ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'nazwa',
            'lokalizacja',
            'type0.labelT',
            'status0.labelT',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
    <?php Pjax::end(); ?>
</div>
