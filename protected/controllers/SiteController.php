<?php

namespace app\controllers;

use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\filters\VerbFilter;
use yii\helpers\Url;

use app\models\LoginForm;
use app\models\ContactForm;

class SiteController extends Controller
{
    public $layout="mains";
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'rules' => [
                    [
                        'actions' => ['index','login'],
                        'allow' => true,
                        'roles' => ['?','@'],
                    ],
                    [
                        'actions' => ['logout'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ],
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'index'=>['get'],
                    'login'=>['get','post'],
                    'logout' => ['post'],
                ],
            ],
        ];
    }

    public function actions()
    {
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
            ],
            'captcha' => [
                'class' => 'yii\captcha\CaptchaAction',
                'fixedVerifyCode' => YII_ENV_TEST ? 'testme' : null,
            ],
        ];
    }

    public function actionIndex()
    {
        if(!Yii::$app->user->isGuest)
        {
            if(Yii::$app->user->identity->level==1)
            {
                $url='admin/auth/index';//Yii::$app->getUrlManager()->createUrl(['admin/auth/index']);
            }
            elseif(Yii::$app->user->identity->level==2)
            {
               $url='supervisor/auth/index';
            }
            elseif(Yii::$app->user->identity->level==3)
            {
               $url='pimpinan/auth/index';
            }
            return $this->redirect([$url]);
        }
        else
        {
            return $this->redirect(['login']);
        }
        
    }

    function actionLogin()
    {
        $this->layout="//login";
        $model = new LoginForm();
        $req=Yii::$app->request;
        if($req->isPost)
        {
            $model->load($req->post());
            //echo "<pre>";
            //print_r($req->post());
            if($model->validate())
            {
                if($model->login())
                {
                    return $this->redirect(['index']);
                }
            }
        }
        return $this->render('login',[
            'model'=>$model,
        ]);
        /*if (!\Yii::$app->user->isGuest) {
            return $this->goHome();
        }

        $model = new LoginForm();
        if ($model->load(Yii::$app->request->post()) && $model->login()) {
            return $this->goBack();
        }
        return $this->render('login', [
            'model' => $model,
        ]);*/
    }

    public function actionLogout()
    {
        Yii::$app->user->logout();

        return $this->redirect(['index']);
    }
}
