<?php
namespace budyaga_cust\users\models\forms;

use budyaga_cust\users\models\User;
use budyaga_cust\users\models\UserPasswordResetToken;
use yii\base\Model;
use Yii;

/**
 * Password reset request form
 */
class PasswordResetRequestForm extends Model
{
    public $email;

    private $_user = false;

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            ['email', 'filter', 'filter' => 'trim'],
            ['email', 'required', 'message' => 'Вы не указали вашу электронную почту'],
            //['email', 'required'],
            ['email', 'email', 'message' => 'Введёный вами адрес не является электронной почтой'],
            ['email', 'exist',
                'targetClass' => '\budyaga_cust\users\models\User',
                'filter' => ['status' => User::STATUS_ACTIVE],
                'message' => 'Да нет у нас такого пользователя с такой электронной почтой!'
            ],
        ];
    }

    /**
     * Sends an email with a link, for resetting the password.
     *
     * @return boolean whether the email was send
     */
    public function sendEmail()
    {
        $user = $this->user;
        if (!$user) {
            return false;
        }
		
        $view = Yii::$app->controller->module->getCustomMailView('passwordResetToken');
		
        return \Yii::$app->mailer->compose(['html' => $view . '-html', 'text' => $view . '-text'], ['user' => $user, 'token' => $this->token])
            ->setFrom([\Yii::$app->params['supportEmail'] => \Yii::$app->name])
            ->setTo($this->email)
            ->setSubject('Восстановление пароля в ' . \Yii::$app->name)
            ->send();
    }

    public function getUser()
    {
        if ($this->_user === false) {
            $this->_user = User::findOne([
                'status' => User::STATUS_ACTIVE,
                'act' => User::STATUS_ACTIVE,
                'email' => $this->email,
            ]);
        }

        return $this->_user;
    }

    public function attributeLabels()
    {
        return [
            'email' => Yii::t('users', 'EMAIL'),
        ];
    }

    public function getToken()
    {
        $user = $this->user;
        $token = UserPasswordResetToken::findOne(['user_id' => $user->id]);
        if ($token == null) {
            $token = new UserPasswordResetToken;
            $token->user_id = $user->id;
            $token->token = $user->generatePasswordResetToken();
            $token->save();
        }
        return $token;
    }
}
