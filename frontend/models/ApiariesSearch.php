<?php

namespace frontend\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use frontend\models\Apiaries;

/**
 * ApiariesSearch represents the model behind the search form of `frontend\models\Apiaries`.
 */
class ApiariesSearch extends Apiaries
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'user_id', 'status'], 'integer'],
            [['name', 'location', 'status0.labelT', 'type0.labelT'], 'safe'],
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
        $query = Apiaries::find();
        
        $query->joinWith(['status0' => function($query) { $query->from(['status' => 'status']); }]);
        $query->joinWith(['type0' => function($query) { $query->from(['type' => 'status']); }]);

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);
        
        $dataProvider->sort->attributes['status0.labelT'] = [
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
            'id' => $this->id,
            'user_id' => $this->user_id,
            'status' => $this->status,
        ]);

        $query->andFilterWhere(['like', 'name', $this->name])
            ->andFilterWhere(['like', 'location', $this->location]);
            
        $query->andFilterWhere(['like', 'status.label',  $this->getAttribute('status0.labelT')]);
        $query->andFilterWhere(['like', 'status.label',  $this->getAttribute('type0.labelT')]);

        return $dataProvider;
    }

    public function attributes()
    {
        // add related fields to searchable attributes
        return array_merge(parent::attributes(), ['status0.labelT', 'type0.labelT']);
    }
}
