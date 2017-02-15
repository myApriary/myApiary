<?php

namespace frontend\models;

use Yii;

/**
 * This is the model class for table "treatment".
 *
 * @property int $id
 * @property string $purpose
 * @property string $type_of_medicine
 * @property string $amount_of_medicine
 * @property string $hive_id
 * @property string $time
 * @property string $ts_insert
 * @property string $ts_update
 */
class Treatment extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'treatment';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['purpose', 'type_of_medicine', 'amount_of_medicine', 'hive_id'], 'required'],
            [['amount_of_medicine'], 'number'],
            [['time', 'ts_insert', 'ts_update'], 'safe'],
            [['purpose'], 'string', 'max' => 30],
            [['type_of_medicine'], 'string', 'max' => 60],
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
            'purpose' => Yii::t('app_frontend', 'Purpose'),
            'type_of_medicine' => Yii::t('app_frontend', 'Type Of Medicine'),
            'amount_of_medicine' => Yii::t('app_frontend', 'Amount Of Medicine'),
            'hive_id' => Yii::t('app_frontend', 'Hive ID'),
            'time' => Yii::t('app_frontend', 'Time'),
            'ts_insert' => Yii::t('app_frontend', 'Ts Insert'),
            'ts_update' => Yii::t('app_frontend', 'Ts Update'),
        ];
    }
}
