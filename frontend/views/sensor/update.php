<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model frontend\models\Sensor */

$this->title = Yii::t('app_frontend', 'Update {modelClass}: ', [
    'modelClass' => 'Sensor',
]) . $model->name;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app_frontend', 'Sensors'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->name, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = Yii::t('app_frontend', 'Update');
?>
<div class="sensor-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
