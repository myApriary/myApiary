<?php

namespace backend\models;

use Yii;
use yii\helpers\ArrayHelper;


/**
 * This is the model class for table "Message".
 *
 * @property int $id
 * @property string $language
 * @property string $translation
 *
 * @property SourceMessage $id0
 */
class Message extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'Message';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'language',], 'required'],
            [['id'], 'integer'],
            [['translation'], 'string'],
            [['language'], 'string', 'max' => 16],
            [['id'], 'exist', 'skipOnError' => true, 'targetClass' => SourceMessage::className(), 'targetAttribute' => ['id' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'id',
            'language' => 'language',
            'translation' => 'translation',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getId0()
    {
        return $this->hasOne(SourceMessage::className(), ['id' => 'id']);
    }

    public function sourceList(){

        return ArrayHelper::map(SourceMessage::find()->all(),'id', 'message');
    }

    public function getSource()
    {
        return $this->hasOne(SourceMessage::className(), ['id' => 'id']);
    }

    public function getCategory()
    {
        return $this->source->category;
    }

    public function getMessage()
    {
        return $this->source->message;
    }

    public static function primaryKey()
    {
        return array('index0');
    }
}
