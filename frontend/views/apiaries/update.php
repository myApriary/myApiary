<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model frontend\models\Apiaries */

$this->title = ucfirst(Yii::t('app_frontend_bttn','update')) . ' ' . $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Apiariy', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="apiaries-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
