<?php

namespace frontend\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use frontend\models\Miodobrania;

/**
 * MiodobraniaSearch represents the model behind the search form of `frontend\models\Miodobrania`.
 */
class MiodobraniaSearch extends Miodobrania
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id'], 'integer'],
            [['ilosc_miodu'], 'number'],
            [['rodzaj_miodu', 'idpnia', 'czas'], 'safe'],
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
        $query = Miodobrania::find();

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
            'ilosc_miodu' => $this->ilosc_miodu,
            'czas' => $this->czas,
        ]);

        $query->andFilterWhere(['like', 'rodzaj_miodu', $this->rodzaj_miodu])
            ->andFilterWhere(['like', 'idpnia', $this->idpnia]);

        return $dataProvider;
    }
}
