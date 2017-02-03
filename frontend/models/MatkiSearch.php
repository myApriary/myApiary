<?php

namespace frontend\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use frontend\models\Matki;

/**
 * MatkiSearch represents the model behind the search form of `frontend\models\Matki`.
 */
class MatkiSearch extends Matki
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'ul_zarodowy'], 'integer'],
            [['kolor_opalitki', 'rasa', 'idpnia', 'pienczas', 'idulikaweselnego', 'czasulikaweselnego'], 'safe'],
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
        $query = Matki::find();

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
            'ul_zarodowy' => $this->ul_zarodowy,
            'pienczas' => $this->pienczas,
            'czasulikaweselnego' => $this->czasulikaweselnego,
        ]);

        $query->andFilterWhere(['like', 'kolor_opalitki', $this->kolor_opalitki])
            ->andFilterWhere(['like', 'rasa', $this->rasa])
            ->andFilterWhere(['like', 'idpnia', $this->idpnia])
            ->andFilterWhere(['like', 'idulikaweselnego', $this->idulikaweselnego]);

        return $dataProvider;
    }
}
