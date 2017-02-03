<?php

namespace frontend\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use frontend\models\Czujniki;

/**
 * CzujnikiSearch represents the model behind the search form of `frontend\models\Czujniki`.
 */
class CzujnikiSearch extends Czujniki
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id'], 'integer'],
            [['sn', 'nazwa', 'opis', 'idpnia', 'czas'], 'safe'],
            [['wartosc'], 'number'],
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
        $query = Czujniki::find();

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
            'wartosc' => $this->wartosc,
            'czas' => $this->czas,
        ]);

        $query->andFilterWhere(['like', 'sn', $this->sn])
            ->andFilterWhere(['like', 'nazwa', $this->nazwa])
            ->andFilterWhere(['like', 'opis', $this->opis])
            ->andFilterWhere(['like', 'idpnia', $this->idpnia]);

        return $dataProvider;
    }
}
