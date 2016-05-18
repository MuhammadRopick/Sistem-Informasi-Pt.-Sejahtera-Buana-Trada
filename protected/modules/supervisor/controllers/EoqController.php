<?php

namespace app\modules\supervisor\controllers;

use Yii;
use app\models\Eoq;
use app\models\EoqSearch;
use app\models\Barang;

use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\AccessControl;
use yii\filters\VerbFilter;

/**
 * EoqController implements the CRUD actions for Eoq model.
 */
class EoqController extends Controller
{
    function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'rules' => [
                    [
                        'actions' => ['index','view','create','update','delete','getbarang'],
                        'allow' => true,
                        'matchCallback'=>function()
                        {
                            return (Yii::$app->user->identity->level==2);
                        }
                    ],
                ],
                'denyCallback' => function ($rule, $action)
                {
                    $url=Yii::$app->urlManager->createUrl([$this->modulename]);
                    return $this->redirect($url);
                }
            ],
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'index' => ['get'],
                    'view'=>['get'],
                    'create'=>['get','post'],
                    'update'=>['get','post'],
                    'delete'=>['post'],
                ],
            ],
        ];
    }
    public function actionIndex()
    {
        $searchModel = new EoqSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
        $barang=Barang::find()->all();
        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
            'barang'=>$barang
        ]);
    }
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    public function actionCreate()
    {
        $model = new Eoq();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            $barang=Barang::find()->all();
            return $this->render('create', [
                'model' => $model,
                'barang'=>$barang
            ]);
        }
    }

    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            $barang=Barang::find()->all();
            return $this->render('update', [
                'model' => $model,
                'barang'=>$barang
            ]);
        }
    }
    function actionGetbarang()
    {
        $req=Yii::$app->request;
        if($req->isAjax)
        {
            $id=$req->post('param');
            $data=Barang::findOne($id);
            echo json_encode(['nama'=>$data->nama,'harga'=>$data->harga_beli]);
        }
    }
    /**
     * Deletes an existing Eoq model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Eoq model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Eoq the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Eoq::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
