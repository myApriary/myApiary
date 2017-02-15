<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model frontend\models\Mattingbox */

$this->title = Yii::t('app_frontend', 'Update {modelClass}: ', [
    'modelClass' => 'Matting Box',
]) . $model->id;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app_frontend', 'Matting Boxes'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = Yii::t('app_frontend', 'Update');
?>
<div class="matting-box-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
