<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model frontend\models\Feeding */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app_frontend', 'Feedings'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="feeding-view">

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
            'purspose',
            'type_of_food',
            'sugar_amount',
            'hive_id',
            'ts_insert',
            'ts_update',
        ],
    ]) ?>

</div>
