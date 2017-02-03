<?php

namespace frontend\models;

use Yii;

/**
 * This is the model class for table "ulikiweselne".
 *
 * @property string $id
 * @property string $typ
 * @property string $rodzaj_ramki
 * @property int $pojemnosc
 * @property int $ilosc_ramek
 * @property string $data
 * @property string $nazwapasieki
 */
class Ulikiweselne extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'ulikiweselne';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'typ', 'rodzaj_ramki', 'pojemnosc', 'ilosc_ramek', 'nazwapasieki'], 'required'],
            [['pojemnosc', 'ilosc_ramek'], 'integer'],
            [['data'], 'safe'],
            [['id'], 'string', 'max' => 6],
            [['typ', 'rodzaj_ramki'], 'string', 'max' => 30],
            [['nazwapasieki'], 'string', 'max' => 60],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'typ' => 'Typ',
            'rodzaj_ramki' => 'Rodzaj Ramki',
            'pojemnosc' => 'Pojemnosc',
            'ilosc_ramek' => 'Ilosc Ramek',
            'data' => 'Data',
            'nazwapasieki' => 'Nazwapasieki',
        ];
    }
}
