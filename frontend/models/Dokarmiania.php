<?php

namespace frontend\models;

use Yii;

/**
 * This is the model class for table "dokarmiania".
 *
 * @property int $id
 * @property string $cel
 * @property string $rodzaj_pokarmu
 * @property string $ilosc_cukru
 * @property string $idpnia
 * @property string $czas
 */
class Dokarmiania extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'dokarmiania';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['cel', 'rodzaj_pokarmu', 'ilosc_cukru', 'idpnia'], 'required'],
            [['ilosc_cukru'], 'number'],
            [['czas'], 'safe'],
            [['cel'], 'string', 'max' => 60],
            [['rodzaj_pokarmu'], 'string', 'max' => 30],
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
            'cel' => 'Cel',
            'rodzaj_pokarmu' => 'Rodzaj Pokarmu',
            'ilosc_cukru' => 'Ilosc Cukru',
            'idpnia' => 'Idpnia',
            'czas' => 'Czas',
        ];
    }
}
