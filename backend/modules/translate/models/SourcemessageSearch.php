<?php

namespace backend\modules\translate\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\modules\translate\models\Sourcemessage;

/**
 * SourcemessageSearch represents the model behind the search form of `backend\modules\translate\models\Sourcemessage`.
 */
class SourcemessageSearch extends Sourcemessage
{
    
    public $language;
    
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id'], 'integer'],
            [['category', 'message', 'language', 'translation'], 'safe'],
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
        $query = Sourcemessage::find();

        // add conditions that should always apply here
        
        

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);
        
        $dataProvider->sort->attributes['translation'] = [
            'asc' => ['message.translation' => SORT_ASC],
            'desc' => ['message.translation' => SORT_DESC],
        ];

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        Yii::$app->session->set('u_lang', $this->language);

        
        $query->joinWith(['translations']);
        
        
        //$query->andOnCondition('message.language = :language', [':language' => $this->language]);
        
        
        
        $query->andFilterWhere([
            'id' => $this->id,
        ]);

        $query->andFilterWhere(['like', 'category', $this->category])
            ->andFilterWhere(['like', 'message', $this->message])
            ->andFilterWhere(['like', 'message.translation', $this->translation]);

        return $dataProvider;
    }
    
    public function attributes()
    {
        // add related fields to searchable attributes
        return array_merge(parent::attributes(), ['translation']);
    }
}
