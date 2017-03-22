<?php

namespace backend\modules\translate\controllers;

use Yii;
use backend\modules\translate\models\Message;
use backend\modules\translate\models\MessageSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

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
     * @param integer $sourcemessage_id
     * @param string $language_id
     * @return mixed
     */
    public function actionView($sourcemessage_id, $language_id)
    {
        return $this->render('view', [
            'model' => $this->findModel($sourcemessage_id, $language_id),
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
            return $this->redirect(['view', 'sourcemessage_id' => $model->sourcemessage_id, 'language_id' => $model->language_id]);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing Message model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $sourcemessage_id
     * @param string $language_id
     * @return mixed
     */
    public function actionUpdate($sourcemessage_id, $language_id)
    {
        $model = $this->findModel($sourcemessage_id, $language_id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'sourcemessage_id' => $model->sourcemessage_id, 'language_id' => $model->language_id]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing Message model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $sourcemessage_id
     * @param string $language_id
     * @return mixed
     */
    public function actionDelete($sourcemessage_id, $language_id)
    {
        $this->findModel($sourcemessage_id, $language_id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Message model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $sourcemessage_id
     * @param string $language_id
     * @return Message the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($sourcemessage_id, $language_id)
    {
        if (($model = Message::findOne(['sourcemessage_id' => $sourcemessage_id, 'language_id' => $language_id])) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
