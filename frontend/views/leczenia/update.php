<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model frontend\models\Leczenia */

$this->title = 'Update Leczenia: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Leczenias', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="leczenia-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
