<?php

namespace backend\controllers;

use Yii;
use backend\models\Message;
use backend\models\MessageSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\helpers\Json;

/**
 * MessageController implements the CRUD actions for Message model.
 */
class MessageController extends Controller
{
    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['POST'],
                ],
            ],
        ];
    }

    /**
     * Lists all Message models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new MessageSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Message model.
     * @param integer $id
     * @param string $language
     * @return mixed
     */
    public function actionView($index0)
    {
        return $this->render('view', [
            'model' => $this->findModel($index0),
        ]);
    }

    /**
     * Creates a new Message model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Message();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'index0' => $model->index0]);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing Message model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @param string $language
     * @return mixed
     */
    public function actionUpdate($index0)
    {
        $model = $this->findModel($index0);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'index0' => $model->index0]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing Message model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @param string $language
     * @return mixed
     */
    public function actionDelete($index0)
    {
        $this->findModel($index0)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Message model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @param string $language
     * @return Message the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($index0)
    {
        if (($model = Message::findOne(['index0' => $index0])) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
    
    public function actionTranslate() {
        $searchModel = new MessageSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        
        if (Yii::$app->request->post('hasEditable')) {
            // instantiate your book model for saving
            $messageId = Yii::$app->request->post('editableKey');
            $model = Message::findOne(Json::decode($messageId));
            
            //print_r((array)(Json::decode($messageId))); exit;

            // store a default json response as desired by editable
            $out = Json::encode(['output'=>'', 'message'=>'']);

            // fetch the first entry in posted data (there should only be one entry 
            // anyway in this array for an editable submission)
            // - $posted is the posted data for Book without any indexes
            // - $post is the converted array for single model validation
            $posted = current($_POST['Message']);
            $post = ['Message' => $posted];

            // load model like any single model validation
            if ($model->load($post)) {
            // can save model or do something before saving model
            $model->save();

            // custom output to return to be displayed as the editable grid cell
            // data. Normally this is empty - whereby whatever value is edited by
            // in the input by user is updated automatically.
            $output = '';

            // specific use case where you need to validate a specific
            // editable column posted when you have more than one
            // EditableColumn in the grid view. We evaluate here a
            // check to see if buy_amount was posted for the Book model
            /*
            if (isset($posted['buy_amount'])) {
                $output = Yii::$app->formatter->asDecimal($model->buy_amount, 2);
            }
            */
            // similarly you can check if the name attribute was posted as well
            // if (isset($posted['name'])) {
            // $output = ''; // process as you need
            // }
            $out = Json::encode(['output'=>$output, 'message'=>'']);
            }
            // return ajax json encoded response and exit
            echo $out;
            return;
        }
        return $this->render('translate', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }
}
