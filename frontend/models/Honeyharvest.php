<?php

namespace frontend\models;

use Yii;

/**
 * This is the model class for table "honeyharvest".
 *
 * @property int $id
 * @property string $honey_amount
 * @property string $kind_of_honey
 * @property string $hive_id
 * @property string $time
 * @property string $ts_insert
 * @property string $ts_update
 */
class Honeyharvest extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'honeyharvest';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['honey_amount', 'kind_of_honey', 'hive_id'], 'required'],
            [['honey_amount'], 'number'],
            [['time', 'ts_insert', 'ts_update'], 'safe'],
            [['kind_of_honey'], 'string', 'max' => 60],
            [['hive_id'], 'string', 'max' => 6],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app_frontend', 'ID'),
            'honey_amount' => Yii::t('app_frontend', 'Honey Amount'),
            'kind_of_honey' => Yii::t('app_frontend', 'Kind Of Honey'),
            'hive_id' => Yii::t('app_frontend', 'Hive ID'),
            'time' => Yii::t('app_frontend', 'Time'),
            'ts_insert' => Yii::t('app_frontend', 'Ts Insert'),
            'ts_update' => Yii::t('app_frontend', 'Ts Update'),
        ];
    }
}
