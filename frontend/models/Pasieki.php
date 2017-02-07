<?php

namespace frontend\models;

use Yii;
use dektrium\user\models\User;

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
            [['id_user', 'status'], 'integer'],
            [['nazwa', 'lokalizacja', 'status'], 'required'],
            [['nazwa'], 'string', 'max' => 60],
            [['lokalizacja'], 'string', 'max' => 38],
            [['id_user'], 'exist', 'skipOnError' => true, 'targetClass' => User::className(), 'targetAttribute' => ['id_user' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'id',
            'id_user' => 'user id',
            'nazwa' => Yii::t('app_frontend','name'),
            'lokalizacja' => Yii::t('app_frontend','location'),
            'status' => Yii::t('app_frontend','status'),
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
  
  
}
