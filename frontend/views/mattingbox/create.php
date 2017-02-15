<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model frontend\models\Mattingbox */

$this->title = Yii::t('app_frontend', 'Create Matting Box');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app_frontend', 'Matting Boxes'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="matting-box-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
