<?php

namespace frontend\models;

use Yii;
use yii\helpers\ArrayHelper;

/**
 * This is the model class for table "queen".
 *
 * @property int $id
 * @property string $mark_disk_color
 * @property int $mark_disk_number
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
            [['mark_disk_color', 'variety'], 'required'],
            [['mark_disk_color'], 'string'],
            [['mark_disk_number', 'reproductive_hive_id', 'hive_id'], 'integer'],
            [['hive_time', 'matting_box_time', 'matting_box_id', 'ts_insert', 'ts_update'], 'safe'],
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
            'mark_disk_color' => Yii::t('app_frontend', 'Color'),
            'mark_disk_number' => ucfirst(Yii::t('app_frontend', 'number')),
            'variety' => Yii::t('app_frontend', 'Variety'),
            'reproductive_hive_id' => Yii::t('app_frontend', 'Reproductive hive'),
            'hive_id' => Yii::t('app_frontend', 'Hive'),
            'hive_time' => Yii::t('app_frontend', 'In hive since'),
            'matting_box_id' => Yii::t('app_frontend', 'Matting Box'),
            'matting_box_time' => Yii::t('app_frontend', 'In matting box since'),
            'reproductiveHive.apiary.name' => Yii::t('app_frontend', 'Apiary'),
            'ApiaryAndHive' => Yii::t('app_frontend', 'Hive'),
            'ApiaryAndReproductiveHive' => Yii::t('app_frontend', 'Reproductive Hive'),
            'color0.labelT' => ucfirst(Yii::t('app_frontend', 'color')),
        ];
    }

    public function getReproductiveHive(){
         return $this->hasOne(Hives::className(), ['id' => 'reproductive_hive_id']);
    }

    public function getHive(){
         return $this->hasOne(Hives::className(), ['id' => 'hive_id']);
    }

    public function getApiaryAndHive(){
        $r = $this->getHive()->one();
        $haa = (empty($r->name) ? $r->id : $r->name);
        return ($this->getHive()->one()->apiary->name . ' ' .  $haa);

    }

    public function getApiaryAndReproductiveHive(){
        if(!empty($this->reproductive_hive_id)){
            $r = $this->getReproductiveHive()->one();
            $haa = (empty($r->name) ? $r->id : $r->name);
            return ($this->getReproductiveHive()->one()->apiary->name . ' ' .  $haa);
        }

    }

    public function getColor0() {
        return $this->hasOne(Status::className(), ['id' => 'mark_disk_color']);
    }

    public function hiveList()
    {
         return ArrayHelper::map(Hives::find()->all(),'id', 'number');

    }

}
