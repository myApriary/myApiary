<?php

namespace backend\modules\translate;

use Yii;

/**
 * translate module definition class
 */
class Module extends \yii\base\Module
{
    
    public $layout = 'main';
    
    /**
     * @inheritdoc
     */
    public $controllerNamespace = 'backend\modules\translate\controllers';

    /**
     * @inheritdoc
     */
    public function init()
    {
        parent::init();
        $this->registerTranslations();

        // custom initialization code goes here
    }
    
    public function registerTranslations()
    {
        Yii::$app->i18n->translations['modules/translate/*'] = [
            'class' => 'yii\i18n\PhpMessageSource',
            'sourceLanguage' => 'en-US',
            'basePath' => dirname(__FILE__).'/modules/translate/messages',
            /*
            'fileMap' => [
                'modules/translate/main' => 'main.php',
            ],
            */
        ];
    }

    public static function t($category, $message, $params = [], $language = null)
    {
        return Yii::t('modules/translate/' . $category, $message, $params, $language);
    }
}
