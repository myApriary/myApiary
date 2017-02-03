<?php

namespace frontend\models;

use Yii;

/**
 * This is the model class for table "leczenia".
 *
 * @property int $id
 * @property string $cel
 * @property string $rodzaj_leku
 * @property string $ilosc_leku
 * @property string $idpnia
 * @property string $czas
 */
class Leczenia extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'leczenia';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['cel', 'rodzaj_leku', 'ilosc_leku', 'idpnia'], 'required'],
            [['ilosc_leku'], 'number'],
            [['czas'], 'safe'],
            [['cel'], 'string', 'max' => 30],
            [['rodzaj_leku'], 'string', 'max' => 60],
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
            'rodzaj_leku' => 'Rodzaj Leku',
            'ilosc_leku' => 'Ilosc Leku',
            'idpnia' => 'Idpnia',
            'czas' => 'Czas',
        ];
    }
}
