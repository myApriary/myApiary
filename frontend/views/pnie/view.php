<?php

use yii\helpers\Html;
use yii\widgets\DetailView;


/* @var $this yii\web\View */
/* @var $model frontend\models\Pnie */

//$this->title = $model->number;
$this->params['breadcrumbs'][] = ['label' => ucfirst(Yii::t('app_frontend', 'beehives')), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="pnie-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'pasieka.nazwa' => [
                'label' => Yii::t('app_frontend', 'apiary'),
                'attribute' => 'pasieka.nazwa',
            ],
            'number',
            'name',
            'type0.labelT',
            'kindOfFrame0.labelT',
            'capacity',
            'number_of_frames',
            'start_date',
              [
                'attribute' => 'end_date',
                'visible' => (empty($model->end_date)? false : true)
            ],
            

            'family_condition',
        ],
    ]) ?>

   <br>
    <div class="row">
        <div class="col-xs-12">
            <?= Html::a(ucfirst(Yii::t('app_frontend_bttn', 'update')), ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
            <?= Html::a(ucfirst(Yii::t('app_frontend_bttn', 'delete')), ['delete', 'id' => $model->id], [
                'class' => 'btn btn-danger',
                'data' => [
                    'confirm' => Yii::t('app_frontend', 'Are you sure you want to delete this item?'),
                    'method' => 'post',
                ],
            ]) ?>
        </div>
    </div>

</div>
