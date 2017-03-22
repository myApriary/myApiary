<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model backend\modules\translate\models\Sourcemessage */

$this->title = Yii::t('app', 'Create Sourcemessage');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Sourcemessages'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="sourcemessage-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
