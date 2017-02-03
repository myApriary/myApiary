<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model frontend\models\Czujniki */

$this->title = 'Update Czujniki: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Czujnikis', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="czujniki-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
