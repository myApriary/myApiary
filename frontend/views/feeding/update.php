<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model frontend\models\Feeding */

$this->title = Yii::t('app_frontend', 'Update {modelClass}: ', [
    'modelClass' => 'Feeding',
]) . $model->id;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app_frontend', 'Feedings'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = Yii::t('app_frontend', 'Update');
?>
<div class="feeding-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
