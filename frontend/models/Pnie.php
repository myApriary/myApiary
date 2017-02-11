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
            'id' => 'id',
            'id_pasieki' => 'apiary id',
            'typ' => Yii::t('app_frontend','type'),
            'rodzaj_ramki' => Yii::t('app_frontend','kind of frame'),
            'pojemnosc' => Yii::t('app_frontend','capacity'),
            'ilosc_ramek' => Yii::t('app_frontend','number of frames'),
            'data' => Yii::t('app_frontend','date'),
            'nazwa' => Yii::t('app_frontend','name'),
            'sila_rodziny' => Yii::t('app_frontend','family condition'),
        ];
    }
    
    public function getPasieki()
    {
        return $this->hasOne(Pasieki::className(), ['id_pasieki' => 'id']);
    }
}
