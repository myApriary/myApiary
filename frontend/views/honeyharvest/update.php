<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model frontend\models\Honeyharvest */

$this->title = Yii::t('app_frontend', 'Update {modelClass}: ', [
    'modelClass' => 'Honeyharvest',
]) . $model->id;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app_frontend', 'Honeyharvests'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = Yii::t('app_frontend', 'Update');
?>
<div class="honeyharvest-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
