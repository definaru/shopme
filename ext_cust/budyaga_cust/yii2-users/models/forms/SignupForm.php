<?php
namespace budyaga_cust\users\models\forms;

use budyaga_cust\users\models\User;
use budyaga_cust\users\models\Scripts;
use yii\base\Model;
use Yii;

/**
 * Signup form
 */
class SignupForm extends Model
{
    public $nickname;
    public $email;
    public $api_key;
    public $password;
    public $photo;
    //public $password_repeat;
    //public $sex;
    //public $photo;

    /**
     * @inheritdoc
     */
	
	
    public function rules()
    {
        return [
            ['nickname', 'filter', 'filter' => 'trim'],
            ['nickname', 'string', 'min' => 2, 'max' => 255],
            //['photo', 'string'],
            //['username', 'unique', 'targetClass' => '\budyaga_cust\users\models\User', 'message' => Yii::t('users', 'THIS_USERNAME_ALREADY_TAKEN')],
            ['nickname', 'required', 'message' => Yii::t('users', 'NIKERROR')],
            //['nickname', 'match', 'pattern'=>'/^[а-яА-ЯёЁ]+$/u', 'message' => 'Напишите ваше реальное имя!'],
            
            ['email', 'filter', 'filter' => 'trim'],
            ['email', 'required', 'message' => Yii::t('users', 'MAILERROR')],
            ['email', 'email', 'message' => Yii::t('users', 'MAILNO')],
            ['email', 'string', 'max' => 255],
            ['email', 'unique', 'targetClass' => '\common\models\User', 'message' => Yii::t('users', 'UNICMAIL')],            
            //['email', 'unique', 'targetClass' => '\budyaga_cust\users\models\User', 'message' => Yii::t('users', 'THIS_EMAIL_ALREADY_TAKEN')],
            //['sex', 'in', 'range' => [User::SEX_MALE, User::SEX_FEMALE]],
            //['photo', 'safe'],

            [['password'/*, 'password_repeat'*/], 'required', 'message' => Yii::t('users', 'PASSERROR')],
            [['password'/*, 'password_repeat'*/], 'string', 'min' => 6],
            //['password_repeat', 'compare', 'compareAttribute' => 'password'],
        ];
    }


    public function attributeLabels()
    {
        return [
            'nickname' => Yii::t('users', 'USERNAME'),
            'email' => Yii::t('users', 'EMAIL'),
            //'sex' => Yii::t('users', 'SEX'),
            'password' => Yii::t('users', 'PASSWORD'),
            'password_repeat' => Yii::t('users', 'PASSWORD_REPEAT'),
            //'photo' => Yii::t('users', 'PHOTO'),
        ];
    }

    /**
     * Signs user up.
     *
     * @return User|null the saved model or null if saving fails
     */
    public function signup($photo = '')
    {
        if ($this->validate()) {
            $user = new User();
            $user->attributes = $this->attributes;
            $user->photo = $photo;
            $user->status = User::STATUS_ACTIVE;
            $user->act = User::STATUS_NEW;
            $user->position = '';
            $user->nik = Scripts::getRefLink();
            $user->setPassword($this->password);
            $user->generateAuthKey();
            $user->get_api_key(); // api_key = Scripts::generatess(14); 
            if ($user->save()) {
                return $user;
            }
        }
        return null;
    }
    
    public function sendEmail($email)
    {
        sleep(2);
        if ($this->validate()) {
        return Yii::$app->mailer->compose()
            ->setTo($this->email)
            ->setFrom([$email => Yii::$app->params['name']])
            ->setSubject('Register in the "'.Yii::$app->params['name'].'" Affiliate Network')
            ->setHtmlBody('            
<table style="width:100%;" border="0">
    <tr bgcolor="#111">
        <td style="width:10%;"></td>
        <td style="width:80%;padding:10px;font-family: sans-serif;"><h1 style="color:#ff214f;">'.Yii::$app->params['name'].'</h1></td>
        <td style="width:10%;"></td>
    </tr>
    <tr>
        <td></td>
        <td style="font-family: sans-serif;">
<br/>
<br/>
            <h3>Hello, '.$this->nickname.'.</h3>
<p>Congratulations on your successful performance in our affiliate program.</p>
<br/>
<p>Your login: '.$this->email.'</p>
<p>Your password: '.$this->password.'</p>
<br/>
<br/>
    <a href="'.Scripts::site().'/login" style="border-radius: 7px;text-decoration: none;">
        <span style="font-family: sans-serif;color:white;background:#FF214F;text-decoration: none;padding: 9px 20px;border-radius: 7px;">
            Affiliate Program Login 
        </span>
    </a>
<br/><br/>
<strong style="color:red;">Attention! A temporary password has been sent to you. For your safety, we strongly recommend that you change your password.</strong>
<br/>
<br/>

<span style="color:#969393;">
<br/>
Regards, "'.Yii::$app->params['name'].'" Team</span>
        </td>
        <td></td>
    </tr>
    <tr>
        <td></td>
        <td style="font-family: sans-serif;"><br>&copy; '.date('Y').' Copyright - '.Yii::$app->params['name'].'</td>
        <td></td>
    </tr>
    <tr>
        <td colspan="3"></td>
    </tr>
</table> 
            ')
            ->send(); return true;
        }
        return false;        
    }

}
