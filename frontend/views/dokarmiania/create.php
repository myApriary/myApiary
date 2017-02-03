<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model frontend\models\Dokarmiania */

$this->title = 'Create Dokarmiania';
$this->params['breadcrumbs'][] = ['label' => 'Dokarmianias', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="dokarmiania-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
