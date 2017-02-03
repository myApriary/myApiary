<?php

namespace frontend\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use frontend\models\Leczenia;

/**
 * LeczeniaSearch represents the model behind the search form of `frontend\models\Leczenia`.
 */
class LeczeniaSearch extends Leczenia
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id'], 'integer'],
            [['cel', 'rodzaj_leku', 'idpnia', 'czas'], 'safe'],
            [['ilosc_leku'], 'number'],
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
        $query = Leczenia::find();

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
            'ilosc_leku' => $this->ilosc_leku,
            'czas' => $this->czas,
        ]);

        $query->andFilterWhere(['like', 'cel', $this->cel])
            ->andFilterWhere(['like', 'rodzaj_leku', $this->rodzaj_leku])
            ->andFilterWhere(['like', 'idpnia', $this->idpnia]);

        return $dataProvider;
    }
}
