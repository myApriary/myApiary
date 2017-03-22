<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\modules\translate\models\Locale */

$this->title = 'Update Locale: ' . $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Locales', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->name, 'url' => ['view', 'id' => $model->language_id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="locale-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
