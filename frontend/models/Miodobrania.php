<?php

namespace frontend\models;

use Yii;

/**
 * This is the model class for table "miodobrania".
 *
 * @property int $id
 * @property string $ilosc_miodu
 * @property string $rodzaj_miodu
 * @property string $idpnia
 * @property string $czas
 */
class Miodobrania extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'miodobrania';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['ilosc_miodu', 'rodzaj_miodu', 'idpnia'], 'required'],
            [['ilosc_miodu'], 'number'],
            [['czas'], 'safe'],
            [['rodzaj_miodu'], 'string', 'max' => 60],
            [['idpnia'], 'string', 'max' => 6],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'ilosc_miodu' => 'Ilosc Miodu',
            'rodzaj_miodu' => 'Rodzaj Miodu',
            'idpnia' => 'Idpnia',
            'czas' => 'Czas',
        ];
    }
}
