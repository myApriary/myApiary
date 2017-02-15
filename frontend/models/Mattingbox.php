<?php

namespace frontend\models;

use Yii;

/**
 * This is the model class for table "matting_box".
 *
 * @property string $id
 * @property string $type
 * @property string $kind_of_frame
 * @property int $capacity
 * @property int $number_of_frames
 * @property string $time
 * @property int $apiary_id
 * @property string $ts_insert
 * @property string $ts_update
 */
class Mattingbox extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'matting_box';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'type', 'kind_of_frame', 'capacity', 'number_of_frames', 'apiary_id'], 'required'],
            [['capacity', 'number_of_frames', 'apiary_id'], 'integer'],
            [['time', 'ts_insert', 'ts_update'], 'safe'],
            [['id'], 'string', 'max' => 6],
            [['type', 'kind_of_frame'], 'string', 'max' => 30],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app_frontend', 'ID'),
            'type' => Yii::t('app_frontend', 'Type'),
            'kind_of_frame' => Yii::t('app_frontend', 'Kind Of Frame'),
            'capacity' => Yii::t('app_frontend', 'Capacity'),
            'number_of_frames' => Yii::t('app_frontend', 'Number Of Frames'),
            'time' => Yii::t('app_frontend', 'Time'),
            'apiary_id' => Yii::t('app_frontend', 'Apiary ID'),
            'ts_insert' => Yii::t('app_frontend', 'Ts Insert'),
            'ts_update' => Yii::t('app_frontend', 'Ts Update'),
        ];
    }
}
