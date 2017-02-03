<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model frontend\models\Koszty */

$this->title = 'Create Koszty';
$this->params['breadcrumbs'][] = ['label' => 'Koszties', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="koszty-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
