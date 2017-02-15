<?php

namespace frontend\models;

use Yii;

/**
 * This is the model class for table "cost".
 *
 * @property int $id
 * @property string $amount
 * @property string $description
 * @property string $comment
 * @property int $user_id
 * @property string $ts_insert
 * @property string $ts_update
 */
class Cost extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'cost';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['amount', 'description', 'comment', 'user_id'], 'required'],
            [['amount'], 'number'],
            [['user_id'], 'integer'],
            [['ts_insert', 'ts_update'], 'safe'],
            [['description', 'comment'], 'string', 'max' => 300],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app_frontend', 'ID'),
            'amount' => Yii::t('app_frontend', 'Amount'),
            'description' => Yii::t('app_frontend', 'Description'),
            'comment' => Yii::t('app_frontend', 'Comment'),
            'user_id' => Yii::t('app_frontend', 'User ID'),
            'ts_insert' => Yii::t('app_frontend', 'Ts Insert'),
            'ts_update' => Yii::t('app_frontend', 'Ts Update'),
        ];
    }
}
