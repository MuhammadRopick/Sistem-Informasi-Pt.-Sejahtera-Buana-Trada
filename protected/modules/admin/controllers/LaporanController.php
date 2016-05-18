<?php

namespace app\modules\admin\controllers;

use Yii;
use app\models\TransaksiService;
use app\models\BarangOrder;
use app\models\Supplier;
use app\modules\admin\models\BarangSearch;

use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use kartik\mpdf\Pdf;
/**
 * BarangController implements the CRUD actions for Barang model.
 */
class LaporanController extends Controller
{
    public $bulan = array(1=>'januari','februari','maret','april','mei','juni','juli','agustus','september','oktober','november','desember');
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
    function actionIndex()
    {
        return $this->render('index',[
                'bulan'=>$this->bulan
            ]);
    }
    function actionProses()
    {
        $req=Yii::$app->request;
        $jenis=$req->post('data');
        $bulan=$req->post('bulan');
        $tahun=$req->post('tahun');

        if(strlen($bulan)==1)
        {
            $bulan='0'.$bulan;
        }
        $start_date=$tahun.'-'.$bulan.'-01';
        $end_date=$tahun.'-'.$bulan.'-31';
        if($jenis==1)
        {
            $view="_laporan_transaksi";
            $data=TransaksiService::find()->where(['BETWEEN','tanggal',$start_date,$end_date])->all();
        }
        else
        {
            $view="_laporan_order";
            $data=BarangOrder::find()->where(['BETWEEN','tgl_order',$start_date,$end_date])->all();
        }

        $content = $this->renderPartial($view,['data'=>$data]);
        $pdf = new Pdf([
            // set to use core fonts only
            'mode' => Pdf::MODE_CORE, 
            // A4 paper format
            'format' => Pdf::FORMAT_A4, 
            // portrait orientation
            'orientation' => Pdf::ORIENT_PORTRAIT, 
            // stream to browser inline
            'destination' => Pdf::DEST_BROWSER,
            'cssFile' => '@vendor/kartik-v/yii2-mpdf/assets/kv-mpdf-bootstrap.min.css',
            'cssInline'=> '
                table thead tr th,
                table tbody tr td
                {
                    table-layout: fixed;
                    border-collapse: collapse;
                }

                ',
            // your html content input
            'content' => $content,
             // set mPDF properties on the fly
            'options' => ['title' => 'Laporan'],
        ]);
        $response = Yii::$app->response;
        $response->format = \yii\web\Response::FORMAT_RAW;
        $headers = Yii::$app->response->headers;
        $headers->add('Content-Type', 'application/pdf');
        return $pdf->render();   
    }
}