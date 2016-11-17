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
            [['lokalizacja'], 'string', 'max' => 30],
            [['id_user'], 'exist', 'skipOnError' => true, 'targetClass' => User::className(), 'targetAttribute' => ['id_user' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'id_user' => 'Id User',
            'nazwa' => 'Nazwa',
            'lokalizacja' => 'Lokalizacja',
            'status' => 'Status',
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
  
}
