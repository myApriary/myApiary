<?php

namespace backend\modules\translate\controllers;

use Yii;
use backend\modules\translate\models\Sourcemessage;
use backend\modules\translate\models\SourcemessageSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\helpers\Json;

/**
 * SourcemessageController implements the CRUD actions for Sourcemessage model.
 */
class SourcemessageController extends Controller
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
     * Lists all Sourcemessage models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new SourcemessageSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Sourcemessage model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id=null)
    {
        if($id===null) {
            $model = new Sourcemessage();

        } else {
            $model=$this->findModel($id);
        }
        
        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            Yii::$app->session->setFlash('kv-detail-success', 'Saved record successfully');
            return $this->redirect(['view', 'id'=>$model->language_id]);
        } else {
            
            return $this->render('view', ['model'=>$model]);
        }
    }

    /**
     * Deletes an existing Sourcemessage model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id)
    {
        $post = Yii::$app->request->post();
        if (Yii::$app->request->isAjax && isset($post['custom_param'])) {
            if ($this->findModel($id)->delete()) {
                echo Json::encode([
                    'success' => true,
                    'messages' => [
                        'kv-detail-info' => 'Record # ' . $id . ' was successfully deleted.'
                    ]
                ]);
            } else {
                echo Json::encode([
                    'success' => false,
                    'messages' => [
                        'kv-detail-error' => 'Cannot delete record # ' . $id . '.'
                    ]
                ]);
            }
            return;
        }
    }

    /**
     * Finds the Sourcemessage model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Sourcemessage the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Sourcemessage::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
