<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model frontend\models\Ulikiweselne */

$this->title = 'Create Ulikiweselne';
$this->params['breadcrumbs'][] = ['label' => 'Ulikiweselnes', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="ulikiweselne-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
