<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;
/* @var $this yii\web\View */
/* @var $searchModel backend\models\SourceMessageSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Source Messages';
$this->params['breadcrumbs'][] = $this->title;

?>
<div class="source-message-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php Pjax::begin(); ?>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Source Message', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
	<?php

    ?>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'formatter' => ['class' => 'yii\i18n\Formatter','nullDisplay' => ''],
        'columns' => [
            'category',
            'message:ntext',
             [
                 'attribute'=>'language',
                 'value'=> function($data) { 
                    return $data['language'];
                 }
             ],
             [
                 'attribute'=>'translation',
                 'value'=> function($data) { 
                    return $data['translation'];
                 }
             ],

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
    <?php Pjax::end(); ?>
</div>
