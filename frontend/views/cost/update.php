<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model frontend\models\Cost */

$this->title = Yii::t('app_frontend', 'Update {modelClass}: ', [
    'modelClass' => 'Cost',
]) . $model->id;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app_frontend', 'Costs'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = Yii::t('app_frontend', 'Update');
?>
<div class="cost-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
