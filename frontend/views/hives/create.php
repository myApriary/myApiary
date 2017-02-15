<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model frontend\models\Pnie */

$this->title = ucfirst(Yii::t('app_frontend_bttn','create')) . ' ' . Yii::t('app_frontend','beehive');
$this->params['breadcrumbs'][] = ['label' => ucfirst(Yii::t('app_frontend', 'beehives')), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="pnie-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
