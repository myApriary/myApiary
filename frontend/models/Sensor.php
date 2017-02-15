<?php

namespace frontend\models;

use Yii;

/**
 * This is the model class for table "sensor".
 *
 * @property int $id
 * @property string $sn
 * @property string $name
 * @property string $description
 * @property string $value
 * @property int $hive_id
 * @property string $ts_insert
 * @property string $ts_update
 */
class Sensor extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'sensor';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['sn', 'name', 'description', 'value'], 'required'],
            [['value'], 'number'],
            [['hive_id'], 'integer'],
            [['ts_insert', 'ts_update'], 'safe'],
            [['sn'], 'string', 'max' => 60],
            [['name'], 'string', 'max' => 30],
            [['description'], 'string', 'max' => 300],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app_frontend', 'ID'),
            'sn' => Yii::t('app_frontend', 'Sn'),
            'name' => Yii::t('app_frontend', 'Name'),
            'description' => Yii::t('app_frontend', 'Description'),
            'value' => Yii::t('app_frontend', 'Value'),
            'hive_id' => Yii::t('app_frontend', 'Hive ID'),
            'ts_insert' => Yii::t('app_frontend', 'Ts Insert'),
            'ts_update' => Yii::t('app_frontend', 'Ts Update'),
        ];
    }
}
