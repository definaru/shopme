<?php

namespace budyaga_cust\users\models\forms;

use Yii;
use yii\base\Model;
use budyaga_cust\users\models\Defina;
use budyaga_cust\users\models\Scripts;

class ContactForm extends Model
{
    
    public static function tableName() 
    {
        return '1038_mail';
    }
    
    public $city;
    public $img;
    public $name;
    public $phone;
    public $email;
    public $slug;
    public $body;
    public $file;
    public $ip;
    public $date;   
    public $pub;   
    public $verifyCode;


    public function rules()
    {
        return [
            [['ip', 'date', 'slug', 'pub', 'img'], 'required'],
            ['email', 'email', 'message' => Yii::t('yii', 'The specified address is not an e-mail')],
            [['file'], 'file', 'extensions' => Defina::extensions, 'maxSize' => 10*1024*1024, 'skipOnEmpty' => true],
            ['file', 'default', 'value' => '1'],
            ['phone', 'required', 'message' => Yii::t('yii', 'Write your phone number')],
            ['name', 'required', 'message' => Yii::t('yii', 'Enter your name')],
            ['city', 'required', 'message' => Yii::t('yii', 'Enter your city')],
            //['name', 'match', 'pattern'=>'/^[а-яА-ЯёЁ]+$/u', 'message' => 'Напишите ваше реальное имя!'],
            ['email', 'required', 'message' => Yii::t('yii', 'Enter your email address')],
            ['body', 'required', 'message' => Yii::t('yii', 'Write your message')],
            ['verifyCode', 'required', 'message' => Yii::t('yii', 'Write the code from the image')],
            //['verifyCode', 'captcha'],
            ['verifyCode', (Yii::$app->user->isGuest) ? 'captcha' : 'string'],
        ];
    }
    
    

    public function attributeLabels()
    {
        return [
            'verifyCode' => 'Верификационный код',
        ];
    }    
    

    public function sendEmail($email)
    {
        if ($this->validate()) {
        return Yii::$app->mailer->compose()
            ->setTo($email)
            ->setFrom([$this->email => $this->name])
            ->setSubject(Defina::Subscripts)
            ->setHtmlBody('
<table align="center" border="0" cellpadding="0" cellspacing="0" style="width:100%;background: #ddd;">
    <tbody>
        <tr><td><p>&nbsp;</p><p>&nbsp;</p><p>&nbsp;</p><p>&nbsp;</p></td></tr>
            <tr>
                <td>
                    <table align="center" border="0" cellpadding="0" cellspacing="0" style="width:80%;background: #fff;">
                        <tbody>
                            <tr>
                                <td style="width:100%;background: #fff;" colspan="3">
                                    <p>&nbsp;</p>
                                    <p style="text-align: center;margin-bottom: 20px;">
                                        <a href="'.Scripts::site().'" target="_blank">
                                            <img src="'.Scripts::site().Scripts::getViewHeader()->logo.'" alt="логотип компании" style="height:76px;" />
                                        </a>
                                    </p>						
                                </td>
                                <tr>
                                    <td colspan="3" style="background-color: #222;text-align: center;padding-top: 8px;font-family: monospace;color: #fff;">
                                        <h2><strong>'.Defina::Subscripts.'</strong></h2>
                                    </td>
                                </tr>						
                            </tr>
                            <tr>
                                <td style="width:5%">&nbsp;</td>
                                <td style="width:70%">
                                    <p>&nbsp;</p><p>&nbsp;</p>									
                                    <h1 style="text-align: center;margin-top: 20px;font-family: sans-serif;color: #ffb500;"><strong>'.$this->name.' пишет:</strong></h1>
                                    <p></p><p style="font-family: monospace;">'.$this->body.'</p>
                                    <p style="font-family: monospace;color:#999;">'.Scripts::moontag(date('d F Y года в H:i')).'</p>
                                    <br/>
                                    <hr style="height: 1px;border: none;background: #fdfdfd;">
                                    <br/>
                                    <p style="font-family: monospace;color: #ddd;">
                                        Получено с сайта '.Defina::my.' | '.Scripts::site().'
                                    </p>
                                    <p>&nbsp;</p><p>&nbsp;</p><p>&nbsp;</p>
                                </td>
                                <td style="width:5%">&nbsp;</td>
                            </tr>
                        </tbody>
                    </table>
                    <p>&nbsp;</p>
                    </td>
		</tr>
		<tr>
                    <td colspan="3"><p>&nbsp;</p><p>&nbsp;</p></td>
                </tr>
	</tbody>
    </table>
<p>&nbsp;</p>
            ')->send(); return true;
        }
        return false;        
    }
}