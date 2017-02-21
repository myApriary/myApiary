<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "SourceMessage".
 *
 * @property int $id
 * @property string $category
 * @property string $message
 *
 * @property Message[] $messages
 */
class SourceMessage extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'SourceMessage';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id'], 'integer'],
            [['message', 'category',], 'required'],
            [['message'], 'string'],
            [['category'], 'string', 'max' => 32],
            [['message', 'category'], 'unique', 'targetAttribute' => ['message', 'category']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'id',
            'category' => 'category',
            'message' => 'message',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getMessages()
    {
        return $this->hasMany(Message::className(), ['id' => 'id']);
    }
    
    public function sourceList(){

        return \yii\helpers\ArrayHelper::map(SourceMessage::find()->all(),'id', 'catMes');
    }
    
    public function getCatMes() {
        return $this->category.' - '.$this->message;
    }
}
