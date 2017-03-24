<?php

namespace backend\modules\translate\models;

use Yii;

/**
 * This is the model class for table "locale".
 *
 * @property string $language_id
 * @property string $language
 * @property string $country
 * @property string $name
 * @property string $name_ascii
 * @property int $status
 *
 * @property Message[] $messages
 * @property Sourcemessage[] $sourcemessages
 */
class Locale extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'locale';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['language_id', 'language', 'country', 'name', 'name_ascii', 'status'], 'required'],
            [['status'], 'integer'],
            [['language_id'], 'string', 'max' => 5],
            [['language', 'country'], 'string', 'max' => 3],
            [['name', 'name_ascii'], 'string', 'max' => 32],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'language_id' => 'Language ID',
            'language' => 'Language',
            'country' => 'Country',
            'name' => 'Name',
            'name_ascii' => 'Name Ascii',
            'status' => 'Status',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getMessages()
    {
        return $this->hasMany(Message::className(), ['language_id' => 'language_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getSourcemessages()
    {
        return $this->hasMany(Sourcemessage::className(), ['id' => 'sourcemessage_id'])->viaTable('message', ['language_id' => 'language_id']);
    }
}
