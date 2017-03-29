<?php

namespace backend\modules\translate\controllers;

use Yii;
use backend\modules\translate\models\Sourcemessage;
use backend\modules\translate\models\SourcemessageSearch;
use backend\modules\translate\models\Message;
use backend\modules\translate\models\Locale;
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

        // validate if there is a editable input saved via AJAX
        if (Yii::$app->request->post('hasEditable')) {

            $id = Yii::$app->request->post('editableKey');
            $model = Message::findOne([$id, Yii::$app->session->get('u_lang')]);
            if(empty($model)) {
                $model = new  Message();
                $model->id = $id;
                $model->language = Yii::$app->session->get('u_lang');
            }
            // store a default json response as desired by editable
            $out = Json::encode(['output'=>'', 'message'=>'']);

            // fetch the first entry in posted data (there should only be one entry 
            // anyway in this array for an editable submission)
            // - $posted is the posted data for Book without any indexes
            // - $post is the converted array for single model validation
            $posted = current($_POST['Sourcemessage']);

            $post = ['Message' => $posted];

            // load model like any single model validation
            if ($model->load($post)) {

                // can save model or do something before saving model
                $model->save();

                // custom output to return to be displayed as the editable grid cell
                // data. Normally this is empty - whereby whatever value is edited by
                // in the input by user is updated automatically.
                $output = '';

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

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
            //'model' => $model, 
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
