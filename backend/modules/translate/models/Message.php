<?php

namespace backend\modules\translate\models;

use Yii;

/**
 * This is the model class for table "message".
 *
 * @property int $sourcemessage_id
 * @property string $language_id
 * @property string $translation
 *
 * @property Sourcemessage $sourcemessage
 * @property Locale $language
 */
class Message extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'message';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['sourcemessage_id', 'language_id'], 'required'],
            [['sourcemessage_id'], 'integer'],
            [['translation'], 'string'],
            [['language_id'], 'string', 'max' => 5],
            [['sourcemessage_id'], 'exist', 'skipOnError' => true, 'targetClass' => Sourcemessage::className(), 'targetAttribute' => ['sourcemessage_id' => 'id']],
            [['language_id'], 'exist', 'skipOnError' => true, 'targetClass' => Locale::className(), 'targetAttribute' => ['language_id' => 'language_id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'sourcemessage_id' => 'Sourcemessage ID',
            'language_id' => 'Language ID',
            'translation' => 'Translation',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getSourcemessage()
    {
        return $this->hasOne(Sourcemessage::className(), ['id' => 'sourcemessage_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getLanguage()
    {
        return $this->hasOne(Locale::className(), ['language_id' => 'language_id']);
    }
}
