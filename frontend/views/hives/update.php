<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model frontend\models\Hives */

$this->title = ucfirst(Yii::t('app_frontend', 'Update {modelClass}: ', [
    'modelClass' => Yii::t('app_frontend', 'beehive'),
])) . $model->name;
$this->params['breadcrumbs'][] = ['label' => ucfirst(Yii::t('app_frontend', 'beehives')), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->name, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = Yii::t('app_frontend', 'Update');
?>
<div class="hives-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
