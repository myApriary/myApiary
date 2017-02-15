<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model frontend\models\Apiaries */

$this->title = ucfirst(Yii::t('app_frontend_bttn','create new apiary'));
$this->params['breadcrumbs'][] = ['label' => ucfirst(Yii::t('app_frontend','apiaries')), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="apiaries-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
