<?php

namespace frontend\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use frontend\models\Pnie;

/**
 * PnieSearch represents the model behind the search form of `frontend\models\Pnie`.
 */
class PnieSearch extends Pnie
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'id_pasieki', 'pojemnosc', 'ilosc_ramek', 'sila_rodziny'], 'integer'],
            [['typ', 'rodzaj_ramki', 'data', 'nazwa'], 'safe'],
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
        $query = Pnie::find();

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
            'id_pasieki' => $this->id_pasieki,
            'pojemnosc' => $this->pojemnosc,
            'ilosc_ramek' => $this->ilosc_ramek,
            'data' => $this->data,
            'sila_rodziny' => $this->sila_rodziny,
        ]);

        $query->andFilterWhere(['like', 'typ', $this->typ])
            ->andFilterWhere(['like', 'rodzaj_ramki', $this->rodzaj_ramki])
            ->andFilterWhere(['like', 'nazwa', $this->nazwa]);

        return $dataProvider;
    }
}
