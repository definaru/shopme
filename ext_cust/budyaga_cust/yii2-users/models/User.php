<?php

namespace budyaga_cust\users\models;

use Yii;
use yii\base\NotSupportedException;
use yii\behaviors\TimestampBehavior;
// use yii\db;
use yii\db\ActiveRecord;
use yii\web\IdentityInterface;
use yii\helpers\ArrayHelper;


class User extends ActiveRecord implements IdentityInterface
{
    const STATUS_PAY_STANDART = 1;
    const STATUS_PAY_GOLD = 2;
    const STATUS_PAY_FREE = 3;
    const STATUS_NEW = 1;
    const STATUS_ACTIVE = 2;
    const STATUS_BLOCKED = 3;
    const STATUS_PAY = 1;

    //const SEX_MALE = 1;
    //const SEX_FEMALE = 2;

    /*public function getDefaultPhoto()
    {
        return ($this->sex == self::SEX_MALE) ? 'male' : 'female';
    }*/

    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%user}}';
    }

    /*public static function getSexArray()
    {
        return [
            self::SEX_MALE => Yii::t('users', 'SEX_MALE'),
            self::SEX_FEMALE => Yii::t('users', 'SEX_FEMALE'),
        ];
    }*/

    public static function getStatusArray()
    {
        return [
            self::STATUS_NEW => Yii::t('users', 'STATUS_NEW'),
            self::STATUS_ACTIVE => Yii::t('users', 'STATUS_ACTIVE'),
            self::STATUS_BLOCKED => Yii::t('users', 'STATUS_BLOCKED'),
        ];
    }

    public static function getStatusPayArray()
    {
        return [
            self::STATUS_PAY_STANDART => Yii::t('users', 'STATUS_PAY_STANDART'),
            self::STATUS_PAY_GOLD => Yii::t('users', 'STATUS_PAY_GOLD'),
            self::STATUS_PAY_FREE => Yii::t('users', 'STATUS_PAY_FREE'),
        ];
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['api_key'], 'string', 'min' => 10, 'max' => 10],
            [['nickname'], 'string', 'min' => 3],
            [['contact_tel'], 'string', 'min' => 11, 'max' => 255],
            [['contact_skype', 'contact_icq'], 'string', 'min' => 2, 'max' => 255],
            ['email', 'required', 'message' => 'Вы не указали электронную почту'],
            ['email', 'email', 'message' => 'Указанный адрес не является электронной почтой'],
            [['pay_wm'], 'string', 'min' => 11, 'max' => 255],
            [['pay_yad'], 'number', 'min' => 10000000000, 'max' => 999999999999999999],
            [['pay_qiwi'], 'string', 'min' => 11, 'max' => 255],
            [['pay_other'], 'string', 'min' => 14, 'max' => 999],
	    [['lastname', 'photo'], 'string'],
	    //[['photo'], 'file'],
            [['email'], 'required', 'except' => ['oauth']],
            [['nickname', 'nik', 'act'], 'required'],
            [[/*'username', 'photo', */'email', 'auth_key', 'password_hash'], 'string', 'max' => 255],
            [['created_at', 'updated_at', 'status' /*'sex'*/], 'integer'],
            ['status', 'default', 'value' => self::STATUS_ACTIVE],
            ['position', 'default', 'value' => 'партнёр'],
            ['status', 'in', 'range' => [self::STATUS_NEW, self::STATUS_ACTIVE, self::STATUS_BLOCKED]]
            //['sex', 'in', 'range' => [self::SEX_MALE, self::SEX_FEMALE]]
        ];
    }


    public function getPermissions()
    {
        return $this->hasOne(AuthAssignment::className(), ['user_id' => 'id'])
            ->with('itemName')->select('item_name, user_id');
    }

    public function getProject(){
        return $this->hasMany(Project::className(), ['owner' => 'id']);
    }

    //public function getNamestatus() {
    //    return json_decode(['name' => Yii::$app->session]);
    //}

    
    public function behaviors()
    {
        return [
            TimestampBehavior::className(),
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            //'nickname' => Yii::t('users', 'NICKNAME'),
            'nickname' => 'Имя',
            'lastname' => 'Фамилия',
            'contact_tel' => Yii::t('users', 'TELf'),
            'contact_skype' => Yii::t('users', 'SKYPE'),
            'contact_icq' => Yii::t('users', 'ICQ'),
            'pay_wm' => Yii::t('users', 'WM'),
            'pay_yad' => Yii::t('users', 'YAD'),
            'pay_qiwi' => Yii::t('users', 'QIWI'),
            'pay_other' => Yii::t('users', 'OTHER'),
            'photo' => Yii::t('users', 'PHOTO'),
            'email' => Yii::t('users', 'EMAIL'),
            'position' => 'Должность',
            //'sex' => Yii::t('users', 'SEX'),
            'nik' => 'никнейм',
            'status' => Yii::t('users', 'STATUS'),
            'act' => Yii::t('users', 'STATUS'),
            'created_at' => Yii::t('users', 'CREATED_AT'),
            'updated_at' => Yii::t('users', 'UPDATED_AT'),
            'status_pay' => Yii::t('users', 'STATUS_PAY'),
            'password_hash' => Yii::t('users', 'PASS_ADMIN'),
        ];
    }

    /**
     * @inheritdoc
     */
    public static function findIdentity($id)
    {
        return static::findOne(['id' => $id, 'status' => self::STATUS_ACTIVE]);
    }

    /**
     * @inheritdoc
     */
    public static function findIdentityByAccessToken($token, $type = null)
    {
        throw new NotSupportedException('findIdentityByAccessToken is not implemented.');
    }

    /**
     * Finds user by username
     *
     * @param string $email
     * @return static|null
     */
    public static function findByEmailOrUserName($email)
    {
        return static::find()->where(['and', 'status=:status', ['or', 'email=:email'/*, 'username=:username'*/]], [':status' => self::STATUS_ACTIVE, ':email' => $email/*, ':username' => $email*/])->one();
    }

    public static function findByUsername($email)
    {
        return static::findOne(['email' => $email, 'status' => self::STATUS_ACTIVE]);
    }
    
    public static function findByPasswordResetToken($token)
    {
        if (!static::isPasswordResetTokenValid($token)) {
            return null;
        }

        return static::findOne([
            'password_reset_token' => $token,
            'status' => self::STATUS_ACTIVE,
        ]);
    }

    /**
     * Finds out if password reset token is valid
     *
     * @param string $token password reset token
     * @return boolean
     */
    public static function isPasswordResetTokenValid($token)
    {
        if (empty($token)) {
            return false;
        }
        $expire = Yii::$app->params['user.passwordResetTokenExpire'];
        $parts = explode('_', $token);
        $timestamp = (int)end($parts);
        return $timestamp + $expire >= time();
    }

    /**
     * @inheritdoc
     */
    public function getId()
    {
        return $this->getPrimaryKey();
    }

    /**
     * @inheritdoc
     */
    public function getAuthKey()
    {
        return $this->auth_key;
    }

    /**
     * @inheritdoc
     */
    public function validateAuthKey($authKey)
    {
        return $this->getAuthKey() === $authKey;
    }

    /**
     * Validates password
     *
     * @param string $password password to validate
     * @return boolean if password provided is valid for current user
     */
    public function validatePassword($password)
    {
        return ($this->password_hash!='' && Yii::$app->security->validatePassword($password, $this->password_hash));
    }

    /**
     * Generates password hash from password and sets it to the model
     *
     * @param string $password
     */
    public function setPassword($password)
    {
        $this->password_hash = Yii::$app->security->generatePasswordHash($password);
    }

    /**
     * Generates "remember me" authentication key
     */
    public function generateAuthKey()
    {
        $this->auth_key = Yii::$app->security->generateRandomString();
    }

    /**
     * Generates new password reset token
     */
    public function generatePasswordResetToken()
    {
        return Yii::$app->security->generateRandomString() . '_' . time();
    }

    /**
     * Removes password reset token
     */
    public function removePasswordResetToken()
    {
        $this->password_reset_token = null;
    }

    public function getPasswordResetToken()
    {
        return $this->hasOne(UserPasswordResetToken::className(), ['user_id' => 'id']);
    }

    public function createEmailConfirmToken($needConfirmOldEmail = false)
    {
        $token = new UserEmailConfirmToken;
        $token->user_id = $this->id;
        $token->new_email = $this->email;
        $token->new_email_token = Yii::$app->security->generateRandomString();
        $token->new_email_confirm = 0;

        if ($needConfirmOldEmail) {
            $token->old_email_token = Yii::$app->security->generateRandomString();
            $token->old_email_confirm = 0;
            $token->old_email = $this->oldAttributes['email'];
        }

        return $token->save();
    }

    public function sendEmailConfirmationMail($view, $toAttribute)
    {
        return \Yii::$app->mailer->compose(['html' => $view . '-html', 'text' => $view . '-text'], ['user' => $this, 'token' => $this->emailConfirmToken])
            ->setFrom([\Yii::$app->params['supportEmail'] => \Yii::$app->name ])
            ->setTo($this->emailConfirmToken->{$toAttribute})
            ->setSubject('Активация личного кабинета в ' . \Yii::$app->name)
            ->send();
    }

    public function getEmailConfirmToken()
    {
        return $this->hasOne(UserEmailConfirmToken::className(), ['user_id' => 'id']);
    }

    public function getOauthKeys()
    {
        return $this->hasMany(UserOauthKey::className(), 'user_id');
    }

    public function setEmail($email)
    {
        $this->email = $email;
        if ($this->createEmailConfirmToken($this->email != '')) {
            if ($this->sendEmailConfirmationMail(Yii::$app->controller->module->getCustomMailView('confirmNewEmail'), 'new_email')) {
                if ($this->sendEmailConfirmationMail(Yii::$app->controller->module->getCustomMailView('confirmChangeEmail'), 'old_email')) {
                    return true;
                }
            }
        }
        return false;
    }

    public function getAssignments()
    {
        return $this->hasMany(AuthAssignment::className(), ['user_id' => 'id']);
    }

    public function getAssignedRules()
    {
        return $this->hasMany(AuthItem::className(), ['name' => 'item_name'])->via('assignments');
    }

    public function getNotAssignedRules()
    {
        return AuthItem::find()->where(['not in', 'name', ArrayHelper::getColumn($this->assignedRules, 'name')])->all();
    }

	
    public function get_api_key()
	{
		$length = 10;
		$chartypes = "all";
		$chartypes_array=explode(",", $chartypes);
		$lower = 'abcdefghijklmnopqrstuvwxyz';
		$upper = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ';
		$numbers = '1234567890';
		$special = '^@*+-+%()!?';
		$chars = "";
		if (in_array('all', $chartypes_array)) {
			$chars = $lower . $upper. $numbers . $special;
		} else {
			if(in_array('lower', $chartypes_array))
				$chars = $lower;
			if(in_array('upper', $chartypes_array))
				$chars .= $upper;
			if(in_array('numbers', $chartypes_array))
				$chars .= $numbers;
			if(in_array('special', $chartypes_array))
				$chars .= $special;
		}
		$chars_length = strlen($chars) - 1;
		$string = $chars{rand(0, $chars_length)};
		for ($i = 1; $i < $length; $i = strlen($string)) {
			$random = $chars{rand(0, $chars_length)};
			if ($random != $string{$i - 1}) $string .= $random;
		}
		$this->api_key = $string;
	}

	
    public function role_default($id)
	{
	    Yii::$app->db->createCommand()->insert('auth_assignment', ['item_name' => 'partner', 'user_id' => $id, 'created_at' => time(),])->execute();
	}
	
    public function price_default($id)
	{
	    Yii::$app->db->createCommand()->insert('pricepartner', ['name' => 'default', 'partner_id' => $id, 'default' => 1,])->execute();
	}
}
