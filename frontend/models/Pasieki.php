<?php

namespace frontend\models;

use Yii;
use dektrium\user\models\User;
use frontend\models\Status;
//use nepstor\validators\DateTimeCompareValidator;

/**
 * This is the model class for table "pasieki".
 *
 * @property integer $id
 * @property integer $id_user
 * @property string $nazwa
 * @property string $lokalizacja
 * @property integer $status
 */
class Pasieki extends \yii\db\ActiveRecord
{

  //  public $nextId;
  //  public $previousId;
    
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'pasieki';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_user', 'type', 'status'], 'integer'],
            [['nazwa', 'lokalizacja', 'type', 'status', 'start_date'], 'required'],
            [['nazwa'], 'string', 'max' => 60],
            [['start_date', 'end_date'], 'date', 'format'=>'YYYY-mm-dd'],
            //['end_date', 'compareDate', 'compareAttribute'=>'start_date', 'operator' => '>', 'type' => 'date', 'message'=>Yii::t('app_frontend','"ended" must be greater than "started"')],
            ['end_date', \nepstor\validators\DateTimeCompareValidator::className(), 'compareAttribute' => 'start_date', 'format' => 'Y-m-d', 'operator' => '>'],
            [['lokalizacja'], 'string', 'max' => 38],
            [['id_user'], 'exist', 'skipOnError' => true, 'targetClass' => User::className(), 'targetAttribute' => ['id_user' => 'id']],
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
            'id_user' => 'user id',
            'nazwa' => Yii::t('app_frontend','name'),
            'lokalizacja' => Yii::t('app_frontend','location'),
            'status' => Yii::t('app_frontend','status'),
            'type' => Yii::t('app_frontend','type'),
            'status0.labelT' => Yii::t('app_frontend','status'),
            'type0.labelT' => Yii::t('app_frontend','type'),
        ];
    }
    
    public function getUser()
    {
        return $this->hasOne(User::className(), ['id' => 'id_user']);
    }
    
    public function getPnie()
    {
        return $this->hasMany(Pnie::className(), ['id_pasieki' => 'id']);
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
    
    public function beforeSave($inster){
        if (parent::beforeSave($insert)) {
            $this->id_user = \Yii::$app->user->getId();
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
//ALTER TABLE pasieki ADD CHECK (end_date >= start_date);
//ALTER TABLE pasieki ADD CONSTRAINT CK_end_date_vs_start_date CHECK CHECK (end_date >= start_date);