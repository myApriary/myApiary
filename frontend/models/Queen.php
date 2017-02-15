<?php

namespace frontend\models;

use Yii;

/**
 * This is the model class for table "queen".
 *
 * @property int $id
 * @property string $mark_disk_color
 * @property int $marking_disk_number
 * @property string $variety
 * @property int $reproductive_hive_id
 * @property int $hive_id
 * @property string $hive_time
 * @property string $matting_box_id
 * @property string $matting_box_time
 * @property string $ts_insert
 * @property string $ts_update
 */
class Queen extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'queen';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['mark_disk_color', 'variety', 'matting_box_id'], 'required'],
            [['mark_disk_color'], 'string'],
            [['marking_disk_number', 'reproductive_hive_id', 'hive_id'], 'integer'],
            [['hive_time', 'matting_box_time', 'ts_insert', 'ts_update'], 'safe'],
            [['variety'], 'string', 'max' => 45],
            [['matting_box_id'], 'string', 'max' => 6],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app_frontend', 'ID'),
            'mark_disk_color' => Yii::t('app_frontend', 'Mark Disk Color'),
            'marking_disk_number' => Yii::t('app_frontend', 'Marking Disk Number'),
            'variety' => Yii::t('app_frontend', 'Variety'),
            'reproductive_hive_id' => Yii::t('app_frontend', 'Reproductive Hive ID'),
            'hive_id' => Yii::t('app_frontend', 'Hive ID'),
            'hive_time' => Yii::t('app_frontend', 'Hive Time'),
            'matting_box_id' => Yii::t('app_frontend', 'Matting Box ID'),
            'matting_box_time' => Yii::t('app_frontend', 'Matting Box Time'),
            'ts_insert' => Yii::t('app_frontend', 'Ts Insert'),
            'ts_update' => Yii::t('app_frontend', 'Ts Update'),
        ];
    }
}
