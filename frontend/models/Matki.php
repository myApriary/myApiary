<?php

namespace frontend\models;

use Yii;

/**
 * This is the model class for table "matki".
 *
 * @property int $id
 * @property string $kolor_opalitki
 * @property string $rasa
 * @property int $ul_zarodowy
 * @property string $idpnia
 * @property string $pienczas
 * @property string $idulikaweselnego
 * @property string $czasulikaweselnego
 */
class Matki extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'matki';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['kolor_opalitki', 'rasa', 'idulikaweselnego'], 'required'],
            [['kolor_opalitki'], 'string'],
            [['ul_zarodowy'], 'integer'],
            [['pienczas', 'czasulikaweselnego'], 'safe'],
            [['rasa'], 'string', 'max' => 45],
            [['idpnia', 'idulikaweselnego'], 'string', 'max' => 6],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'kolor_opalitki' => 'Kolor Opalitki',
            'rasa' => 'Rasa',
            'ul_zarodowy' => 'Ul Zarodowy',
            'idpnia' => 'Idpnia',
            'pienczas' => 'Pienczas',
            'idulikaweselnego' => 'Idulikaweselnego',
            'czasulikaweselnego' => 'Czasulikaweselnego',
        ];
    }
}
