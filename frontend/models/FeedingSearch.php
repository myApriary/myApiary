<?php

namespace frontend\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use frontend\models\Feeding;

/**
 * FeedingSearch represents the model behind the search form of `frontend\models\Feeding`.
 */
class FeedingSearch extends Feeding
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'hive_id', 'ts_insert'], 'integer'],
            [['purspose', 'type_of_food', 'ts_update'], 'safe'],
            [['sugar_amount'], 'number'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function scenarios()
    {
        // bypass scenarios() implementation in the parent class
        return Model::scenarios();
    }

    /**
     * Creates data provider instance with search query applied
     *
     * @param array $params
     *
     * @return ActiveDataProvider
     */
    public function search($params)
    {
        $query = Feeding::find();

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        // grid filtering conditions
        $query->andFilterWhere([
            'id' => $this->id,
            'sugar_amount' => $this->sugar_amount,
            'hive_id' => $this->hive_id,
            'ts_insert' => $this->ts_insert,
            'ts_update' => $this->ts_update,
        ]);

        $query->andFilterWhere(['like', 'purspose', $this->purspose])
            ->andFilterWhere(['like', 'type_of_food', $this->type_of_food]);

        return $dataProvider;
    }
}
