<?php

namespace app\modules\pimpinan\controllers;

use app\models\FormAccount;
use app\models\LoginForm;
use app\models\User;

use Yii;
use yii\web\Controller;
use yii\filters\AccessControl;
use yii\filters\VerbFilter;

class AuthController extends BasepimpinanController
{
	function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'rules' => [
                    [
                        'actions' => ['logout','account'],
                        'allow' => true,
                        'matchCallback'=>function()
                        {
                            return (Yii::$app->user->identity->level==3);
                        }
                    ],
                    [
                        'actions' => ['index','login'],
                        'allow' => true,
                        'roles' => ['?','@']
                    ],
                ],
                'denyCallback' => function ($rule, $action)
                {
                    $url=Yii::$app->urlManager->createUrl(['/']);
                    return $this->redirect($url);
                }
            ],
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'index' => ['get'],
                    'login'=>['get','post']
                ],
            ],
        ];
    }

   	public function actionIndex()
    {
    	if(!Yii::$app->user->isGuest)
    	{
            if(Yii::$app->user->identity->level==3)
            {
                return $this->render('index');
            }
            else
            {
               Yii::$app->user->logout();
               return $this->redirect(['/']);
            }
    	}
    	else
    	{
            return $this->redirect(['/']);
    	}
    }
    /*function actionLogin()
    {
        $this->layout="//login";
        $model = new LoginForm();
        if($model->load(Yii::$app->request->post()) && $model->login())
        {
            $this->redirect(['index']);
        }
        return $this->render('login',[
            'model'=>$model,
            'modulename'=>$this->modulename,
        ]);
    }*/
    function actionAccount()
    {
        $model = new FormAccount;
        $req=Yii::$app->request;
        if($req->isPost)
        {
            $up = User::findOne(Yii::$app->user->identity->id);
            $model->load($req->post());
            if($model->validate())
            {
                $up->username=$model->username_baru;
                $up->password=Yii::$app->getSecurity()->generatePasswordHash($model->password_baru);
                $up->auth_key=Yii::$app->getSecurity()->generateRandomString();
                $up->level="3";
                $up->updated_at=date('Y-m-d H:i:s');
                if($up->save())
                {
                    Yii::$app->session->setFlash('true','Akun berhasil diupdate');
                    return $this->redirect(['account']);
                }
            }
        }
        return $this->render('formaccount',[
            'model'=>$model
            ]);
    }
    function actionLogout()
    {
        Yii::$app->user->logout();
        return $this->redirect(['/']);
    }
}
