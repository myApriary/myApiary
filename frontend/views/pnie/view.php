<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model frontend\models\Pnie */

$this->title = $model->name;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app_frontend', 'Pnies'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="pnie-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a(ucfirst(Yii::t('app_frontend_bttn', 'update')), ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a(ucfirst(Yii::t('app_frontend_bttn', 'delete')), ['delete', 'id' => $model->id], [
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
            'pasieka.nazwa',
            'type0.labelT',
            'kindOfFrame0.labelT',
            'capacity',
            'number_of_frames',
            'start_data',
            'end_date',
            'name',
            'family_condition',
        ],
    ]) ?>

</div>
