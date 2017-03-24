<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\modules\translate\models\Message */

$this->title = 'Update Message: ' . $model->sourcemessage_id;
$this->params['breadcrumbs'][] = ['label' => 'Messages', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->sourcemessage_id, 'url' => ['view', 'sourcemessage_id' => $model->sourcemessage_id, 'language_id' => $model->language_id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="message-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
