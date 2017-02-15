<?php

namespace frontend\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use frontend\models\Mattingbox;

/**
 * MattingboxSearch represents the model behind the search form of `frontend\models\Mattingbox`.
 */
class MattingboxSearch extends Mattingbox
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'type', 'kind_of_frame', 'time', 'ts_insert', 'ts_update'], 'safe'],
            [['capacity', 'number_of_frames', 'apiary_id'], 'integer'],
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
        $query = Mattingbox::find();

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
            'capacity' => $this->capacity,
            'number_of_frames' => $this->number_of_frames,
            'time' => $this->time,
            'apiary_id' => $this->apiary_id,
            'ts_insert' => $this->ts_insert,
            'ts_update' => $this->ts_update,
        ]);

        $query->andFilterWhere(['like', 'id', $this->id])
            ->andFilterWhere(['like', 'type', $this->type])
            ->andFilterWhere(['like', 'kind_of_frame', $this->kind_of_frame]);

        return $dataProvider;
    }
}
