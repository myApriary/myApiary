<?php

namespace frontend\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use frontend\models\Hives;

/**
 * HivesSearch represents the model behind the search form of `frontend\models\Hives`.
 */
class HivesSearch extends Hives
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'apiary_id', 'capacity', 'number_of_frames', 'family_condition'], 'integer'],
            [['type', 'kind_of_frame', 'kindOfFrame0.labelT', 'type0.labelT', 'start_date', 'end_date', 'ts_insert', 'ts_update', 'name'], 'safe'],
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
        $query = Hives::find();
        $query->joinWith(['kindOfFrame0' => function($query) { $query->from(['status' => 'status']); }]);
        $query->joinWith(['type0' => function($query) { $query->from(['type' => 'status']); }]);

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

         $dataProvider->sort->attributes['kindOfFrame0.labelT'] = [
            'asc' => ['status.label' => SORT_ASC],
            'desc' => ['status.label' => SORT_DESC],
        ];

        $dataProvider->sort->attributes['type0.labelT'] = [
            'asc' => ['status.label' => SORT_ASC],
            'desc' => ['status.label' => SORT_DESC],
        ];

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        // grid filtering conditions
        $query->andFilterWhere([
            'apiary'=>$this->apiary,
            'id' => $this->id,
            'apiary_id' => $this->apiary_id,
            'capacity' => $this->capacity,
            'number_of_frames' => $this->number_of_frames,
            'start_date' => $this->start_date,
            'end_date' => $this->end_date,
            'ts_insert' => $this->ts_insert,
            'ts_update' => $this->ts_update,
            'family_condition' => $this->family_condition,
        ]);

      $query->andFilterWhere(['like', 'name', $this->name])
            ->andFilterWhere(['like', 'apiary', $this->apiary])
            ->andFilterWhere(['like', 'status.label',  $this->getAttribute('kindOfFrame0.labelT')])
            ->andFilterWhere(['like', 'status.label',  $this->getAttribute('type0.labelT')]);

        return $dataProvider;
    }

    public function attributes()
    {
        // add related fields to searchable attributes
        return array_merge(parent::attributes(), ['kindOfFrame0.labelT', 'type0.labelT']);
    }
}
