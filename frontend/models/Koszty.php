<?php

namespace frontend\models;

use Yii;

/**
 * This is the model class for table "koszty".
 *
 * @property int $id
 * @property string $kwota
 * @property string $opis
 * @property string $komentarz
 * @property string $emailuzytkownika
 */
class Koszty extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'koszty';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['kwota', 'opis', 'komentarz', 'emailuzytkownika'], 'required'],
            [['kwota'], 'number'],
            [['opis', 'komentarz'], 'string', 'max' => 300],
            [['emailuzytkownika'], 'string', 'max' => 100],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'kwota' => 'Kwota',
            'opis' => 'Opis',
            'komentarz' => 'Komentarz',
            'emailuzytkownika' => 'Emailuzytkownika',
        ];
    }
}
