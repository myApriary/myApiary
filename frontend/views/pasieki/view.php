<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use voime\GoogleMaps\Map;

/* @var $this yii\web\View */
/* @var $model frontend\models\Pasieki */

$this->title = Yii::t('app_frontend','Apiary') . ' ' . $model->nazwa;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app_frontend','Apiaries'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="pasieki-view">

    

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'nazwa',
            'status',
            
        ],
    ]) ?>

    <p>
       <?php
           echo Map::widget([
            'zoom' => 9,
            'center' => [explode(",", $model->lokalizacja, 2)[0],explode(",", $model->lokalizacja, 2)[1]],
            'width' => '100%',
            'height' => '240px',
             'mapType' => Map::MAP_TYPE_HYBRID,
            'apiKey'=> 'AIzaSyCDNigM5ah2vT2IxRNUsyHh0m-3W3qtZYQ',
            'markers' => [
                [
                    'position' => [explode(",", $model->lokalizacja, 2)[0],explode(",", $model->lokalizacja, 2)[1]],
                    'title' => $model->nazwa,
                    'content' => $model->nazwa,
                ],

            ]
           ]);
        ?>
   </p>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
        <?= Html::a('Create new apiary', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

</div>
