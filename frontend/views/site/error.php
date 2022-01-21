<?php
    use yii\helpers\Html;
    /* @var $this yii\web\View */
    /* @var $name string */
    /* @var $message string */
    /* @var $exception Exception */
    $get = Yii::$app->request->get();
    $this->registerCss('
        .alert-link {
            margin-left: 14px;
            border: 2px solid #fff;
            padding: 3px 10px;
            color: #fff;
            text-decoration: none;
            border-radius: 50em;
        }
        .alert-link:hover{
            color: #dd4b39;
            text-decoration: none;
            background: #fff;
        }
        .alert a {
            color: #fff !important;
            text-decoration: none;
        }
        .alert a:hover {
            color: #dd4b39 !important;
            text-decoration: none;
        }
        .style-icons {
            text-align: center;
            font-size: 140px !important;
            opacity: 0.1;
            margin: auto;
        }
        .brblock {
            display: block;
            width: 100%;
            padding: 20px 0;
            clear: both;
        }
        .alert-danger {
            color: #ffffff;
            background-color: #e9204f;
            border-color: #e9204f;
        }
    ');
    // 
    $paypalerrortitle = (Yii::$app->language == 'ru') ? 'Ошибка платежа PayPal' : 'PayPal Payment Error';
    $paypalerrorbody = (Yii::$app->language == 'ru') ? 'Ваш платёж не прошёл' : 'Your payment failed';
    ($exception->statusCode == '404') ? $this->title = Yii::t('yii', 'ErrorPage') : ''; 
    ($exception->statusCode == '403') ? $this->title = Yii::t('yii', 'Access is denied') : '';
    ($exception->statusCode == '500') ? $this->title = Yii::t('yii', 'An internal server error occurred.') : '';
    ($get['info'] == 'bad') ? $this->title = $paypalerrortitle : '';
    ($get['info'] == 'bad') ? $message = $paypalerrorbody : '';
    //$this->title = $name;
?>
<div class="brblock"></div>
<div class="container text-center">
    <div class="row">
        <div class="login-logo" style="width: 100%;">
            <div class="brblock">
            <?= ($exception->statusCode == '404') ? '<i class="fa fa-compass style-icons"></i>' : '', 
                ($exception->statusCode == '403') ? '<i class="fa fa-warning style-icons"></i>' : '',
                ($exception->statusCode == '500') ? '<i class="fa fa-server style-icons"></i>' : '';
            ?>   
            </div>
        </div>    
        <div class="brblock">
            <h1><?=Html::encode($this->title);?></h1>
        </div>
        <div class="brblock">
            <div class="alert alert-danger">
                <p class="no-margin"><strong class="text-light">Warning!</strong> <?=nl2br(Html::encode($message)) ?>
                <?= Html::a(Yii::t('yii', 'BACK', ['icon' => '<i class="ionicons ion-arrow-left-c"></i>']), 'javascript:history.back(1)', ['class' => 'alert-link']);?></p>                    
            </div>            
        </div>
        <div class="brblock"></div>
        <div class="brblock"></div>
    </div>
</div>