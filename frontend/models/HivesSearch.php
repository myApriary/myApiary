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
            [['type', 'kind_of_frame', 'kindOfFrame0.labelT', 'type0.labelT', 'start_date', 'end_date', 'ts_insert', 'ts_update', 'name', 'type0', 'kindOfFrame0', 'apiary'], 'safe'],
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
       
        $query->joinWith(['type0']);
        $query->joinWith(['apiary']);
        $query->joinWith(['kindOfFrame0 as status_frame']);


        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);


        $dataProvider->sort->attributes['kindOfFrame0.labelT'] = [
            'asc' => ['status_frame.label' => SORT_ASC],
            'desc' => ['status_frame.label' => SORT_DESC],
        ];

        $dataProvider->sort->attributes['type0.labelT'] = [
            'asc' => ['status.label' => SORT_ASC],
            'desc' => ['status.label' => SORT_DESC],
        ];

        $dataProvider->sort->attributes['apiary'] = [
            'asc' => ['apiary.name' => SORT_ASC],
            'desc' => ['apiary.name' => SORT_DESC],
        ];

        $this->load($params);

        

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        // grid filtering conditions
        $query->andFilterWhere([
            //'apiary'=>$this->apiary,
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
            ->andFilterWhere(['like', 'apiary.name', $this->apiary])
            ->andFilterWhere(['like', 'status.label',  $this->getAttribute('kindOfFrame0.labelT')])
            ->andFilterWhere(['like', 'status.label',  $this->getAttribute('type0.labelT')]);

        return $dataProvider;
    }

    public function attributes()
    {
        // add related fields to searchable attributes
        return array_merge(parent::attributes(), ['kindOfFrame0.labelT', 'type0.labelT', 'apiary']);
    }
}
