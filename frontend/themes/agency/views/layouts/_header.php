   <!-- Navigation -->
   <?php
    use yii\helpers\Html;
    use yii\bootstrap\Nav;
    use yii\bootstrap\NavBar;
    use yii\helpers\ArrayHelper;
    use yii\widgets\Breadcrumbs;
    use common\widgets\Alert;
    use kartik\widgets\SideNav;
    use kartik\icons\Icon;
    $class = !isset($class)?'':$class;
    if(Yii::$app->layout == 'homepage'){
        $menuItems[] = [
            'label' => Yii::t('app_frontend', 'contact'),
            'url' => 'site/contact',            
        ];
    }else{
          $menus = [
    
        ];
    }
   ?>

<?php
    $options = ['navbar','navbar-default','navbar-fixed-top', 'navbar-custom'];
    NavBar::begin([
        'id'=>'mainNav',
        'brandLabel' => Html::img('@web/images/logo.png', ['alt'=>'myApiary', 'class'=>'pull-left']) . '<span>&nbsp;&nbsp myApiary</span>' ,
        'brandUrl' => Yii::$app->homeUrl,    'brandOptions'=>[
            'class'=>'navbar-header page-scroll'
        ],
        'options' => [
            'class' => 'navbar navbar-default navbar-fixed-top navbar-custom '.$class,
        ],
    ]);
    
  if (Yii::$app->user->isGuest) {
        $menuItems[] = ['label' => Yii::t('app_frontend','Sign in'), 'url' => ['/user/security/login']];
    } else {
        $menuItems = [
            ['label' => 'Home', 'url' => ['/site/index']],
        ];
        $menuItems[] = [
            'label' => Yii::t('app_frontend', 'manage'), 
            'url' => ['/apiaries'],
        ];
        $menuItems[] = [
            'label' => Yii::t('app_frontend', 'Logout') . ' (' . Yii::$app->user->identity->username . ')', 
            'url' => ['/user/security/logout'],
            'linkOptions' => ['data-method' => 'post']
        ];
        $menuItems[] = [
            'label' => Yii::t('app_frontend', 'My Account'),
            'items' => [
                [
                    'label' => Yii::t('app_frontend', 'Password reset'),
                    'url' => ['/user/recovery/reset'],
                    //'linkOptions' => ['data-method' => 'post'],
                ],
                [
                    'label' => Yii::t('app_frontend', 'Profile settings'),
                    'url' => ['/user/settings/profile'],
                    //'linkOptions' => ['data-method' => 'post'],
                ],
                [
                    'label' => Yii::t('app_frontend', 'Account settings'),
                    'url' => ['/user/settings/account'],
                    //'linkOptions' => ['data-method' => 'post'],
                ],
                [
                    'label' => Yii::t('app_frontend', 'Social network accounts settings'),
                    'url' => ['/user/settings/networks'],
                    //'linkOptions' => ['data-method' => 'post'],
                ],
            ],
        ];
    }
    $menuItems[] = ['label' => 'EN', 'url' => [substr(\yii\helpers\Url::current(), 3), 'language' => 'en'], 'active'=>Yii::$app->language==='en-US',];
    $menuItems[] = ['label' => 'PL', 'url' => [substr(\yii\helpers\Url::current(), 3), 'language' => 'pl'], 'active'=>Yii::$app->language==='pl-PL',];
   
    echo Nav::widget([
        'options' => ['class' => 'navbar-nav navbar-right'],
        
        'items' => $menuItems,
    ]);
    NavBar::end();
?>
