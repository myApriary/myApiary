<?php

namespace frontend\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use frontend\models\Queen;

/**
 * QueenSearch represents the model behind the search form of `frontend\models\Queen`.
 */
class QueenSearch extends Queen
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'marking_disk_number', 'reproductive_hive_id', 'hive_id'], 'integer'],
            [['mark_disk_color', 'variety', 'hive_time', 'matting_box_id', 'matting_box_time', 'ts_insert', 'ts_update'], 'safe'],
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
        $query = Queen::find();

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
            'marking_disk_number' => $this->marking_disk_number,
            'reproductive_hive_id' => $this->reproductive_hive_id,
            'hive_id' => $this->hive_id,
            'hive_time' => $this->hive_time,
            'matting_box_time' => $this->matting_box_time,
            'ts_insert' => $this->ts_insert,
            'ts_update' => $this->ts_update,
        ]);

        $query->andFilterWhere(['like', 'mark_disk_color', $this->mark_disk_color])
            ->andFilterWhere(['like', 'variety', $this->variety])
            ->andFilterWhere(['like', 'matting_box_id', $this->matting_box_id]);

        return $dataProvider;
    }
}
