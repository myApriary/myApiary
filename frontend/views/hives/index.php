<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;

/* @var $this yii\web\View */
/* @var $searchModel frontend\models\PnieSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = ucfirst(Yii::t('app_frontend', 'beehives'));
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="pnie-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php Pjax::begin(); ?>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a(ucfirst(Yii::t('app_frontend_bttn', 'create')) . ' ' . Yii::t('app_frontend', 'beehive')  , ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'pasieka.nazwa' => [
                'label' => Yii::t('app_frontend', 'apiary'),
                'value' => 'pasieka.nazwa',
            ],
            'type0.labelT',
            'kindOfFrame0.labelT',
            'number',
            'name',
            'capacity',
            'number_of_frames',
            // 'start_date',
            // 'end_date',
            // 'ts_insert',
            // 'ts_update',
            // 'name',
            'family_condition',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
    <?php Pjax::end(); ?>
</div>
