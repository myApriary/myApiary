<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model frontend\models\Koszty */

$this->title = 'Update Koszty: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Koszties', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="koszty-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
