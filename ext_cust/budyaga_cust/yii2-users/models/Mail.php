<?php

namespace budyaga_cust\users\models;

use Yii;
use yii\helpers\Html;
use budyaga_cust\users\models\Scripts;


class Mail extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '1038_mail';
    }

    /**
     * @inheritdoc
     */
    
    protected function getReviews($sort = 2, $limit = '') // $sort - 1 / 2
    {
        $model = self::find()->where(['pub' => 1]);
        $select = ($sort == 1) ? SORT_ASC : SORT_DESC;
        $stop = ($limit == '') ? $model->orderBy(['id' => $select])->all() : $model->limit($limit)->orderBy(['id' => $select])->all();
        return ($limit == '' && $sort == '') ? $model->all() : $stop;
    }
    
    public function viewMail() 
    {
        $items = [];
        $flag = 1;
        foreach(self::getReviews(1,3) as $mail) { $is = $flag++;
            echo '<div class="col-lg-4">
                    <a data-fancybox="reviews" data-animation-duration="700" data-src="#animatedModal'.$is.'" href="javascript:;">
                    <div class="testimonial-description text-left">
                    '.Scripts::getTimeArt($mail->date).'
                        <p>
                            <i class="fa fa-star text-warning"></i>
                            <i class="fa fa-star text-warning"></i>
                            <i class="fa fa-star text-warning"></i>
                            <i class="fa fa-star text-warning"></i>
                            <i class="fa fa-star text-warning"></i>
                        </p>
                        <p class="text-muted">“'.Scripts::strCuts2($mail->body, 0, 140).'...”</p>
                    </div>
                    <div class="testimonial-user-info user-info text-left">
                        <div class="testimonial-user-thumb user-thumb">
                            <img src="'.$mail->img.'" alt="'.$mail->name.'"/>
                        </div>
                        <div class="testimonial-user-txt user-text">
                            <label class="testimonial-user-name user-name font-weight-bold text-dark">'.$mail->name.'</label>
                            <p class="testimonial-user-position user-position text-muted font-weight-light">
                                '.$mail->city.'
                            </p>
                        </div>
                    </div>
                    </a>
                    <div style="display: none;" id="animatedModal'.$is.'" class="animated-modal">
                        <div class="media">
                          <img src="'.$mail->img.'" alt="'.$mail->name.'" class="mr-3 mt-0 rounded-circle" style="width:60px;">
                          <div class="media-body vera-href">
                            <a href="/reviews"><h4>'.$mail->name.'</h4></a>
                            <p>
                                <i class="fa fa-star text-warning"></i>
                                <i class="fa fa-star text-warning"></i>
                                <i class="fa fa-star text-warning"></i>
                                <i class="fa fa-star text-warning"></i>
                                <i class="fa fa-star text-warning"></i>
                                &#160;&#160;'.Scripts::getTimeArt($mail->date).'
                            </p>                                
                            <p>'.$mail->body.'</p>
                          </div>
                        </div>
                    </div>
                </div>';
        }
        return $items;
    }
    
    
    public function rules()
    {
        return [
            [['img', 'city', 'name', 'phone', 'email', 'slug', 'body', 'file', 'ip', 'date', 'pub'], 'required'],
            [['body'], 'string'],
            [['name', 'email', 'ip', 'date'], 'string', 'max' => 255],
        ];
    }
    
    
    public function getUrlAction($param, $val) 
    {
        $param = strtr($param, array(
            '0' => Html::a(Html::tag('span', 'в ожидании', ['data-toggle' => 'tooltip', 'title' => 'опубликовать ?', 'class' => 'label label-warning pull-right']), ['like', 'id' => $val], ['data-method' => 'post', 'data-pjax' => '',]),
            '1' => Html::a(Html::tag('span', 'опубликовано', ['data-toggle' => 'tooltip', 'title' => 'отменить ?', 'class' => 'label label-success pull-right']), ['block', 'id' => $val], ['data-method' => 'post', 'data-pjax' => '',]),
            '2' => Html::a(Html::tag('span', 'заблокировано', ['data-toggle' => 'tooltip', 'title' => 'восстановить ?', 'class' => 'label label-danger pull-right']), ['like', 'id' => $val], ['data-method' => 'post', 'data-pjax' => '',]),
        ));
        return $param;
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'city' => 'Город',
            'img' => 'Фото пользователя',
            'name' => 'Имя',
            'phone' => 'Телефон',
            'email' => 'E-mail',
            'slug' => 'Услуга',
            'body' => 'Сообщение',
            'file' => 'Файл',
            'ip' => 'IP-Адрес',
            'date' => 'Дата',
            'pub' => 'Публикация', 
        ];
    }
}
