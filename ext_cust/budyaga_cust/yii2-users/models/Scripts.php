<?php

namespace budyaga_cust\users\models;

use Yii;
use yii\helpers\Html;
use budyaga_cust\users\voicecms\Voice;
use budyaga_cust\users\voicecms\Namevoiceru;
use Zelenin\SmsRu\Entity\Sms;
use Zelenin\SmsRu\Api;
use Zelenin\SmsRu\Auth\LoginPasswordSecureAuth;
use Zelenin\SmsRu\Entity\SmsPool;

class Scripts {

    public $version;
    
    public $name;
    
    public $license;

    public $licenseURI;
    
    public $price;
    
    public $lang;
    
    public $session;
    
    

    
    public function noProtocol($param) 
    {
        return preg_replace('/^(https?:)?(\/\/)?(www\.)?/', '', $param);
    }
    
    protected function getReview() 
    {
        return Mail::find()->where(['slug' => 'Отзывы'])->orderBy(['id' => SORT_DESC])->all();
    }
    
    protected function getPageActionDB($param) 
    {
        return Page::find()->where(['land' => Yii::$app->language, 'href' => $param])->one();
    }
    
    public function getPageAction($param) 
    {
        return self::getPageActionDB($param);
    }
    
    public function getReviewAll() 
    {
        $items = [];
        foreach (self::getReview() as $mail) {
            echo '<div class="carousel-single">
                    <div class="row">
                        <div class="col-md-5" style="height: 433px;">
                            <div class="style_carousel_img" style="background: url('.$mail->img.') no-repeat;"></div>
                            <div class="carousel-single_img"></div>
                        </div>
                        <div class="col-md-7 xs-center sm-left md-left lg-left mt-4">
                            <div class="col-md-11 offset-md-1">
                                <h2 class="line" style="font-size: 50px;font-weight: 700;line-height: 60px;">'.$mail->name.'</h2>
                                <h4 style="color: #e9204f;">'.$mail->city.'</h4>
                                <pre class="style_text_pre">'.$mail->body.'</pre>                    
                            </div>
                        </div>
                    </div>
                </div>';
        }
        return $items;
    }
    
    public function getTemplate()
    {
        $string = file_get_contents(self::site().'/file.json');
        return json_decode($string);
    }
    
    public function phoneLangFormat($phone) 
    {
        return strtr( 
            $phone, array(
                'ru' => '+7(999) 999-99-99', 
                'en' => '+[9][9] (999) 999 9999', 
                'de' => '+99 99999999999', 
                'it' => '+99 999 9999999', 
                'es' => '+99 99 999 99 99'
            )
        );
    }
    
    public function getCountImage($params)
    {
        $files = glob($params . '*.*');
        return ( $files !== false ) ? count( $files ) : '';
        //return ( $files !== false ) ? $total_count = count( $files ) : '';
    }
    
    public function tagFirstWord($string, $tag = 'span') 
    {
        $words = explode(' ', $string);
        $words[0] = Html::tag($tag, $words[0]);
        return implode(' ', $words);
    }
    
    public function countDealPDF($param) 
    {
        return Transaction::find()->where(['user_id' => $param, 'status' => 2])->andFilterWhere(['like', 'fund', 'obj']);
    }
    
    public function getArrayFullImageGallery($params, $alt)
    {
        if(Scripts::getCountImage($params) == '') {
            
        }
        else {
            $filesa = array_diff( scandir( $params), array('..', '.'));
            $files = [];
            foreach($filesa AS $i => $filename) {
                printf(
                    '<a href="/'.$params.'%s" data-fancybox="images"><img class="img-fluid" src="/'.$params.'%s" alt="'.$alt.'"></a>',
                    urlencode( $filename), $filename
                );
            }             
        } return $files;
    }
    
    public function getArrayImages($params)
    {
        if(Scripts::getCountImage($params) == '') {
            
        }
        else {
            $filesa = array_diff( scandir( $params), array('..', '.'));
            $files = [];
            foreach($filesa AS $i => $filename) {
                printf(
                    Scripts::site().'/'.$params.'%s",',
                    urlencode( $filename), $filename
                );
            }             
        } return $files;
    }
    

    
    public function getImageFullPost($params)
    {
        $text1 = (Yii::$app->language == 'ru') ? 'фотография' : 'photo';
        $text2 = (Yii::$app->language == 'ru') ? 'фотографии' : 'photos';
        $text5 = (Yii::$app->language == 'ru') ? 'фотографий' : 'photos';
        return (Scripts::getCountImage($params) == '') ? '' : Html::tag('pre', self::sklonen(self::getCountImage($params)+1, $text1, $text2, $text5), ['class' => 'text-center text-muted']);
    }
    
    public function customNon($params, $word)
    {
        // Scripts::customNon($params, $word);
        $site = self::getViewHeader();
        return (!$params) ? '' : Html::tag('p', Html::tag('b', $word.':').' '.$params, ['class' => 'm-0']).self::Edit('index', $site->id);
    }
    
    public function input()
    {
        // Scripts::input();
        return (!Yii::$app->user->isGuest) ? hiddenInput : textInput;
    } 
    
    public function setting()
    {
        return (Yii::$app->user->can('administrator')) ? '<div id="denav"><a href="/defina" id="definas"><i class="fa fa-cog"></i></a></div>' : '';
    }    
    
    public function findRussiaPhone() 
    {
        // Scripts::findRussiaPhone() 
        $haystack = self::strCuts2(Yii::$app->user->identity->contact_tel, 2, 0);
        $a = '+7'; $b = '88'; $c = '89'; $e = '79';
        $as = mb_strripos($haystack,$a,0,"utf-8");
        $bs = mb_strripos($haystack,$b,0,"utf-8");
        $cs = mb_strripos($haystack,$c,0,"utf-8");
        $es = mb_strripos($haystack,$e,0,"utf-8");
        return ($as === false && $bs === false && $cs === false && $es === false) ? '1' : '0';
    }
    
    public function getAdressUser($param) 
    {
        $model = Card::findOne(['user' => $param]);
        return $model->zip.'. '.$model->city.', '.$model->state.', '.$model->address;
    }
    
    public function findStroff($params)
    {
        $stroff= strripos($params, '/');
        return ($stroff === false) ? '' : $params;
    }
    
    public function getTransactionAlert($t) 
    {
        $tab = array(
            '1' => Yii::t('yii', 'Recharge on'), 
            '2' => Yii::t('yii', 'Withdrawal of money')
        );
        return strtr($t, $tab);
    }
    
    public function findMessageTrans($params)
    {
        $stroff = strripos($params, 'obj');
        return ($stroff === false) ? self::getTransactionAlert($params) : Yii::t('yii', 'Invested in').' "'.Scripts::createCatServer($params)->title.'"';
    }
    
    public function znakZodiaka($data){
    $day = str_replace("-","",substr($data,5));
    $zodiak = array('ot' => array('0120','0219','0321','0421','0521','0622','0723','0823','0923','1024','1123','1222','0101'),
        'do' => array('0218','0320','0420','0520','0621','0722','0822','0922','1023','1122','1221','1231','0119'),
        'zn' => array(
                '&#9810; Водолей',
                '&#9811; Рыбы',
                '&#9800; Овен',
                '&#9801; Телец',
                '&#9802; Близнец',
                '&#9803; Рак',
                '&#9804; Лев',
                '&#9805; Дева',
                '&#9806; Весы',
                '&#9807; Скорпион',
                '&#9808; Стрелец',
                '&#9809; Козерог',
                '&#9809; Козерог'));
        $i = 0;
        while (empty($znak) && ($i < 13)){
            $znak = (($zodiak['ot'][$i] <= $day) && ($zodiak['do'][$i] >= $day)) ? $zodiak['zn'][$i] : null;
            ++$i;
        } return $znak;
    }

    public function calculate_age($data) {
        $birthday_timestamp = strtotime($data);
        $age = date('Y') - date('Y', $birthday_timestamp);
        if (date('md', $birthday_timestamp) > date('md')) {
            $age--;
        }
        return $age;
    }
    
    
    public function getGravatarImage($email) 
    {
        // Scripts::getGravatarImage()
        $size = 100;
        return 'https://www.gravatar.com/avatar/' . md5(strtolower(trim($email))) . '&s=' . $size;
    }
    
    public function gravatarDefault($email) 
    {
        $size = 100;
        $default = '/img/img_avatar3.png';
        $grav = 'http://www.gravatar.com/avatar/fc4b5ff560ea1b4b8097e12963bca48a&s='.$size; 
        $grav2 = 'https://gravatar.com/avatar/fc4b5ff560ea1b4b8097e12963bca48a&s='.$size; 
        $s = self::getGravatarImage($email);
        return ($s == $grav || $s == $grav2) ? $default : $s;
    }
    
    public function fullImageOpen($image, $size = '')
    {
        return ($size == '') ? 'https://photos.flexmls.com/fl/'.$image.'.jpg' : 'https://cdn.resize.sparkplatform.com/fl/'.$size.'/true/'.$image.'-o.jpg';
    }
    
    public function getContent($param = '', $col = '') 
    {
        $class = ($col == '') ? 'col-md-12' : 'col-md-8 offset-md-2';
        $border = '<div class="brblock"></div>';
        return Html::tag('div', Html::tag('div', Html::tag('div', $border.$param, ['class' => $class]), ['class' => 'row']), ['class' => 'container']);
    }
    
    
    public function getApiKey($param = '') 
    {
        // Scripts::getApiKey();
        return User::find()->where(['api_key' => $param])->exists();
    }
    
    
    protected function viewFolliw()
    {
        return Folliw::find()->all();
    }
    
    public function viewWisardDate()
    {
        // Scripts::viewWisardDate();
        return Wisard::findOne(['user_id' => Yii::$app->user->identity->id]);
    }
    
    public function getCurrentTabLand($post, $text) 
    {
        // Scripts::getCurrentTabLand($post, $text);
        $flag = Html::img('/panel/fonts/flag-icon-css/flags/4x3/'.$post.'.svg', ['style' => 'width:20px;']);
        return '<li>'.Html::beginForm(['/'.Yii::$app->request->pathInfo], 'post').Html::input('hidden', 'languen', $post).Html::submitButton($flag.' '.$text, ['class' => 'btn btn-block language dropdown-item']).Html::endForm().'</li>';
    }
    
    // получаем всех авторов
    //    $authors = Author::find()->all();
    // формируем массив, с ключем равным полю 'id' и значением равным полю 'name' 
    //    $items = ArrayHelper::map($authors,'id','name');
    //    $params = [
    //        'prompt' => 'Укажите автора записи'
    //    ];
    //    echo $form->field($model, 'author')->dropDownList($items,$params);
    
    
    public function listLang() 
    {
        // Scripts::listLang();
        return [
            'ru' => 'Русский',
            'en' => 'Английский',
            'it' => 'Итальянский'
        ];
    }
    
    public function getTitltWizard($titile = '') 
    {
        if($titile == 0) {
            $r = Yii::t('yii', 'Welcome to').' '.Yii::$app->params['name'];
        } elseif($titile == 25) {
            $r =Yii::t('yii', 'Personal data');
        } elseif($titile == 50) {
            $r = Yii::t('yii', 'Verify your phone');
        } elseif($titile == 75) {
            $r = Yii::t('yii', 'Loading documents'); 
        } else {
            $r = Yii::t('yii', 'Balance replenishment');
        }
        return $r;
    }

    
    
    public function listActiveTab($step = '', $one = '', $two = '') 
    {
        return ($one == $two) ? 
        Html::tag('li', Html::a(Yii::t('yii', 'Step').' '.$step, '#step'.$step, ['class' => 'nav-link active', 'data-toggle' => 'tab']), ['class' => 'nav-item font-weight-bold  active']) : 
        Html::tag('li', Html::tag('a', Yii::t('yii', 'Step').' '.$step, ['class' => 'nav-link']), ['class' => 'nav-item font-weight-light disabled font-weight-light']);          
    }
    
    public function contentActiveTab($step = '', $content = '', $one = '', $two = '')
    {
        return ($one == $two) ?
        Html::tag('div', $content, ['class' => 'tab-pane active', 'id' => 'step'.$step]) : 
        Html::tag('div', '', ['class' => 'tab-pane', 'id' => 'step'.$step]);
    }
    
    public function fullAccount() 
    {
        $full = Yii::$app->user->identity;
        $a = ($full->nickname == '' || $full->nickname ==  NULL) ? 0 : 20;
        $b = ($full->lastname == '' || $full->lastname ==  NULL) ? 0 : 25;
        $c = ($full->contact_tel == '' || $full->contact_tel==  NULL) ? 0 : 35;
        $d = ($full->contact_skype == '' || $full->contact_skype ==  NULL) ? 0 : 1;
        $e = ($full->contact_icq == '' || $full->contact_icq ==  NULL) ? 0 : 1;
        $i = ($full->pay_wm == '' || $full->pay_wm ==  NULL) ? 0 : 1;
        $k = ($full->pay_yad == '' || $full->pay_yad ==  NULL) ? 0 : 1;
        $l = ($full->pay_qiwi == '' || $full->pay_qiwi ==  NULL) ? 0 : 1;
        $m = ($full->pay_other == '' || $full->pay_other ==  NULL) ? 0 : 5;
        $n = ($full->email == '' || $full->email ==  NULL) ? 0 : 10;
        return $a+$b+$c+$d+$e+$i+$k+$l+$m+$n;
    }
    
    public function viewTransaction()
    {
        // ->orderBy('date DESC')
        return Transaction::find()->select(['fund'])->distinct()->where(['user_id' => Yii::$app->user->identity->id])->all();
    }
    
    public function countTransaction()
    {
        return Transaction::find()->select(['fund'])->distinct()->where(['user_id' => Yii::$app->user->identity->id])->count();
    }
    
    public function viewWisard()
    {
        return Wisard::find()->where(['user_id' => Yii::$app->user->identity->id])->one();
    }
    
    public function viewSMSgetActive()
    {
        return \budyaga_cust\users\models\Sms::find()->where(['user' => Yii::$app->user->identity->id])->one();
    }
    
    public function createTabStep() 
    {
        return (self::viewWisard() == '' || self::viewWisard() == NULL) ? 0 : self::viewWisard()->status;
    }

    public function createCatServer($param = '') 
    {
        return Catalog::find()->where(['link' => $param])->one();
    }
    

    public function smsSendMessage($params, $phone = '', $text = '')
    {
        $textcode = ($text == '') ? Yii::t('yii', 'TEXTCODE', ['params' => $params]) : $text;  
        $p = ($phone == '') ? Yii::$app->user->identity->contact_tel : $phone;
        $sms = new Sms($p, $textcode);
        $client = new Api(new LoginPasswordSecureAuth(Yii::$app->sms->login, Yii::$app->sms->password, Yii::$app->sms->apiId));
        $client->smsSend($sms);
        $client->smsSend(new SmsPool([$sms]));
    }
    
    
    public function trueBasePhones() 
    {
        $model = Yii::$app->user->identity;
        return \budyaga_cust\users\models\Sms::find()->where(['user' => $model->id, 'phone' => $model->contact_tel, 'active' => 1])->one();  
    }
    
    
    public function truePhoneSms() 
    {
        $phone = self::trueBasePhones();
        return ($phone == '' || $phone == NULL) ?  
        Yii::t('yii', 'Contact Tel').' '.Html::a(Yii::t('yii', 'Confirm'), '/phone') : 
        Html::tag('span', Yii::t('yii', 'Contact Tel').' <i class="ionicons ion-android-checkmark-circle"></i>', ['class' => 'text-success', 'data-toggle' => 'tooltip', 'title' => 'Телефон подтверждён']);
    }
    
    
    public function validWizardStepObj($params = '') 
    {
        $str = (self::trueBasePhones() == '' || self::trueBasePhones() == NULL) ? self::createTablePhone($params) : '';
        $str .= self::createTwoStep();
        $str .= Yii::$app->session->setFlash('successMessage');
        return $str;
    }
    
    
    public function createTablePhone($params = '') 
    {
        $model = Yii::$app->user->identity;
        $phone = new \budyaga_cust\users\models\Sms(); 
        $phone->user = $model->id;
        $phone->phone = $model->contact_tel;
        $phone->status = $params;
        $phone->active = 1;
        $phone->date = self::getTime();
        $phone->save();
    }
    
    
    public function createTwoStep() 
    {
        Wisard::updateAll(['status' => 50], ['user_id' => Yii::$app->user->identity->id]); 
    }
    
    
    protected function viewFaqQests($params = '')
    {
        return Faq::find()->where(['lands' => Yii::$app->language])->orderBy(['id' => SORT_ASC])->all();
    }
    
    public function getAllFAQ() 
    {
        $faq = [];
        $flag = 1;
        foreach (self::viewFaqQests() as $irr) { $x = $flag++;
            echo '<div class="card">
                    <div class="card-header p-4 border-0">
                        <a class="card-link font-weight-bold" data-toggle="collapse" href="#collapse'.$x.'">
                            '.$irr->header.'
                        </a>'.self::Edit('faq', $irr->id).'
                    </div>
                    <div id="collapse'.$x.'" class="collapse" data-parent="#accordion">
                        <div class="card-body">
                            '.$irr->text.'
                        </div>
                    </div>
                </div>';
        }
        return $faq;
    }
    
    public function translate($st)
    {
        $char = array(
            'а'=>'a','б'=>'b','в'=>'v','г'=>'g','д'=>'d','е'=>'e','ё'=>'e','з'=>'z','и'=>'i',
            'й'=>'y','к'=>'k','л'=>'l','м'=>'m','н'=>'n','о'=>'o','п'=>'p','р'=>'r','с'=>'s','т'=>'t',' '=>'',
            'у'=>'u','ф'=>'f','х'=>'h',"'"=>'','ы'=>'i','э'=>'e','ж'=>'zh','ц'=>'ts','ч'=>'ch','ш'=>'sh',
            'щ'=>'j','ь'=>'','ю'=>'yu','я'=>'ya','Ж'=>'ZH','Ц'=>'TS','Ч'=>'CH','Ш'=>'SH','Щ'=>'J',
            'Ь'=>'','Ю'=>'YU','Я'=>'YA','ї'=>'i','Ї'=>'Yi','є'=>'ie','Є'=>'Ye','А'=>'A','Б'=>'B','В'=>'V',
            'Г'=>'G','Д'=>'D','Е'=>'E','Ё'=>'E','З'=>'Z','И'=>'I','Й'=>'Y','К'=>'K','Л'=>'L','М'=>'M','Н'=>'N',
            'О'=>'O','П'=>'P','Р'=>'R','С'=>'S','Т'=>'T','У'=>'U','Ф'=>'F','Х'=>'H','Ъ'=>"'",'Ы'=>'I','Э'=>'E', '.' => ''
        );
        return strtr($st, $char);
    }
    
    public function translateName($st)
    {
        $char = array(
            'а'=>'a','б'=>'b','в'=>'v','г'=>'g','д'=>'d','е'=>'e','ё'=>'e','з'=>'z','и'=>'i',
            'й'=>'y','к'=>'k','л'=>'l','м'=>'m','н'=>'n','о'=>'o','п'=>'p','р'=>'r','с'=>'s','т'=>'t',' '=>' ',
            'у'=>'u','ф'=>'f','х'=>'h',"'"=>'','ы'=>'i','э'=>'e','ж'=>'zh','ц'=>'ts','ч'=>'ch','ш'=>'sh',
            'щ'=>'j','ь'=>'','ю'=>'yu','я'=>'ya','Ж'=>'Zh','Ц'=>'Ts','Ч'=>'Ch','Ш'=>'Sh','Щ'=>'J',
            'Ь'=>'','Ю'=>'Yu','Я'=>'Ya','ї'=>'i','Ї'=>'Yi','є'=>'ie','Є'=>'Ye','А'=>'A','Б'=>'B','В'=>'V',
            'Г'=>'G','Д'=>'D','Е'=>'E','Ё'=>'E','З'=>'Z','И'=>'I','Й'=>'Y','К'=>'K','Л'=>'L','М'=>'M','Н'=>'N',
            'О'=>'O','П'=>'P','Р'=>'R','С'=>'S','Т'=>'T','У'=>'U','Ф'=>'F','Х'=>'H','Ъ'=>"'",'Ы'=>'I','Э'=>'E', '.' => '.'
        );
        return strtr($st, $char);
    }
    
    
    public function addTabs($t) 
    {
        $tab = array(
            '0' => Yii::t('yii', 'Public offer'), 
            '25' => Yii::t('yii', 'Personal data'), 
            '50' => Yii::t('yii', 'Verify your phone'), 
            '75' => Yii::t('yii', 'Loading documents'), 
            '100' => Yii::t('yii', 'Balance replenishment')
        );
        return strtr($t, $tab);
    }
    
    
    
    public function getDifference($mon_profitability = '', $tsj = '', $price = '') 
    {
        //  Scripts::getDifference($mon_profitability = '', $tsj = '', $price = '') 
        $r = ( ($mon_profitability - $tsj) * 12 * 0.9 - $price * 0.013 ) / $price;
        $it = round($r, 2); $on = $it * 100 - 0.005; $on2 = $it * 100 + 0.005;
        return floor($on).'% - '.ceil($on2).'%';
    }
    
    
    public function getCurrentMoney()
    {
        return [
            'USD' => '$',
            'EUR' => '€',
            'RUR' => 'RUR',
        ];
    }
   

    public static function getFolliw() 
    {
        // Scripts::getFolliw()
        $items = [];
        foreach(self::viewFolliw() as $f) { 
            $x = ($f->target == '_blank') ? '_blank' : '_self';
            echo Html::tag('li', Html::a($f->icon, $f->link, ['target' => $x,  'data-toggle' => 'tooltip', 'title' => $f->title]));
        }
        return $items;
    }
    
    public function strCuts($string = '', $str = 20)
    {
        // Scripts::strCuts()
        mb_internal_encoding("UTF-8");
        return mb_substr($string, 0, $str);
    }
    
    public function strCuts2($string = '', $in = 0, $str = 20)
    {
        // Scripts::strCuts()
        mb_internal_encoding("UTF-8");
        return mb_substr($string, $in, $str);
    }
    
    public function getCatalog() 
    {
        return Catalog::find()->orderBy(['id' => SORT_ASC,])->all();
    }
    
    public function priceFormat($param = '') 
    {
        return ($param == 'NaN') ? 'No Data' : Html::tag('span', number_format($param).' '.Defina::CurrentWallet, ['class' => 'label label-success']);
    }
    
    public function getDocument() 
    {
        return Docs::find()->where(['land' => Yii::$app->language])->orderBy(['id' => SORT_ASC,])->all();
    }
    
    public function advantTop() 
    {
        return Top::find()->where(['land' => Yii::$app->language])->orderBy(['id' => SORT_ASC,])->all();
    }
    
    public function connectLogin() 
    {
        return (Yii::$app->user->isGuest) ? Html::a('Вход', '/login', ['class' => 'btn btn-white-fill navbar-btn nav-link']) : Html::a('Выход', '/logout', ['data-method' => 'post', 'class' => 'btn btn-white-fill navbar-btn nav-link']);
    }
    
    public function csrfIconTags($index = '') 
    {
        $header = ($index->favicon == '') ? '' : '<link href="'.$index->favicon.'" rel="icon">'.PHP_EOL;
        $header .= ($index->apple_touth == '') ? '' : '<link href="'.$index->apple_touth.'" rel="apple-touch-icon" />'.PHP_EOL;
        return $header;
    }
    
    public function getBuyTokenSell($summa = '', $sell = '')
    { 
        // Scripts::getBuyTokenSell($summa, $sell); 1) сколько собрали 2) общая сумма сбора
        $procent = $sell/100;  
        return $result = round($summa/$procent);
    }
    
    public function RiskAdjusted($param, $tag = 'i') 
    {
        switch ($param){
            
            case ($param <= 6 && $param <= 7): 
                echo Html::tag($tag, 'A1', ['class' => 'badge badge-secondary']);
            break;
            case ($param <= 7 && $param <= 8): 
                echo Html::tag($tag, 'A2', ['class' => 'badge badge-secondary2']);
            break;
            case ($param <= 8 && $param <= 9): 
                echo Html::tag($tag, 'B1', ['class' => 'badge badge-info']);
            break;
            case ($param <= 9 && $param <= 10): 
                echo Html::tag($tag, 'B2', ['class' => 'badge badge-info2']);
            break;
            case ($param <= 10 && $param <= 11): 
                echo Html::tag($tag, 'C1', ['class' => 'badge badge-primary']);
            break;
            case ($param <= 11 && $param <= 12): 
                echo Html::tag($tag, 'C2', ['class' => 'badge badge-primary2']);
            break;
            case ($param <= 12 && $param <= 13): 
                echo Html::tag($tag, 'D1', ['class' => 'badge badge-success']);
            break;
            case ($param <= 13 && $param <= 14): 
                echo Html::tag($tag, 'D2', ['class' => 'badge badge-success2']);
            break;
            case ($param <= 14 && $param <= 15): 
                echo Html::tag($tag, 'E1', ['class' => 'badge badge-warning']);
            break;
            case ($param <= 15 && $param <= 16): 
                echo Html::tag($tag, 'E2', ['class' => 'badge badge-warning2']);
            break;
            case ($param <= 16 && $param <= 17): 
                echo Html::tag($tag, 'F1', ['class' => 'badge badge-danger']);
            break;
            case ($param <= 17 && $param <= 18): 
                echo Html::tag($tag, 'F2', ['class' => 'badge badge-danger2']);
            break;
            case ($param <= 18 && $param <= 19): 
                echo Html::tag($tag, 'F2', ['class' => 'badge badge-danger3']);
            break;
            case ($param <= 19 && $param <= 20): 
                echo Html::tag($tag, 'F3', ['class' => 'badge badge-danger4']);
            break;
            default :
                echo Html::tag($tag, 'I1', ['class' => 'badge badge-danger5']);
            break;
         }
    }
    
    
    
    public function viewLogo($param = '', $class ='', $alt = 'logo')
    {
        // Scripts::viewLogo();
        return ($param == '') ? Yii::$app->params['name'] : Html::img($param, ['class' => $class, 'alt' => $alt]);
    }

    public function getPage($index = '')
    {
        $url = ($index == '') ? Yii::$app->controller->action->id : $index;
        return Page::find()->where(['href' => $url, 'land' => Yii::$app->language])->one();
    }
    
    public function getTitlePage($param = '') 
    {
        if($param == ''){$text = Yii::$app->params['name'];} elseif ($param == 1) {$text = self::getViewHeader()->title;} else {$text = $param;}
        return $text;
    }
    
    public function sklonen($n,$s1,$s2,$s3, $b = false)
    {
        // Scripts::sklonen( 'число', 'новость', 'новости', 'новостей') 1, 2, 5
        $m = $n % 10; $j = $n % 100;
        if($b) {$n = '<b>'.$n.'</b>';}
        if($m==0 || $m>=5 || ($j>=10 && $j<=20)) {return $n.' '.$s3;}
        if($m>=2 && $m<=4) {return  $n.' '.$s2;}
        return $n.' '.$s1;
    }
    
    
    public static function getNameFile()
    {
        // Scripts::getNameFile()
        return rand(0, 9999).date('sdm');
    }
    
    public static function getViewCity()
    {
        // Scripts::getViewCity()
        return City::find()->orderBy(['c_header' => SORT_ASC,])->all();
    }
    
    public static function getViewPrice()
    {
        // Scripts::getViewPrice()
        return Table::find()->orderBy(['lang_speech' => SORT_ASC,])->all();
    }
    
    public static function getViewHeader()
    {
        // Scripts::getViewHeader()
        return Index::findOne(1);
    }
    
    public static function getBackground()
    {
        // Scripts::getBackground()
        return Page::findOne(17);
    }

    public static function getTypeHref($params = '')
    {
        // Scripts::getTypeHref();
        $del = Servis::find()->where(['s_href' => $params])->one();
        return $del->type;
    }
    
    public static function Edit($page = '', $id = '')
    {
        // Scripts::Edit()
        $icon = ($id == '') ? '<i class="fa fa-plus"></i>' : '<i class="ionicons ion-android-create"></i>';
        $x = ($id == '') ? '/create' : '/update?id='.$id;
        return (!Yii::$app->user->can('administrator')) ? '' : Html::a($icon, '/user/'.$page.$x, ['class' => 'btn btn-default red']);
    }
    
    public static function getURL($href = '', $name = '')
    {
        // Scripts::getURL($href = '', $name = ''); $_SERVER['REQUEST_URI']
        return ($href == Yii::$app->request->url) ? '<li class="active">'.Html::a($name, $href).'</li>' : '<li>'.Html::a($name, $href).'</li>';
    }
    
    public function Slugs($param = '') 
    {
        return (!$param) ? '' : '<b>'.$param.'</b><br/>';
    }
    
    
    public static function creatUnix($unix = '')
    {
        return Yii::$app->formatter->asDate($unix, 'php:Y-m-d');
    }
    
    public function getIp()
    {
        // Scripts::getIp();
        return Yii::$app->request->userIP;
    }
    
    public static function getCountDay($firstdate = '', $twodate = '')
    {
        $datetime1 = date_create($firstdate);
        $datetime2 = date_create($twodate);
        $interval = date_diff($datetime1, $datetime2);
        return $interval->format('%a');
    }


    public static function getHelpIcon($params = '')
    {
        return ($params == '') ? '' : '<span class="prof pull-right" title="'.$params.'" data-toggle="tooltip" data-placement="bottom"><i class="ionicons ion-help-circled"></i></span>';
    }	
    
    public static function genderPhoto($alt = '', $param = '', $style = '')
    {
        // Scripts::genderPhoto()
        $nc = new Namevoiceru(); 
        $person = Yii::$app->user->identity->nickname;
        $gender = $nc->genderDetect($person);
        ($gender == Voice::$MAN)? $p = 'male' : $p = 'female';
        return Html::img('/img/'.$p.'.png',['alt' => $alt, 'class' => $param, 'style' => $style]);
    }
    
    
    public static function getDefaultPhoto($person = '')
    {
        $nc = new Namevoiceru(); 
        $gender = $nc->genderDetect($person);
        return ($gender == Voice::$MAN) ? 'male' : 'female';
    }
    
    public function getNamePhoto($person = '', $options = [])
    {
        $x = self::getDefaultPhoto($person);
        ($options['class'] == '') ? ['class' => 'card-img-top', 'alt' => 'image', 'style' => 'width:100%'] : '';
        ($x == 'male') ? $s = 3 : $s = 2;
        return Html::img('/img/img_avatar'.$s.'.png', ['class' => 'card-img-top', 'alt' => 'image', 'style' => 'width:100%']);
    }
    
    
    public static function alertEmailDefault()
    {
        return (Yii::$app->user->identity->email == 'test@test.com') ? 
        '<li><a href="/user/admin/update?id='.Yii::$app->user->identity->id.'&mail=error"><i class="fa fa-cog text-info"></i> Настройте ваш сайт</a></li>' : '';
        
    }
    
    public function ErrorMail()
    {
        return (Yii::$app->user->identity->email == 'test@test.com') ? '<span class="text-danger">Cмените ваш E-mail</span>' : 'E-mail';
    }
    
    public function getErrorMail()
    {
        return (Yii::$app->user->identity->email == 'test@test.com') ? false : true;
    }
    
    public function getErrorMailMessage()
    {
        return (self::getErrorMail() == false) ? 'form-control ahtung' : 'form-control';
    }
    
    
    public function getExistsFile()
    {
        $sitemap = 'sitemap.xml'; 
        $robots = 'robots.txt';
        if(!file_exists($sitemap) or !file_exists($robots)) {return false;} else {return true;}
    }
    
    public function noFile() 
    {
        return (self::getExistsFile() == false) ? Html::tag('li', Html::a('<i class="fa fa-sellsy text-warning"></i> Отсутствуют необходимые файлы', '/user/seo')) : '';
    }
    
    public function noPhotoUser()
    {
        return (Yii::$app->user->identity->photo == '') ? '<li><a href="/user/admin/update?id='.Yii::$app->user->identity->id.'&photo=error"><i class="fa fa-file-image-o text-danger"></i> Отсутствует фото профиля</a></li>' : '';
    }
    
    public function countNotify()
    {
        // Scripts::countNotify()
        $a = (self::alertEmailDefault() == '') ? 0 : 1;
        $b = (self::noPhotoUser() == '') ? 0 : 1;
        $c = (self::noFile() == '') ? 0 : 1;
        return $summa = $a+$b+$c;
    }
    
    
    public function getAccess($act){
        $act = strtr(
            $act, array(
                 '0' => '<small class="label bg-green">Открыто</small>',
                 '1' => '<small class="label bg-red">Скрыто</small>'                                
            )
        );
        return $act;
    }
    
    
    public function access($x)
    {
        $x = strtr($x, array(
            '1' => '<span class="label label-warning">В ожидании</span>', 
            '2' => '<span class="label label-success">Активный</span>', 
            '3' => '<span class="label label-danger">Заблокирован</span>', 
            ));
        return $x;
    }


    public function typeFile($file)
    {
        // Scripts::typeFile()
        $file = strtr($file, array(
            'txt' => '<i class="fa fa-file-text-o bg-gray color-palette"></i>', 
            'md' => '<i class="fa fa-file-text-o bg-gray color-palette"></i>', 
            
            'htaccess' => '<i class="ionicons ion-document bg-gray color-palette"></i>', 
            'gitignore' => '<i class="ionicons ion-document bg-gray color-palette"></i>', 
            
            'rar' => '<i class="fa fa-file-archive-o bg-orange color-palette"></i>', 
            'zip' => '<i class="fa fa-file-archive-o bg-orange color-palette"></i>', 
            'gz' => '<i class="fa fa-file-archive-o bg-orange color-palette"></i>', 
            
            'docx' => '<i class="fa fa-file-word-o bg-aqua color-palette"></i>', 
            'doc' => '<i class="fa fa-file-word-o bg-aqua color-palette"></i>', 
            'dotx' => '<i class="fa fa-file-word-o bg-aqua color-palette"></i>', 
            'dot' => '<i class="fa fa-file-word-o bg-aqua color-palette"></i>', 
            'rtf' => '<i class="fa fa-file-word-o bg-aqua color-palette"></i>', 
            'docm' => '<i class="fa fa-file-word-o bg-aqua color-palette"></i>', 
            'dotm' => '<i class="fa fa-file-word-o bg-aqua color-palette"></i>', 
            'dic' => '<i class="fa fa-file-word-o bg-aqua color-palette"></i>', 
            
            'pptx' => '<i class="fa fa-file-powerpoint-o"></i>', 
            'pptm' => '<i class="fa fa-file-powerpoint-o"></i>', 
            'ppt' => '<i class="fa fa-file-powerpoint-o"></i>', 
            
            'xlsx' => '<i class="fa fa-file-excel-o bg-green color-palette"></i>', 
            'xlsm' => '<i class="fa fa-file-excel-o bg-green color-palette"></i>', 
            'xlsb' => '<i class="fa fa-file-excel-o bg-green color-palette"></i>', 
            'xltx' => '<i class="fa fa-file-excel-o bg-green color-palette"></i>', 
            'xltm' => '<i class="fa fa-file-excel-o bg-green color-palette"></i>', 
            'xls' => '<i class="fa fa-file-excel-o bg-green color-palette"></i>', 
            'xlt' => '<i class="fa fa-file-excel-o bg-green color-palette"></i>', 
            'csv' => '<i class="fa fa-file-excel-o bg-green color-palette"></i>', 
            
            'png' => '<i class="fa fa-file-image-o bg-maroon color-palette"></i>', 
            'jpg' => '<i class="fa fa-file-image-o bg-maroon color-palette"></i>', 
            'jpeg' => '<i class="fa fa-file-image-o bg-maroon color-palette"></i>', 
            'gif' => '<i class="fa fa-file-image-o bg-maroon color-palette"></i>', 
            'tiff' => '<i class="fa fa-file-image-o bg-maroon color-palette"></i>',
            
            'pdf' => '<i class="fa fa-file-pdf-o bg-red color-palette"></i>', 
            
            'html' => '<i class="fa fa-file-code-o bg-purple color-palette"></i>', 
            'css' => '<i class="fa fa-file-code-o bg-purple color-palette"></i>', 
            'rss' => '<i class="fa fa-file-code-o bg-purple color-palette"></i>', 
            'xml' => '<i class="fa fa-file-code-o bg-purple color-palette"></i>', 
            'js' => '<i class="fa fa-file-code-o bg-purple color-palette"></i>', 
            'py' => '<i class="fa fa-file-code-o bg-purple color-palette"></i>', 
            'php' => '<i class="fa fa-file-code-o bg-purple color-palette"></i>', 
            'exe' => '<i class="fa fa-file-code-o bg-purple color-palette"></i>'));
        return $file;
    }
	
	
    public function get_filesize($file = '') {
    // Scripts::get_filesize();
    if(!file_exists($file)) return "Файл  не найден";
    $filesize = filesize($file);
        if($filesize > 1024) {
            $filesize = ($filesize/1024);
            if($filesize > 1024) {
                $filesize = ($filesize/1024);
                if($filesize > 1024) {
                    $filesize = ($filesize/1024); $filesize = round($filesize, 1); return $filesize." ГБ";       
                } else {
                    $filesize = round($filesize, 1); return $filesize." MБ";
                }       
            } else {
                $filesize = round($filesize, 1); return $filesize." Кб";   
            }  
        } else {
            $filesize = round($filesize, 1); return $filesize." байт";   
        }
    }
 	
     


    public function brithYear() 
    {
        return [
            '1983' => '1983',
            '1984' => '1984',
            '1985' => '1985',
            '1986' => '1986',
            '1987' => '1987',
            '1988' => '1988',
            '1989' => '1989',
            '1990' => '1990',
            '1991' => '1991',
            '1992' => '1992',
            '1993' => '1993',
            '1994' => '1994',
            '1995' => '1995',
            '1996' => '1996',
            '1997' => '1997',
            '1998' => '1998',
            '1999' => '1999',
        ];
    }
    
    
    public function brithMon() 
    {
        return [
            "Январь" => "Января", 
            "Февраль" => "Февраля", 
            "Март" => "Марта", 
            "Апрель" => "Апреля", 
            "Май" => "Мая", 
            "Июнь" => "Июня", 
            "Июль" => "Июля", 
            "Август" => "Августа", 
            "Сентябрь" => "Сентября", 
            "Октябрь" => "Октября", 
            "Ноябрь" => "Ноября", 
            "Декабрь" => "Декабря"
        ];
    }
    
    public function brithDay() 
    {
        return [
            '01' => '1',
            '02' => '2',
            '03' => '3',
            '04' => '4',
            '05' => '5',
            '06' => '6',
            '07' => '7',
            '08' => '8',
            '09' => '9',
            '10' => '10',
            '11' => '11',
            '12' => '12',
            '13' => '13',
            '14' => '14',
            '15' => '15',
            '16' => '16',
            '17' => '17',
            '18' => '18',
            '19' => '19',
            '20' => '20',
            '21' => '21',
            '22' => '22',
            '23' => '23',
            '24' => '24',
            '25' => '25',
            '26' => '26',
            '27' => '27',
            '28' => '28',
            '29' => '29',
            '30' => '30',
            '31' => '31'
        ];
    }
    
    public static function moontag($value)
    {
        // Scripts::moontag();
        return strtr($value, array(
            "January" => "Января", 
            "February" => "Февраля", 
            "March" => "Марта", 
            "April" => "Апреля", 
            "May" => "Мая", 
            "June" => "Июня", 
            "July" => "Июля", 
            "August" => "Августа", 
            "September" => "Сентября", 
            "October" => "Октября", 
            "November" => "Ноября", 
            "December" => "Декабря"));
    } 

    
    public function getTime()
    {
        return time();
    }
    

    public function getStatusTransaction($m)
    {
        return strtr($m, 
            array(
                '0' => Html::tag('span', Yii::t('yii', 'blocked by'), ['class' => 'badge badge-danger']), 
                '1' => Html::tag('span', Yii::t('yii', 'Pending'),    ['class' => 'badge badge-warning']), 
                '2' => Html::tag('span', Yii::t('yii', 'invested'),   ['class' => 'badge badge-success'])
            )
        );
    }
    

    public function getStat($value)
    {
        $value = strtr($value, array(
            '0' => 'в ожидании', 
            '1' => 'опубликовано', 
            '2' => 'заблокировано'));
        return $value;
    } 

    public function getStatColor($value)
    {
        $value = strtr($value, array(
            '0' => 'label label-warning pull-right', 
            '1' => 'label label-success pull-right', 
            '2' => 'label label-danger pull-right'));
        return $value;
    } 
    
    public function site() {
        return Yii::$app->getRequest()->getHostInfo();
    }
    
    public function funcMail() {
        return Yii::$app->params[Defina::current_mail];
    }
    
    public function formTime($param = '') // стандартный формат даты
    {
        $time = Yii::$app->formatter->asDateTime($param, 'php: '.Defina::DateFormat);
        return (Yii::$app->language == 'ru') ? self::moontag($time) : $time;
    }
    
    public function formCalen($param = '') // формат даты для статей
    {
        $time = Yii::$app->formatter->asDate($param, 'php: '.Defina::Date);
        return (Yii::$app->language == 'ru') ? self::moontag($time) : $time;
    }

    public function formTimeChat($param = '') // формат даты для чата
    {
        $time = Yii::$app->formatter->asDateTime($param, 'php: '.Defina::DateFormatChat);
        return (Yii::$app->language == 'ru') ? self::moontag($time) : $time;
    }

    public function getTimeName($params = '') 
    { 
        // Scripts::getTimeName(1508260892);
        return Html::tag('small', Defina::CLOCK . self::formTime($params), ['class' => 'text-muted']);
    }  
    
    public function getTimeChat($params = '') 
    { 
        // Scripts::getTimeName(1508260892);
        return Html::tag('small', Defina::CLOCK . self::formTimeChat($params), ['class' => 'text-muted']);
    }    
    
    public function getTimeArt($params = '') 
    { 
        // Scripts::getTimeArt(1508260892);
        return Html::tag('small', Defina::CALENDAR . self::formCalen($params), ['class' => 'text-muted']);
    }   
    
    
    public function getCommandUser() 
    {
        return User::find()->where(['!=', 'position', 'партнёр'])->count();
    }
    
    public function getUserCom() 
    {
        return User::find()->where(['!=', 'position', 'партнёр'])->all();
    }
    
    
    public function getUserName($param = '') 
    {
        $user = User::findOne($param);
        return $user->nickname.' '.$user->lastname;
    }  
    
    
    public function getUser($param = '') 
    {
        $user = User::findOne($param);
        return Html::a(self::getUserName($param), '/user/admin/view?id='.$user->id);
    }

    
    
    public function getTruePhone() 
    {
        return \budyaga_cust\users\models\Sms::find()->where(['status' => 'false'])->all();
    }
    
    
    public function getPostCount($param = '') 
    {
        
        if ($param == 1) $x = 12; elseif ($param == 2 || $param == 4) $x = 6; else $x = 4;
        return $x;
    }
    
	
    public function pregPhone($phone = '')
    {
        return preg_replace('/[^0-9]/', '', $phone);
    }


    public function replCuts($string)
    {
        return str_ireplace("//", "<br/>", $string);
    }
	
    public static function phone($phone, $options = [])
    {
        // Scripts::phone()
        $options['href'] = 'tel:+'.self::pregPhone($phone);
        if (!isset($options['class'])) {
            $options['class'] = '';
        }
        return Html::tag('a', $phone, $options);
    }
    
    public static function mail($mail, $t = '', $options = [])
    {
        // Scripts::mail()
        $options['href'] = 'mailto:'.$mail;
        if (!isset($options['class'])) {
            $options['class'] = '';
        }
        return Html::tag('a', $t.$mail, $options);
    }
    
    
    public function map($map, $options = []) 
    {
        // Scripts::map();
        $options['href'] = 'https://www.google.ru/maps/search/'.$map;
        if (!isset($options['class'])) {
            $options['class'] = '';
        }
        return Html::tag('a', $map, $options);
    }
    
    
    public static function skype($skype, $options = [])
    {
        // Scripts::skype();
        $options['href'] = 'skype:'.$skype.'?call';
        if (!isset($options['class'])) {
            $options['class'] = '';
        }
        return Html::tag('a', $skype, $options);
    }
    
    public static function telegram($telegram, $options = [])
    {
        // Scripts::telegram();
        $options['href'] = 'tg://resolve?domain='.$telegram;
        if (!isset($options['class'])) {
            $options['class'] = '';
        }
        return Html::tag('a', $telegram, $options);
    }
    
    public function resultPriceFull($param = '', $full = '') 
    {
        $class = 'progress-bar bg-warning progress-bar-striped progress-bar-animated';
        $classn = 'progress-bar bg-success progress-bar-striped';
        $x = self::getBuyTokenSell($param, $full);
        return ($x == 100) ? 
        Html::tag('div', Html::tag('div', '100% '.Yii::t('yii', 'Financed'), ['class' => $classn, 'style' => 'width: 100%']), ['class' => 'progress']) : 
        Html::tag('div', Html::tag('div', $x.'%', ['class' => $class, 'style' => 'width: '.$x.'%']), ['class' => 'progress']);
    }
    
    public function viewFullRent($param = '', $full = '') 
    {
        // Scripts::getBuyTokenSell($summa, $sell); 1) сколько собрали 2) общая сумма сбора
        $x = self::getBuyTokenSell($param, $full);
        return ($x == 100) ? 
            Html::tag('kbd', '') : 
            Html::tag('kbd', Yii::t('yii', 'purpose').' - $'.number_format($full));
    }
    
    public function getFullRent($param = '', $full = '') 
    {
        $x = self::getBuyTokenSell($param, $full);
        $class = ['class' => 'text-dark'];
        return ($x == 100) ? Html::tag('p', '$'.number_format($full), $class) : Html::tag('p', '$'.number_format($param), $class);
    }
    

    public function generatess($length = 10)
    {
        $chars = 'abdefhiknrstyzABDEFGHKNQRSTYZ23456789';
        $string = '';
        for ($i = 0; $i < $length; $i++) $string .= substr($chars, rand(1, strlen($chars)) - 1, 1);
        return $string;
    }
    
    public static function getMessageSmsStatus($message)
    {
        return strtr($message, array(
            '-1' => 'Сообщение не найдено',
            '100' => 'Запрос выполнен или сообщение находится в нашей очереди',
            '101' => 'Сообщение передается оператору',
            '102' => 'Сообщение отправлено (в пути)',
            '103' => 'Сообщение доставлено',
            '104' => 'Не может быть доставлено: время жизни истекло',
            '105' => 'Не может быть доставлено: удалено оператором',
            '106' => 'Не может быть доставлено: сбой в телефоне',
            '107' => 'Не может быть доставлено: неизвестная причина',
            '108' => 'Не может быть доставлено: отклонено',
            '110' => 'Сообщение прочитано',
            '150' => 'Не может быть доставлено: не найден маршрут на данный номер',
            '200' => 'Неправильный api_id',
            '201' => 'Не хватает средств на лицевом счету',
            '202' => 'Неправильно указан номер телефона получателя, либо на него нет маршрута',
            '203' => 'Нет текста сообщения',
            '204' => 'Имя отправителя не согласовано с администрацией',
            '205' => 'Сообщение слишком длинное (превышает 8 СМС)',
            '206' => 'Будет превышен или уже превышен дневной лимит на отправку сообщений',
            '207' => 'На этот номер нет маршрута для доставки сообщений',
            '208' => 'Параметр time указан неправильно',
            '209' => 'Вы добавили этот номер (или один из номеров) в стоп-лист',
            '210' => 'Используется GET, где необходимо использовать POST',
            '211' => 'Метод не найден',
            '212' => 'Текст сообщения необходимо передать в кодировке UTF-8 (вы передали в другой кодировке)',
            '213' => 'Указано более 100 номеров в списке получателей',
            '220' => 'Сервис временно недоступен, попробуйте чуть позже',
            '230' => 'Превышен общий лимит количества сообщений на этот номер в день',
            '231' => 'Превышен лимит одинаковых сообщений на этот номер в минуту',
            '232' => 'Превышен лимит одинаковых сообщений на этот номер в день',
            '300' => 'Неправильный token (возможно истек срок действия, либо ваш IP изменился)',
            '301' => 'Неправильный пароль, либо пользователь не найден',
            '302' => 'Пользователь авторизован, но аккаунт не подтвержден (пользователь не ввел код, присланный в регистрационной смс)',
            '303' => 'Код подтверждения неверен',
            '304' => 'Отправлено слишком много кодов подтверждения. Пожалуйста, повторите запрос позднее',
            '305' => 'Слишком много неверных вводов кода, повторите попытку позднее',
            '500' => 'Ошибка на сервере. Повторите запрос.',
            '901' => 'Callback: URL неверный (не начинается на http://)',
            '902' => 'Callback: Обработчик не найден (возможно был удален ранее)'
        ));
    }
    
    public function getRefLink()
    {
        $user = User::find()->count();
        $result = 1+$user;
        return 'id'.self::generatess().$result;
    }
    
    protected static function apiSMS()
    {
        return $jsonString = file_get_contents('https://sms.ru/my/free?api_id='.Yii::$app->sms->apiId.'&json=1');
    }
    
    public function getApiFree() 
    {
        (file_exists(self::apiSMS())) ? '' : $cart = json_decode( self::apiSMS() );
        $z = ($cart->used_today == null) ? 0 : $cart->used_today;
        return $z.' из '.$cart->total_free;
    }
    
    public function getNoman($result = '') 
    {
        //   Scripts::getNoman($result = '') 
        $json = json_encode($result);
        return json_decode($json);
    }

    public function resultColumn($text = '', $subscript = '') 
    {
        return Html::tag('p', Defina::STARS.$text.' '.Html::tag('tt', $subscript), ['class' => 'text-muted']);
    }

}