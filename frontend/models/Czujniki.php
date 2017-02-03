<?php

namespace frontend\models;

use Yii;

/**
 * This is the model class for table "czujniki".
 *
 * @property int $id
 * @property string $sn
 * @property string $nazwa
 * @property string $opis
 * @property string $wartosc
 * @property string $idpnia
 * @property string $czas
 */
class Czujniki extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'czujniki';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['sn', 'nazwa', 'opis', 'wartosc'], 'required'],
            [['wartosc'], 'number'],
            [['czas'], 'safe'],
            [['sn'], 'string', 'max' => 60],
            [['nazwa'], 'string', 'max' => 30],
            [['opis'], 'string', 'max' => 300],
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
            'sn' => 'Sn',
            'nazwa' => 'Nazwa',
            'opis' => 'Opis',
            'wartosc' => 'Wartosc',
            'idpnia' => 'Idpnia',
            'czas' => 'Czas',
        ];
    }
}
