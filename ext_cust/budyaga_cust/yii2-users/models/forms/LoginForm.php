<?php
namespace budyaga_cust\users\models\forms;

use Yii;
use yii\base\Model;
use budyaga_cust\users\models\User;
use yii\helpers\Html;

/**
 * Login form
 */
class LoginForm extends Model
{
    public $email;
    public $password;
    public $rememberMe = true;

    private $_user = false;
    //private $_user;


    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            ['rememberMe', 'boolean'],
            ['password', 'validatePassword'],
            [['email'], 'required', 'message' => Yii::t('users', 'LOGINERROR')],
            [['password'], 'required', 'message' => Yii::t('users', 'PASSWORDERROR')],            
        ];
    }

    public function validatePassword($attribute, $params)
    {// 
        if (!$this->hasErrors()) {
            $user = $this->getUser();
            if (!$user || !$user->validatePassword($this->password)) {
                $this->addError($attribute, Yii::t('users', 'PASSWORDFALSE'));
            } elseif ($user && $user->act == 3) {
                $this->addError('email', Yii::t('users', 'LOGINBLOCK'));
            } elseif ($user && $user->act == 1) {
                $this->addError('password', Yii::t('users', 'ACTIVEACCOUNT'));
            }
        }
    }

    public function attributeLabels()
    {
        return [
            'email' => Yii::t('users', 'EMAIL_OR_USERNAME'),
            'password' => Yii::t('users', 'PASSWORD'),
            'rememberMe' => Yii::t('users', 'REMEMBER_ME'),
        ];
    }

    public function login()
    {
        if ($this->validate()) {
            return Yii::$app->user->login($this->getUser(), $this->rememberMe ? 3600 * 24 * 30 : 0);
        } else {
            return false;
        }
    }

    public function getUser()
    {
        if ($this->_user === false) {
            $this->_user = User::findByUsername($this->email);
            //$this->_user = User::findByEmailOrUserName($this->email);
        }
        return $this->_user;
    }
}
