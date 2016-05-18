<?php

namespace app\modules\admin\controllers;

use Yii;
use app\models\TransaksiService;
use app\modules\admin\models\TransaksiServiceSearch;
use app\models\Mekanik;
use app\models\Pelanggan;
use app\models\Barang;

use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * TransaksiserviceController implements the CRUD actions for TransaksiService model.
 */
class TransaksiserviceController extends Controller
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
     * Lists all TransaksiService models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new TransaksiServiceSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
        $mekanik=Mekanik::find()->all();
        $pelanggan=Pelanggan::find()->all();
        $barang=Barang::find()->all();
        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
            'mekanik'=>$mekanik,
            'pelanggan'=>$pelanggan,
            'barang'=>$barang
        ]);
    }

    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new TransaksiService model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new TransaksiService();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        }
        $mekanik=Mekanik::find()->all();
        $pelanggan=Pelanggan::find()->all();
        $barang=Barang::find()->all();
        return $this->render('create', [
            'model' => $model,
            'mekanik'=>$mekanik,
            'pelanggan'=>$pelanggan,
            'barang'=>$barang
        ]);
    }

    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        }
        $mekanik=Mekanik::find()->all();
        $pelanggan=Pelanggan::find()->all();
        $barang=Barang::find()->all();
        return $this->render('update', [
            'model' => $model,
            'mekanik'=>$mekanik,
            'pelanggan'=>$pelanggan,
            'barang'=>$barang
        ]);
    }
    function actionGetpelanggan()
    {
        $req=Yii::$app->request;
        if($req->isAjax)
        {
            $id=$req->post('param');
            $nama=Pelanggan::findOne($id);
            echo $nama->nama;
        }
    }
    function actionGethargabarang()
    {
        $req=Yii::$app->request;
        if($req->isAjax)
        {
            $id=$req->post('param');
            $data=Barang::findOne($id);
            echo $data->harga_jual;
            /*$html="
            <h4>Detail Barang</h4>
            <table class='table table-bordered'>
                <tbody>
                    <tr>
                        <td>Nama</td>
                        <td>".$data->nama."</td>
                    </tr>
                    <tr>
                        <td>Supplier</td>
                        <td>".@$data->supplier->nama."</td>
                    </tr>
                    <tr>
                        <td>Jumlah</td>
                        <td>".$data->jumlah."</td>
                    </tr>
                    <tr>
                        <td>Harga Beli</td>
                        <td>Rp. ".number_format($data->harga_beli,0,',','.')."</td>
                    </tr>
                    <tr>
                        <td>Harga Jual</td>
                        <td>Rp. ".number_format($data->harga_jual,0,',','.')."</td>
                    </tr>
                </tbody>
            </table>
            ";*/
        }
    }
    /**
     * Deletes an existing TransaksiService model.
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
     * Finds the TransaksiService model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return TransaksiService the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = TransaksiService::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
