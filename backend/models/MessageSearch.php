<?php

namespace backend\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\models\Message;

/**
 * MessageSearch represents the model behind the search form of `backend\models\Message`.
 */
class MessageSearch extends Message
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id'], 'integer'],
            [['language', 'translation', 'source.category', 'source.message'], 'safe'],
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
        $query = Message::find();
        
        $query->joinWith(['source' => function($query) { $query->from(['source' => 'SourceMessage']); }]);
        //$query->joinWith(['source' => function($query) { $query->from(['source' => 'SourceMessage']); }]);

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);
        
        $dataProvider->sort->attributes['source.category'] = [
            'asc' => ['source.category' => SORT_ASC],
            'desc' => ['source.category' => SORT_DESC],
        ];
        
        $dataProvider->sort->attributes['source.message'] = [
            'asc' => ['source.message' => SORT_ASC],
            'desc' => ['source.message' => SORT_DESC],
        ];

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        // grid filtering conditions
        $query->andFilterWhere([
            'id' => $this->id,
        ]);

        $query->andFilterWhere(['like', 'language', $this->language])
            ->andFilterWhere(['like', 'translation', $this->translation]);
            
        $query->andFilterWhere(['like', 'source.category',  $this->getAttribute('source.category')]);
        $query->andFilterWhere(['like', 'source.message',  $this->getAttribute('source.message')]);

        return $dataProvider;
    }
    
    public function attributes()
    {
        // add related fields to searchable attributes
        return array_merge(parent::attributes(), ['source.category','source.message']);
    }
}
