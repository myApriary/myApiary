<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;
/* @var $this yii\web\View */
/* @var $searchModel frontend\models\UlikiweselneSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Ulikiweselnes';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="ulikiweselne-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php Pjax::begin(); ?>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Ulikiweselne', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'typ',
            'rodzaj_ramki',
            'pojemnosc',
            'ilosc_ramek',
            // 'data',
            // 'nazwapasieki',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
    <?php Pjax::end(); ?>
</div>
