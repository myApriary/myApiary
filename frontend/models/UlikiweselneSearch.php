<?php

namespace frontend\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use frontend\models\Ulikiweselne;

/**
 * UlikiweselneSearch represents the model behind the search form of `frontend\models\Ulikiweselne`.
 */
class UlikiweselneSearch extends Ulikiweselne
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'typ', 'rodzaj_ramki', 'data', 'nazwapasieki'], 'safe'],
            [['pojemnosc', 'ilosc_ramek'], 'integer'],
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
        $query = Ulikiweselne::find();

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
            'pojemnosc' => $this->pojemnosc,
            'ilosc_ramek' => $this->ilosc_ramek,
            'data' => $this->data,
        ]);

        $query->andFilterWhere(['like', 'id', $this->id])
            ->andFilterWhere(['like', 'typ', $this->typ])
            ->andFilterWhere(['like', 'rodzaj_ramki', $this->rodzaj_ramki])
            ->andFilterWhere(['like', 'nazwapasieki', $this->nazwapasieki]);

        return $dataProvider;
    }
}
