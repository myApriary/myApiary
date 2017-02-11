<?php

namespace frontend\models;

use Yii;
use yii\helpers\ArrayHelper;

/**
 * This is the model class for table "status".
 *
 * @property int $id
 * @property string $table_name
 * @property string $column_name
 * @property string $group_name
 * @property int $order_int
 * @property string $label
 * @property string $icon
 *
 * @property Pasieki[] $pasiekis
 * @property Pasieki[] $pasiekis0
 */
class Status extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'status';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'table_name', 'column_name', 'label'], 'required'],
            [['id', 'order_int'], 'integer'],
            [['table_name', 'column_name', 'group_name'], 'string', 'max' => 32],
            [['label'], 'string', 'max' => 64],
            [['icon'], 'string', 'max' => 128],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app_frontend', 'ID'),
            'table_name' => Yii::t('app_frontend', 'Table Name'),
            'column_name' => Yii::t('app_frontend', 'Column Name'),
            'group_name' => Yii::t('app_frontend', 'Group Name'),
            'order_int' => Yii::t('app_frontend', 'Order Int'),
            'label' => Yii::t('app_frontend', 'Label'),
            'icon' => Yii::t('app_frontend', 'Icon'),
        ];
    }
    
     public function getLabelT() {
        return Yii::t('app_frontend_apiary', $this->label);
        
    }
    
    public function dropDown($tableName,$columnName){
        return ArrayHelper::map(Status::find()->where(['table_name' => $tableName, 'column_name'=>$columnName])->all(), 'id', 'labelT');
        //return Array(['Tomala', 'Ola']);
    }


    /**
     * @return \yii\db\ActiveQuery
     */
    //public function getPasiekis()
    //{
    //    return $this->hasMany(Pasieki::className(), ['type' => 'id']);
    //}

    /**
     * @return \yii\db\ActiveQuery
     */
    //public function getPasiekis0()
    //{
    //    return $this->hasMany(Pasieki::className(), ['status' => 'id']);
    //}
}
