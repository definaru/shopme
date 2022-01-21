<?php
    use yii\helpers\Html;
    $this->title = 'Result';
    
    $this->registerCss('
        .btn-success {
            color: #fff !important;
        }
    ');
    
    $act1 = 'swal({     
        title: "'.Yii::t('yii', 'Congratulations').'", 
        text: "To your e-mail '.Yii::$app->session->getFlash('email').', a username and password has been sent, open this letter and follow the instructions.", 
        type: "success"
    });';
    (Yii::$app->session->hasFlash('OkResult')) ? $this->registerJs($act1) : '';
?>
<div class="container">
    <div class="row">
        <div class="col-md-8 offset-md-2 text-center">
            <?=$this->render('_logo');?>
            <?=Html::tag('p', '...');?>
            <?=Html::a(
                'Sign In', 
                Yii::$app->params['urlMember'].'/en/auth/login'.$_COOKIE["reffer"],
                ['class' => 'btn btn-lg btn-success']
            );?>            
        </div>
    </div>
</div>
