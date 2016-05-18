<?php
namespace app\modules\supervisor\controllers;

use app\models\User;
use app\models\UserAccess;
use app\models\UserLevel;
use app\models\Log;

use Yii;
use yii\web\Controller;

class BasesuperController extends Controller
{
	public $modulename='supervisor';
	//public $layout="main";
	function getLevelName()
	{
		$level=UserLevel::findOne(Yii::$app->user->identity->level);
		return $level->level;
	}
}