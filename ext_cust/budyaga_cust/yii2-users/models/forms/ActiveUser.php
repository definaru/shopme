<?php

namespace budyaga_cust\users\models\forms;

use Yii;
//use budyaga_cust\users\models\Scripts;

class ActiveUser extends \yii\base\Model 
{

    public $name;
    
    public $email;

    
    public function rules()
    {
        return [
            [['name', 'email'], 'required'],
            ['email', 'email'],
        ];
    }
    
    public function sendEmail($email)
    {
        $suffix = Yii::$app->user->identity;
        if ($this->validate()) {
            return Yii::$app->mailer->compose(['html' => 'active'], ['user' => $suffix->nickname, 'email' => $suffix->email])
            ->setTo($email)
            ->setFrom([$suffix->email => $suffix->nickname])
            ->setSubject($suffix->nickname.' requests access to your account')
            ->send(); return true;
        }
        return false;        
    }
    
    
}
