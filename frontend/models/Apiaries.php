<?php

namespace frontend\models;

use Yii;
use dektrium\user\models\User;
use frontend\models\Status;
//use nepstor\validators\DateTimeCompareValidator;

/**
 * This is the model class for table "apiaries".
 *
 * @property integer $id
 * @property integer $user_id
 * @property string $name
 * @property string $location
 * @property integer $status
 */
class Apiaries extends \yii\db\ActiveRecord
{

  //  public $nextId;
  //  public $previousId;
    
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'apiary';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['user_id', 'type', 'status'], 'integer'],
            [['name', 'location', 'type', 'status', 'start_date'], 'required'],
            [['name'], 'string', 'max' => 60],
            [['start_date', 'end_date'], 'date', 'format'=>'yyyy-mm-dd'],
            //['end_date', 'compareDate', 'compareAttribute'=>'start_date', 'operator' => '>', 'type' => 'date', 'message'=>Yii::t('app_frontend','"ended" must be greater than "started"')],
            ['end_date', \nepstor\validators\DateTimeCompareValidator::className(), 'compareAttribute' => 'start_date', 'format' => 'Y-m-d', 'operator' => '>', 'message'=>Yii::t('app_frontend','"ended" must be greater than "started"')],
            [['location'], 'string', 'max' => 38],
            [['user_id'], 'exist', 'skipOnError' => true, 'targetClass' => User::className(), 'targetAttribute' => ['user_id' => 'id']],
            [['type'], 'exist', 'skipOnError' => true, 'targetClass' => Status::className(), 'targetAttribute' => ['type' => 'id']],
            [['status'], 'exist', 'skipOnError' => true, 'targetClass' => Status::className(), 'targetAttribute' => ['status' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'id',
            'ts_insert' => Yii::t('app_frontend','inserted'),
            'ts_update' => Yii::t('app_frontend','updated'),
            'start_date' => Yii::t('app_frontend','started'),
            'end_date' => Yii::t('app_frontend','ended'),
            'user_id' => 'user id',
            'name' => Yii::t('app_frontend','name'),
            'location' => Yii::t('app_frontend','location'),
            'status' => Yii::t('app_frontend','status'),
            'type' => Yii::t('app_frontend','type'),
            'status0.labelT' => Yii::t('app_frontend','status'),
            'type0.labelT' => Yii::t('app_frontend','type'),
        ];
    }
    
    public function getUser()
    {
        return $this->hasOne(User::className(), ['id' => 'user_id']);
    }
    
    public function getPnie()
    {
        return $this->hasMany(Pnie::className(), ['id_apiaries' => 'id']);
    }

    public function getNextId() {
        $prev = $this->find()->where(['>', 'id', $this->id])->orderBy('id asc')->one();
        if($prev!==null)
            return $prev->id;
        return null;
    }
    public function getPreviousId() {
        $prev = $this->find()->where(['<', 'id', $this->id])->orderBy('id desc')->one();
        if($prev!==null)
            return $prev->id;
        return null;
    }
    
    public function getStatus0() {
        return $this->hasOne(Status::className(), ['id' => 'status']);
    }
    
     public function getType0() {
        return $this->hasOne(Status::className(), ['id' => 'type']);
    }
    
    public function beforeSave($insert){
        if (parent::beforeSave($insert)) {
            $this->user_id = \Yii::$app->user->getId();
            if(!$insert) {
                $this->ts_update = date('Y-m-d H:i:s');
            };
            return true;
        } else {
            return false;
        }
    }
    
    /*
    public function beforeDelete()
    {
        if (parent::beforeDelete()) {
                if ($this->id > 0) {
                    $this->status = -100;
                    $this->update(false, ['status']);
                }
            return false;
        } else {
            return false;
        }
    }
*/
}