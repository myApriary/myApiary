<?php

namespace frontend\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use frontend\models\Treatment;

/**
 * TreatmentSearch represents the model behind the search form of `frontend\models\Treatment`.
 */
class TreatmentSearch extends Treatment
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id'], 'integer'],
            [['purpose', 'type_of_medicine', 'hive_id', 'time', 'ts_insert', 'ts_update'], 'safe'],
            [['amount_of_medicine'], 'number'],
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
        $query = Treatment::find();

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
            'amount_of_medicine' => $this->amount_of_medicine,
            'time' => $this->time,
            'ts_insert' => $this->ts_insert,
            'ts_update' => $this->ts_update,
        ]);

        $query->andFilterWhere(['like', 'purpose', $this->purpose])
            ->andFilterWhere(['like', 'type_of_medicine', $this->type_of_medicine])
            ->andFilterWhere(['like', 'hive_id', $this->hive_id]);

        return $dataProvider;
    }
}
