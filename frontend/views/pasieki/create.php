<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model frontend\models\Pasieki */

$this->title = 'create new apiary';
$this->params['breadcrumbs'][] = ['label' => 'apriaries', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="pasieki-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
