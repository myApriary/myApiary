<?php

namespace frontend\models;

use Yii;
use yii\helpers\ArrayHelper;

/**
 * This is the model class for table "hives".
 *
 * @property int $id
 * @property int $apiary_id
 * @property string $type
 * @property string $kind_of_frame
 * @property int $capacity
 * @property int $number_of_frames
 * @property string $start_date
 * @property string $end_date
 * @property string $ts_insert
 * @property string $ts_update
 * @property string $name
 * @property int $family_condition
 *
 * @property Apiaries $apiaries
 */
class Hives extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'hive';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['apiary_id', 'capacity', 'number_of_frames', 'family_condition', 'number'], 'integer'],
            [['type', 'kind_of_frame', 'capacity', 'number_of_frames', 'family_condition', 'number'], 'required'],
            [['start_date', 'end_date',], 'safe'],
            [['type', 'kind_of_frame', 'name'], 'string', 'max' => 30],
            [['apiary_id'], 'exist', 'skipOnError' => true, 'targetClass' => Apiaries::className(), 'targetAttribute' => ['apiary_id' => 'id']],
            [['start_date', 'end_date'], 'date', 'format'=>'yyyy-mm-dd'],
            ['end_date', \nepstor\validators\DateTimeCompareValidator::className(), 'compareAttribute' => 'start_date', 'format' => 'Y-m-d', 'operator' => '>', 'message'=>Yii::t('app_frontend','"ended" must be greater than "started"')],
            ['number_of_frames', 'compare', 'compareAttribute' => 'capacity', 'operator' => '<=', 'type' => 'number',  'message'=> Yii::t('app_frontend','number of frames must be less or equal to "capacity"')],

        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id',
            'apiary_id',
            'type' => Yii::t('app_frontend', 'type'),
            'kind_of_frame' => Yii::t('app_frontend', 'kind of frame'),
            'capacity' => Yii::t('app_frontend', 'capacity'),
            'number_of_frames' => Yii::t('app_frontend', 'no. of frames'),
            'start_date' => Yii::t('app_frontend', 'started'),
            'end_date' => Yii::t('app_frontend', 'ended'),
            'ts_insert' => '',
            'ts_update' => Yii::t('app_frontend', 'updated'),
            'name' => Yii::t('app_frontend', 'name'),
            'number' => Yii::t('app_frontend', 'number'),
            'family_condition' => Yii::t('app_frontend', 'family condition'),
            'type0.labelT' => Yii::t('app_frontend', 'type'),
            'kindOfFrame0.labelT' => Yii::t('app_frontend', 'frame'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getApiary()
    {
        return $this->hasOne(Apiaries::className(), ['id' => 'apiary_id']);
    }

    public function apiaryList()
    {
         return ArrayHelper::map(Apiaries::find()->all(),'id', 'name');
    }
    
    public function getType0() 
    {
        return $this->hasOne(Status::className(), ['id' => 'type']);
    }
    
    public function getKindOfFrame0() 
    {
        return $this->hasOne(Status::className(), ['id' => 'kind_of_frame']);
    }
}
