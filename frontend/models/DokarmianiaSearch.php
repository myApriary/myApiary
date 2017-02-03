<?php

namespace frontend\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use frontend\models\Dokarmiania;

/**
 * DokarmianiaSearch represents the model behind the search form of `frontend\models\Dokarmiania`.
 */
class DokarmianiaSearch extends Dokarmiania
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id'], 'integer'],
            [['cel', 'rodzaj_pokarmu', 'idpnia', 'czas'], 'safe'],
            [['ilosc_cukru'], 'number'],
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
        $query = Dokarmiania::find();

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
            'ilosc_cukru' => $this->ilosc_cukru,
            'czas' => $this->czas,
        ]);

        $query->andFilterWhere(['like', 'cel', $this->cel])
            ->andFilterWhere(['like', 'rodzaj_pokarmu', $this->rodzaj_pokarmu])
            ->andFilterWhere(['like', 'idpnia', $this->idpnia]);

        return $dataProvider;
    }
}
