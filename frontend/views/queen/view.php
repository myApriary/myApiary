<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model frontend\models\Queen */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Queens'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="queen-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a(Yii::t('app', 'Update'), ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a(Yii::t('app', 'Delete'), ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => Yii::t('app', 'Are you sure you want to delete this item?'),
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'mark_disk_color',
            'mark_disk_number',
            'variety',
            'hive.name' => [
                'label' => Yii::t('app_frontend', 'Hive'),
                'attribute' => 'hive.number',
            ],
             'reproductiveHive.name' => [
                'label' => Yii::t('app_frontend', 'Reproductive hive'),
                'attribute' => 'reproductiveHive.number',
            ],
            'hive_time',
            'matting_box_id',
            'matting_box_time',
            'ts_insert',
            'ts_update',
        ],
    ]) ?>

</div>
