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
            [['id', 'id_pasieki', 'capacity', 'number_of_frames', 'family_condition'], 'integer'],
            [['type', 'kind_of_frame', 'start_date', 'end_date', 'ts_insert', 'ts_update', 'name'], 'safe'],
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
            'pasieka'=>$this->pasieka,
            'id' => $this->id,
            'id_pasieki' => $this->id_pasieki,
            'capacity' => $this->capacity,
            'number_of_frames' => $this->number_of_frames,
            'start_date' => $this->start_date,
            'end_date' => $this->end_date,
            'ts_insert' => $this->ts_insert,
            'ts_update' => $this->ts_update,
            'family_condition' => $this->family_condition,
        ]);

        $query->andFilterWhere(['like', 'type', $this->type])
            ->andFilterWhere(['like', 'kind_of_frame', $this->kind_of_frame])
            ->andFilterWhere(['like', 'name', $this->name])
            ->andFilterWhere(['like', 'apiary', $this->pasieka]);

        return $dataProvider;
    }
}
