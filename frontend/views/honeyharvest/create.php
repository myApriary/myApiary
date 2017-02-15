<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model frontend\models\Honeyharvest */

$this->title = Yii::t('app_frontend', 'Create Honeyharvest');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app_frontend', 'Honeyharvests'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="honeyharvest-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
