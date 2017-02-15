<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model frontend\models\Treatment */

$this->title = Yii::t('app_frontend', 'Create Treatment');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app_frontend', 'Treatments'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="treatment-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
