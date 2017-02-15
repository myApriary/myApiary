<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model frontend\models\Queen */

$this->title = Yii::t('app', 'Create Queen');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Queens'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="queen-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
