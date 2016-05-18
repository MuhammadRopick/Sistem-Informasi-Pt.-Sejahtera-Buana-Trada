<?php

namespace app\modules\admin\controllers;

use Yii;
use app\models\User;
use app\modules\admin\models\UserSearch;
use app\models\UserLevel;

use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;

class UserController extends BaseadminController
{
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'rules' => [
                    [
                        'actions' => ['index','create','view','update','delete'],
                        'allow' => true,
                        'matchCallback'=>function()
                        {
                            return (Yii::$app->user->identity->level==1);
                        }
                    ]
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
                    'delete' => ['post'],
                ],
            ],
        ];
    }

    public function actionIndex()
    {
        $searchModel = new UserSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
        $level=UserLevel::find()->all();
        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
            'level'=>$level
        ]);
    }

    public function actionView($id)
    {
        $model = $this->findModel($id);
        return $this->render('view', [
            'model' => $model,
        ]);
    }

    public function actionCreate()
    {
        $model = new User();
        $model->scenario="create";
        $req=Yii::$app->request;
        if($req->isPost)
        {
            $model->load($req->post());
            $model->password=Yii::$app->security->generatePasswordHash($model->password);
            $model->auth_key=Yii::$app->getSecurity()->generateRandomString();
            $model->created_at=date('Y-m-d H:i:s');
            $model->updated_at=date('Y-m-d H:i:s');
            if($model->validate())
            {
                if($model->save())
                {
                    return $this->redirect(['view', 'id' => $model->id]);
                }
            }
        }
        $level=UserLevel::find()->all();
        return $this->render('create', [
            'model' => $model,
            'level'=>$level
        ]);
    }

    public function actionUpdate($id)
    {
        $model = $this->findModel($id);
        $model->scenario="update_no_pass";
        $req=Yii::$app->request;
        if($req->isPost)
        {
            $ganti=Yii::$app->request->post('change_pass');
            $model->load($req->post());
            if($ganti==1)
            {
                $model->scenario='update_with_pass';
                $model->password=Yii::$app->security->generatePasswordHash($model->password);
                $model->auth_key=Yii::$app->getSecurity()->generateRandomString();
            }
            $model->updated_at=date('Y-m-d H:i:s');
            if($model->validate())
            {
                if($model->save())
                {
                    return $this->redirect(['view', 'id' => $model->id]);
                }
            }
        }
        $level=UserLevel::find()->all();
        return $this->render('update', [
            'model' => $model,
            'level'=>$level,
        ]);
    }

    public function actionDelete($id)
    {
        $model=$this->findModel($id);

        $model->delete();

        Yii::$app->session->setFlash('true','User berhasil dihapus');
        return $this->redirect(['index']);
    }

    protected function findModel($id)
    {
        if (($model = User::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
