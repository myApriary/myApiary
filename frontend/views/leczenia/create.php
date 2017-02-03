<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model frontend\models\Leczenia */

$this->title = 'Create Leczenia';
$this->params['breadcrumbs'][] = ['label' => 'Leczenias', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="leczenia-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
