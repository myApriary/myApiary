<?php

namespace frontend\models;

use Yii;

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
            'mark_disk_color' => Yii::t('app_frontend', 'Mark disk color'),
            'mark_disk_number' => Yii::t('app_frontend', 'Mark disk number'),
            'variety' => Yii::t('app_frontend', 'Variety'),
            'reproductive_hive_id' => Yii::t('app_frontend', 'Reproductive hive'),
            'hive_id' => Yii::t('app_frontend', 'Hive'),
            'hive_time' => Yii::t('app_frontend', 'Time'),
            'matting_box_id' => Yii::t('app_frontend', 'Matting Box'),
            'matting_box_time' => Yii::t('app_frontend', 'Matting Box'),
            'reproductiveHive.apiary.name' => Yii::t('app_frontend', 'Apiary'),
            'ApiaryAndHive' => Yii::t('app_frontend', 'Hive'),
            'ApiaryAndReproductiveHive' => Yii::t('app_frontend', 'Reproductive Hive'),
        ];
    }

    public function getReproductiveHive(){
         return $this->hasOne(Hives::className(), ['id' => 'reproductive_hive_id']);
    }

    public function getHive(){
         return $this->hasOne(Hives::className(), ['id' => 'hive_id']);
    }

    public function getApiaryAndHive(){
        $haa = empty($this->getHive()->one()->name) ? $this->getHive()->one()->name : $this->getHive()->one()->id;
        return ($this->getHive()->one()->apiary->name . ' ' .  $haa);

    }

    public function getApiaryAndReproductiveHive(){
        if(!empty($this->reproductive_hive_id)){
            $haa = (empty($this->getReproductiveHive()->one()->name) ? $this->getReproductiveHive()->one()->name : $this->getReproductiveHive()->one()->id);
            print_r('haa: ' . $haa);exit;
            return ($this->getReproductiveHive()->one()->apiary->name . ' ' .  $haa);
            //return 'ss';
        }

    }

}
