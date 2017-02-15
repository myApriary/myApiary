<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model frontend\models\Sensor */

$this->title = $model->name;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app_frontend', 'Sensors'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="sensor-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a(Yii::t('app_frontend', 'Update'), ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a(Yii::t('app_frontend', 'Delete'), ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => Yii::t('app_frontend', 'Are you sure you want to delete this item?'),
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'sn',
            'name',
            'description',
            'value',
            'hive_id',
            'ts_insert',
            'ts_update',
        ],
    ]) ?>

</div>
