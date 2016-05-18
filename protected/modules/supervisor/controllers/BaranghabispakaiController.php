<?php

namespace app\modules\supervisor\controllers;

use Yii;
use app\models\Barang;
use app\models\BarangHabisPakai;
use app\models\BarangHabisPakaiSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * BaranghabispakaiController implements the CRUD actions for BarangHabisPakai model.
 */
class BaranghabispakaiController extends Controller
{
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['post'],
                ],
            ],
        ];
    }

    /**
     * Lists all BarangHabisPakai models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new BarangHabisPakaiSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
        $barang=Barang::find()->all();
        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
            'barang'=>$barang
        ]);
    }

    /**
     * Displays a single BarangHabisPakai model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new BarangHabisPakai model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new BarangHabisPakai();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        }
        $barang=Barang::find()->all();
        return $this->render('create', [
                'model' => $model,
                'barang'=>$barang
            ]);
    }

    /**
     * Updates an existing BarangHabisPakai model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
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

    /**
     * Deletes an existing BarangHabisPakai model.
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
     * Finds the BarangHabisPakai model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return BarangHabisPakai the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = BarangHabisPakai::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
    function actionGetbarang()
    {
        $req=Yii::$app->request;
        if($req->isAjax)
        {
            $id=$req->post('param');   
            $data=Barang::findOne($id);
            echo $data->nama;
        }
        else
        {
            return $this->redirect(['index']);
        }
    }
}
