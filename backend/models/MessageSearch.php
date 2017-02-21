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
            [['language', 'translation', 'category', 'message'], 'safe'],
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
        //$query->rightJoin(['source' => function($query) { $query->from(['source' => 'SourceMessage']); }, 'SourceMessage.id = Message.id']);
        //$query->rightJoin('SourceMessage', 'SourceMessage.id = Message.id');
        
        $query->select(['*'])
            ->from('SourceMessage')
	        ->join('LEFT OUTER JOIN', 'Message', 'SourceMessage.id = Message.id');
        
        //$query->joinWith(['source' => function($query) { $query->from(['source' => 'SourceMessage']); }]);
        
        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);
        
        $dataProvider->sort->attributes['category'] = [
            'asc' => ['category' => SORT_ASC],
            'desc' => ['category' => SORT_DESC],
        ];
        
        $dataProvider->sort->attributes['message'] = [
            'asc' => ['message' => SORT_ASC],
            'desc' => ['message' => SORT_DESC],
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
            
        $query->andFilterWhere(['like', 'category',  $this->getAttribute('category')]);
        $query->andFilterWhere(['like', 'message',  $this->getAttribute('message')]);

        return $dataProvider;
    }
    
    public function attributes()
    {
        // add related fields to searchable attributes
        return array_merge(parent::attributes(), ['category','message']);
    }
}
