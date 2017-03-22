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
 * @property Locale[] $languages
 */
class Sourcemessage extends \yii\db\ActiveRecord
{
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
            [['message'], 'string'],
            [['category'], 'string', 'max' => 32],
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
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getMessages()
    {
        return $this->hasMany(Message::className(), ['sourcemessage_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getLanguages()
    {
        return $this->hasMany(Locale::className(), ['language_id' => 'language_id'])->viaTable('message', ['sourcemessage_id' => 'id']);
    }
}
