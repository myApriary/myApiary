<?php

namespace backend\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use yii\data\SqlDataProvider;
use backend\models\SourceMessage;
//use backend\models\Message;

/**
 * SourceMessageSearch represents the model behind the search form of `backend\models\SourceMessage`.
 */
class SourceMessageAndTranslateSearch extends SourceMessage
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id'], 'integer'],
            [['category', 'message', 'messages.language', 'translation'], 'safe'],
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
        $query = SourceMessage::find();

        $query = SourceMessage::find()->joinWith(['messages'], false)->select('*');
            //->from('SourceMessage')
	    //    $query->join('LEFT OUTER JOIN', 'Message', 'SourceMessage.id = Message.id');
        
        // add conditions that should always apply here

        //$dataProvider = new ActiveDataProvider([
        //    'query' => $query,
        //]);
		
		//$query->select('*');
				
        $count = Yii::$app->db->createCommand('select COUNT(*) from SourceMessage as sm LEFT JOIN Message as m ON m.id = sm.id;')->queryScalar();


		$dataProvider = new SqlDataProvider([
			'sql' => $query->createCommand()->getRawSql(),
			'totalCount' => $count,
			'pagination' => [
				'pageSize' => 18,
			],
		]); 
		
		//print_r($dataProvider); exit;
		

        $this->load($params);
		
        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }
		
        // grid filtering conditions
        /*$query->andFilterWhere([
            'id' => $this->id,
        ]);

        $query->andFilterWhere(['like', 'category', $this->category])
            ->andFilterWhere(['like', 'message', $this->message]);
		*/
        return $dataProvider;
    }
    
    public function attributes()
    {
        // add related fields to searchable attributes
        return array_merge(parent::attributes(), ['messages.language','translation']);
    }
}
