<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;
/* @var $this yii\web\View */
/* @var $searchModel frontend\models\MatkiSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Matkis';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="matki-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php Pjax::begin(); ?>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Matki', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'kolor_opalitki',
            'rasa',
            'ul_zarodowy',
            'idpnia',
            // 'pienczas',
            // 'idulikaweselnego',
            // 'czasulikaweselnego',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
    <?php Pjax::end(); ?>
</div>
