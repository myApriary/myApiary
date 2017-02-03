<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model frontend\models\Matki */

$this->title = 'Update Matki: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Matkis', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="matki-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
