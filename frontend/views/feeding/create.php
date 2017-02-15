<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model frontend\models\Feeding */

$this->title = Yii::t('app_frontend', 'Create Feeding');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app_frontend', 'Feedings'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="feeding-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
