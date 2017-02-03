<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model frontend\models\Leczenia */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Leczenias', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="leczenia-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'cel',
            'rodzaj_leku',
            'ilosc_leku',
            'idpnia',
            'czas',
        ],
    ]) ?>

</div>
