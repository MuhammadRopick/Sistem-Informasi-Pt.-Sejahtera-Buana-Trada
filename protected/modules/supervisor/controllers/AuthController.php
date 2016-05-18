<?php

namespace app\modules\supervisor\controllers;

use app\models\LoginForm;
use app\models\User;

use Yii;
use yii\web\Controller;
use yii\filters\AccessControl;
use yii\filters\VerbFilter;

class AuthController extends BasesuperController
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
                            return (Yii::$app->user->identity->level==2);
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
            if(Yii::$app->user->identity->level==2)
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
        ]);
    }*/
    function actionLogout()
    {
        Yii::$app->user->logout();
        return $this->redirect(['/']);
    }
}
