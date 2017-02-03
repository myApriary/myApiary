<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model frontend\models\Miodobrania */

$this->title = 'Create Miodobrania';
$this->params['breadcrumbs'][] = ['label' => 'Miodobranias', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="miodobrania-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
