<?php

namespace frontend\models;

use Yii;

/**
 * This is the model class for table "feeding".
 *
 * @property int $id
 * @property string $purspose
 * @property string $type_of_food
 * @property string $sugar_amount
 * @property int $hive_id
 * @property int $ts_insert
 * @property string $ts_update
 */
class Feeding extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'feeding';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['purspose', 'type_of_food', 'sugar_amount', 'hive_id'], 'required'],
            [['sugar_amount'], 'number'],
            [['hive_id', 'ts_insert'], 'integer'],
            [['ts_update'], 'safe'],
            [['purspose'], 'string', 'max' => 60],
            [['type_of_food'], 'string', 'max' => 30],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app_frontend', 'ID'),
            'purspose' => Yii::t('app_frontend', 'Purspose'),
            'type_of_food' => Yii::t('app_frontend', 'Type Of Food'),
            'sugar_amount' => Yii::t('app_frontend', 'Sugar Amount'),
            'hive_id' => Yii::t('app_frontend', 'Hive ID'),
            'ts_insert' => Yii::t('app_frontend', 'Ts Insert'),
            'ts_update' => Yii::t('app_frontend', 'Ts Update'),
        ];
    }
}
