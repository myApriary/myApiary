<?php
use common\widgets\Alert;
use kartik\widgets\SideNav;
use kartik\icons\Icon;
use yii\helpers\Url;
use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use frontend\assets\AppAsset;

?>

<?php $this->beginContent('@frontend/themes/agency/views/layouts/_base.php'); ?>
<?= $this->render('_header',['class'=>'affix']) ?>

 <section class="pages" >
        <div class="container">
           		<?php if(!Yii::$app->user->isGuest): ?>
		<?= Alert::widget() ?>
        <div class="row">
            <div class="col-md-2">
                <?php 
                
                if (!Yii::$app->user->isGuest) {
                 $type = SideNav::TYPE_WARNING;
                 echo SideNav::widget([
                    'type' => $type, 
                    'encodeLabels' => false,
                    'activateItems' => true,
                    'heading' => false,
                    'itemOptions' => [
                    ],
                    'items' => [
                        [
                            'url' => '/',
                            'label' => Icon::show('home',['style'=>'width:25px']) . 'Home',
                            //'icon' => 'home',
                            'active' => Yii::$app->controller->id==='site',
                            'type' => $type,
                        ],
                        [
                            'url' => Url::to(['/apiaries/view?id=1']),
                            'label' => Icon::show('cubes',['style'=>'width:25px']) . ucwords(Yii::t('app_frontend','apiaries')),
                            //'icon' => 'glyphicon glyphicon-globe',
                            'active' => Yii::$app->controller->id==='apiaries',
                        ],
                        [
                            'url' => Url::to(['/hives/index']),
                            'label' => Icon::show('archive',['style'=>'width:25px']) . ucwords(Yii::t('app_frontend','beehives')),
                            //'icon' => 'glyphicon glyphicon-book',
                            'active' => Yii::$app->controller->id==='hives',
                        ],
                        [
                            'url' => Url::to(['/queen/index']),
                            'label' => Icon::show('venus',['style'=>'width:25px']) . Yii::t('app_frontend','Queen bees'),
                            //'icon' => 'glyphicon glyphicon-book',
                            'active' => Yii::$app->controller->id==='queen',
                        ],
                        [
                            'url' => Url::to(['/mattingbox/index']),
                            'label' => Icon::show('venus-mars',['style'=>'width:25px']) . Yii::t('app_frontend','Mating boxes'),
                            //'icon' => 'glyphicon glyphicon-book',
                            'active' => Yii::$app->controller->id==='mattingbox',
                        ],     
                        [
                            'url' => Url::to(['/honeyharvest/index']),
                            'label' => Icon::show('battery-half',['style'=>'width:25px']) . Yii::t('app_frontend','Honey harvests'),
                            //'icon' => 'glyphicon glyphicon-book',
                            'active' => Yii::$app->controller->id==='honeyharvest',
                        ],
                        [
                            'url' => Url::to(['/feeding/index']),
                            'label' => Icon::show('cutlery',['style'=>'width:25px']) . ucwords(Yii::t('app_frontend','feeding')),
                            //'icon' => 'glyphicon glyphicon-book',
                            'active' => Yii::$app->controller->id==='feeding',
                        ],
                        [
                            'url' => Url::to(['/treatment/index']),
                            'label' => Icon::show('medkit',['style'=>'width:25px']) . Yii::t('app_frontend','Treatments'),
                            //'icon' => ,
                            'active' => Yii::$app->controller->id==='treatment',
                        ],   
                        [
                            'url' => Url::to(['/sensor/index']),
                            'label' => Icon::show('thermometer',['style'=>'width:25px']) . Yii::t('app_frontend','Sensors'),
                            //'icon' => 'glyphicon glyphicon-book',
                            'active' => Yii::$app->controller->id==='sensor',
                        ],
                        [
                            'url' => Url::to(['/cost/index']),
                            'label' => Icon::show('usd',['style'=>'width:25px']) . Yii::t('app_frontend','Costs'),
                            //'icon' => 'glyphicon glyphicon-book',
                            'active' => Yii::$app->controller->id==='cost',
                        ],
  
                      
                    ],
                ]);}; ?>             
            </div>
            <div class="col-md-10">
                <?php echo Breadcrumbs::widget([
                        'homeLink' => [
                            'label' => '<i class=" glyphicon glyphicon-home"></i>',
                            'url' => Yii::$app->homeUrl,
                            'encode' => false// Requested feature
                        ],
                        'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
                ]); ?>
                <?= $content ?>
            </div>
        </div>
		<?php else: ?>
			<?= $content ?>
		<?php endif ?>
        </div>
</section>


<?= $this->render('_footer.php') ?>

<?php $this->endContent(); ?>

