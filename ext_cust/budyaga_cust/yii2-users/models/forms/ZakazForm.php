<?php

namespace budyaga_cust\users\models\forms;

//•	ФИО
//•	Дата рождения (дата, месяц и год отдельными полями ограниченного выбора)
//•	Образование (select)
//•	Семейное положение (select)
//•	Телефон мобильный
//•	Email

class ZakazForm extends \yii\base\Model
{

    public $fio;
    public $b_day;
    public $b_mon;
    public $b_year;
    public $education;
    public $family_status;
    public $phone;
    public $email; 
    
    public static function tableName() 
    {
        return '1038_mail';
    }
 

    public function rules()
    {
        return [
            ['email', 'email', 'message' => 'Данный адрес не является электронной почтой'],
            [['fio', 'b_day', 'b_mon', 'b_year', 'education', 'family_status', 'phone', 'email'], 'required'],
        ];
    }
    
    public function attributeLabels()
    {
        return [
            'fio' => 'Ф.И.О.', 
            'b_day' => 'День рождения', 
            'b_mon' => 'Месяц рождения', 
            'b_year' => 'Год рождения', 
            'education' => 'Образование', 
            'family_status' => 'Семейное положение', 
            'phone' => 'Телефон мобильный', 
            'email' => 'Email',
        ];
    } 
    
}
