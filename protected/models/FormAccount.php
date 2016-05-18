<?php

namespace app\models;

use Yii;
use yii\base\Model;
use app\models\User;
/**
 * LoginForm is the model behind the login form.
 */
class FormAccount extends Model
{
    public $username;
    public $password;
    public $username_baru;
    public $password_baru;
    private $_user = false;

    /**
     * @return array the validation rules.
     */
    public function rules()
    {
        return [
            [['username', 'password','username_baru','password_baru'], 'required'],
            ['username','findUsername'],
            ['password','findPassword'],
            //['password', 'validatePassword'],
        ];
    }
    function findUsername($attribute, $params)
    {
        $user = User::findOne(Yii::$app->user->identity->id);
        if($this->username!=$user->username)
        {
           $this->addError($attribute,'Username is incorrect'); 
        }
    }
    function findPassword($attribute, $params)
    {
        $user = User::findOne(Yii::$app->user->identity->id);
        if(!Yii::$app->getSecurity()->validatePassword($this->password,$user->password))
        {
           $this->addError($attribute,'Password is incorrect'); 
        }
    }
}
