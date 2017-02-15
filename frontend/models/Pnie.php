<?php

namespace frontend\models;

use Yii;
use yii\helpers\ArrayHelper;

/**
 * This is the model class for table "pnie".
 *
 * @property int $id
 * @property int $id_pasieki
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
 * @property Pasieki $pasieki
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
            [['id_pasieki', 'capacity', 'number_of_frames', 'family_condition', 'number'], 'integer'],
            [['type', 'kind_of_frame', 'capacity', 'number_of_frames', 'family_condition', 'number'], 'required'],
            [['start_date', 'end_date',], 'safe'],
            [['type', 'kind_of_frame', 'name'], 'string', 'max' => 30],
            [['id_pasieki'], 'exist', 'skipOnError' => true, 'targetClass' => Pasieki::className(), 'targetAttribute' => ['id_pasieki' => 'id']],
            [['start_date', 'end_date'], 'date', 'format'=>'yyyy-mm-dd'],
            ['end_date', \nepstor\validators\DateTimeCompareValidator::className(), 'compareAttribute' => 'start_date', 'format' => 'Y-m-d', 'operator' => '>', 'message'=>Yii::t('app_frontend','"ended" must be greater than "started"')],
            ['number_of_frames', 'compare', 'compareValue' => $this->capacity, 'operator' => '<=', 'type' => 'number',  'message'=> Yii::t('app_frontend','number of frames must be less or equal to "capacity"')],//'message' => 'ulala'

        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id',
            'id_pasieki',
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
    public function getPasieka()
    {
        return $this->hasOne(Pasieki::className(), ['id' => 'id_pasieki']);
    }

    public function apiaryList()
    {
         return ArrayHelper::map(Pasieki::find()->all(),'id', 'nazwa');
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
