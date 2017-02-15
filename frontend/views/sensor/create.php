<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model frontend\models\Sensor */

$this->title = Yii::t('app_frontend', 'Create Sensor');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app_frontend', 'Sensors'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="sensor-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
