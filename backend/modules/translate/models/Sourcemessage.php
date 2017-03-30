<?php

namespace backend\modules\translate\models;

use Yii;

/**
 * This is the model class for table "sourcemessage".
 *
 * @property int $id
 * @property string $category
 * @property string $message
 *
 * @property Message[] $messages
 */
class Sourcemessage extends \yii\db\ActiveRecord
{
    
    public $language;
    
    public function init() {
 
        parent::init();
 
        if(Yii::$app->session->has('u_lang') )
            $this->language = Yii::$app->session->get('u_lang');
        else
            $this->language = Yii::$app->language;
    }
    
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'sourcemessage';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['message', 'translation'], 'string'],
            [['category'], 'string', 'max' => 32],
            [['language'], 'string', 'max' => 5],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'category' => 'Category',
            'message' => 'Message',
            'translation' => 'Translation',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getMessages()
    {
        return $this->hasMany(Message::className(), ['id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTranslations()
    {
        
        return $this->hasOne(Message::className(), ['id' => 'id'])
            ->andOnCondition('message.language = :language', [':language' => $this->language]);
    }

    public function getTranslation()
    {
        if(empty($this->id) || empty($this->language)) {
            return null;
        }
        
        if (empty($this->translations)) {
            return null;
        }
        return $this->translations->translation;
    }
}
