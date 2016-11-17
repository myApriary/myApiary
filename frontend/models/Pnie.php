<?php

namespace frontend\models;

use Yii;

/**
 * This is the model class for table "pnie".
 *
 * @property integer $id
 * @property integer $id_pasieki
 * @property string $typ
 * @property string $rodzaj_ramki
 * @property integer $pojemnosc
 * @property integer $ilosc_ramek
 * @property string $data
 * @property string $nazwa
 * @property integer $sila_rodziny
 */
class Pnie extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'pnie';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_pasieki', 'pojemnosc', 'ilosc_ramek', 'sila_rodziny'], 'integer'],
            [['typ', 'rodzaj_ramki', 'pojemnosc', 'ilosc_ramek', 'nazwa', 'sila_rodziny'], 'required'],
            [['data'], 'safe'],
            [['typ', 'rodzaj_ramki', 'nazwa'], 'string', 'max' => 30],
            [['id_pasieki'], 'exist', 'skipOnError' => true, 'targetClass' => Pasieki::className(), 'targetAttribute' => ['id_pasieki' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'id_pasieki' => 'Id Pasieki',
            'typ' => 'Typ',
            'rodzaj_ramki' => 'Rodzaj Ramki',
            'pojemnosc' => 'Pojemnosc',
            'ilosc_ramek' => 'Ilosc Ramek',
            'data' => 'Data',
            'nazwa' => 'Nazwa',
            'sila_rodziny' => 'Sila Rodziny',
        ];
    }
    
    public function getPasieki()
    {
        return $this->hasOne(Pasieki::className(), ['id_pasieki' => 'id']);
    }
}
