<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model backend\modules\translate\models\Message */

$this->title = $model->sourcemessage_id;
$this->params['breadcrumbs'][] = ['label' => 'Messages', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="message-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'sourcemessage_id' => $model->sourcemessage_id, 'language_id' => $model->language_id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'sourcemessage_id' => $model->sourcemessage_id, 'language_id' => $model->language_id], [
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
            'sourcemessage_id',
            'language_id',
            'translation:ntext',
        ],
    ]) ?>

</div>
