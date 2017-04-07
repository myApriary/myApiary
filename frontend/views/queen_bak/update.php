<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model frontend\models\Queen */

$this->title = Yii::t('app', 'Update {modelClass}: ', [
    'modelClass' => 'Queen',
]) . $model->id;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Queens'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = Yii::t('app', 'Update');
?>
<div class="queen-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
