<?php

namespace backend\modules\translate\models;

use Yii;

/**
 * This is the model class for table "message".
 *
 * @property int $id
 * @property string $language
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
            [['id', 'language'], 'required'],
            [['id'], 'integer'],
            [['translation'], 'string'],
            [['language'], 'string', 'max' => 5],
            [['id'], 'exist', 'skipOnError' => true, 'targetClass' => Sourcemessage::className(), 'targetAttribute' => ['id' => 'id']],
            [['language'], 'exist', 'skipOnError' => true, 'targetClass' => Locale::className(), 'targetAttribute' => ['language' => 'language_id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'Sourcemessage ID',
            'language' => 'Language ID',
            'translation' => 'Translation',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getSourcemessage()
    {
        return $this->hasOne(Sourcemessage::className(), ['id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getLanguage()
    {
        return $this->hasOne(Locale::className(), ['language' => 'language']);
    }
}
