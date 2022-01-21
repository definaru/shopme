<?php

namespace budyaga_cust\users\models;

use Yii;

/**
 * This is the model class for table "user".
 *
 * @property int $id
 * @property string $auth_key
 * @property string $password_hash
 * @property string $email
 * @property int $status
 * @property int $created_at
 * @property int $updated_at
 * @property int $status_pay
 * @property string $api_key
 * @property string $position
 * @property string $nickname
 * @property string $lastname
 * @property string $photo
 * @property string $balance
 * @property string $nik
 * @property string $contact_tel
 * @property string $contact_skype
 * @property string $contact_icq
 * @property string $pay_wm
 * @property string $pay_yad
 * @property string $pay_qiwi
 * @property string $pay_other
 * @property int $act
 *
 * @property UserEmailConfirmToken[] $userEmailConfirmTokens
 * @property UserOauthKey[] $userOauthKeys
 * @property UserPasswordResetToken[] $userPasswordResetTokens
 */
class Users extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'user';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [
                [
                    'auth_key', 'password_hash', 'created_at', 
                    'updated_at', 'api_key', 'position', 'nik', 
                    'email'
                ], 
                'required'
            ],
            ['nickname', 'required', 'message' => Yii::t('yii', 'Enter your first name')],
            ['lastname', 'required', 'message' => Yii::t('yii', 'Enter your last name')],
            ['contact_tel', 'required', 'message' => Yii::t('yii', 'Write your phone number')],
            [['status', 'created_at', 'updated_at', 'status_pay', 'act'], 'integer'],
            [['api_key'], 'string'],
            [['auth_key'], 'string', 'max' => 32],
            [['password_hash', 'photo', 'balance', 'contact_icq', 'pay_other'], 'string', 'max' => 255],
            [['position', 'contact_skype', 'pay_wm', 'pay_yad', 'pay_qiwi'], 'string', 'max' => 100],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('yii', 'ID'),
            'auth_key' => Yii::t('yii', 'Auth Key'),
            'password_hash' => Yii::t('yii', 'Password Hash'),
            'email' => Yii::t('yii', 'Email'),
            'status' => Yii::t('yii', 'Status'),
            'created_at' => Yii::t('yii', 'Created At'),
            'updated_at' => Yii::t('yii', 'Updated At'),
            'status_pay' => Yii::t('yii', 'Status Pay'),
            'api_key' => Yii::t('yii', 'Api Key'),
            'position' => Yii::t('yii', 'Position'),
            'nickname' => Yii::t('yii', 'Nickname'),
            'lastname' => Yii::t('yii', 'Lastname'),
            'photo' => Yii::t('yii', 'Photo'),
            'balance' => Yii::t('yii', 'Balance'),
            'nik' => Yii::t('yii', 'Nik'),
            'contact_tel' => Yii::t('yii', 'Contact Tel'),
            'contact_skype' => Yii::t('yii', 'Contact Skype'),
            'contact_icq' => Yii::t('yii', 'Contact Icq'),
            'pay_wm' => Yii::t('yii', 'Pay Wm'),
            'pay_yad' => Yii::t('yii', 'Pay Yad'),
            'pay_qiwi' => Yii::t('yii', 'Pay Qiwi'),
            'pay_other' => Yii::t('yii', 'Pay Other'),
            'act' => Yii::t('yii', 'Act'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUserEmailConfirmTokens()
    {
        return $this->hasMany(UserEmailConfirmToken::className(), ['user_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUserOauthKeys()
    {
        return $this->hasMany(UserOauthKey::className(), ['user_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUserPasswordResetTokens()
    {
        return $this->hasMany(UserPasswordResetToken::className(), ['user_id' => 'id']);
    }
}
