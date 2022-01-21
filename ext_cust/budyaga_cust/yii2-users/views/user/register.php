<?php
    use yii\helpers\Html;
    use yii\bootstrap\ActiveForm;
    // use budyaga_cust\users\models\Affise;
    use budyaga_cust\users\models\Google;
    use budyaga_cust\users\models\Scripts;
    use budyaga_cust\users\models\FaceBookModel;
    
    $geterror = 'swal({     
        title: "Error", 
        text: "'.$get['error_message'].'", 
        type: "error"
    });';
    
    $act = 'swal({     
        title: "'.Yii::t('yii', 'Congratulations').'", 
        text: "To your e-mail '.$post['SignupForm']['email'].', a username and password has been sent, open this letter and follow the instructions.", 
        type: "success"
    });';
    
    
    ($get['error_code']) ? $this->registerJs($geterror) : '';
    (Yii::$app->session->hasFlash('OkResult')) ? $this->registerJs($act) : '';
    $this->title = 'Sign Up | '.Yii::$app->params['name'];
    $this->registerCss('
        p {
            font-size:14px;
            margin:0;
        }
        .text-dark {
            color:#000;
        }
        .face:after {
            position: absolute;
            content: "or";
            font-size: 14px;
            right: -7px;
            top: 13px;
        }
        .styles {
            position: relative;
            background: #fff;
            top: -37px;
            display: table;
            padding: 5px;
            text-align: center;
            margin: auto;
            width: 85px;
        }
        label {font-size:11px;}
        .form-group {
            margin-bottom: 0;
        }
    ');
?>
<div style="display: none"><?php $data = Google::getTokenGoogle();?></div>

<div class="login-box">
    <div class="login-logo text-center">
    <?=$this->render('_logo');?>
        <div class="register-box-body">
<?php /*
<?=$data->email;?><br/>
<?=$data->name;?><br/>
<?=Html::img($data->picture);?><br/>
*/ ?>

            <div id="googleverifid" style="display: none"><?=$data->verifiedEmail;?></div>
            <?php if (Yii::$app->session->hasFlash('OkResult')) : ?>
            <div class="alert alert-success text-center" style="font-size: 16px;margin-bottom: 0;">
                <strong>Success!</strong> 
                <p>To your e-mail <u><?=$post['SignupForm']['email'];?></u>, a username and password has been sent, open this letter and follow the instructions.</p>
                <?=Html::a(Yii::t('yii', 'Sign In'), '/login', ['class' => 'btn btn-default btn-block', 'style' => 'background: #ddd;margin-top: 16px;color: #000 !important;text-decoration: none;font-weight: bold;'])?>
            </div>
            <?php else : ?>
            
            <div<?=($get['code']) ? '' : ' style="display:none;"';?>>
                <?=Html::img('/img/load.svg', ['style' => 'width:40px']);?> <p>Please Wait</p>
            </div>
            
            
            <div<?=(!$get['code']) ? '' : ' style="display:none;"';?>>
            <?=Html::tag('h3', Yii::t('yii', 'Sign Up'), ['class' => 'text-dark', 'style' => 'margin: 0;']);?>
            <div class="brblock"></div>            
            
                <?php $form = ActiveForm::begin(['options' => ['id' => 'multipass', 'action' => '/register']])?>
                    <?=$form->field($model, 'nickname')->textInput(['placeholder' => 'Your first name', 'value' => $data->name])->label(false);?>
                    <?=$form->field($model, 'email')->textInput(['placeholder' => 'Your e-mail', 'value' => $data->email])->label(false);?>
                    <?=$form->field($model, 'password')->passwordInput(['placeholder' => 'Your password', 'value' => Scripts::generatess(12)])->label(false);?>
                    <?=$form->field($model, 'photo')->hiddenInput(['value' => $data->picture])->label(false);?>
                    
                    <?= Html::submitButton('<i class="fa fa-plus"></i> '.Yii::t('yii', 'Sign Up'), ['class' => 'btn btn-danger btn-block btn-lg', 'name' => 'signup-button']) ?>
                <?php ActiveForm::end(); ?>                 
            
            <div class="brblock"></div>
            <?=Html::tag('p', 'other with', ['id' => 'full_line', 'class' => 'text-muted']);?>
            <div class="brblock"></div>
            
            <div class="row">
                <div class="col-md-6 face">
                    <button class="btn btn-default btn-block btn-lg" id="nofacebook">
                        <i class="fa fa-facebook-square text-primary"></i> Facebook
                    </button>
                </div>
                <div class="col-md-6">
                    <button class="btn btn-default btn-block btn-lg" onclick="window.location='<?=$link?>'">
                        <img src="/rm/assets/img/google_icon-icons.com_62736.svg" style="width: 20px;"> Google
                    </button>                        
                </div>
                <div class="col-md-12">
                    <div class="brblock"></div>
                </div>
            </div>
            </div>
            
            
            <?php endif;?>
        </div>
    </div>
    

    
    
    <div class="text-center">
        <small class="text-muted">
            As a result of subscribing to the service, you will receive promotional messages by e-mail. You can unsubscribe at any time.
        </small><br/><br/>
        <br/>
        <br/>
        <small class="text-muted">
            &copy; <?=date('Y');?> "<?=Yii::$app->params['name'];?>" / All Right Recerved
        </small>
    </div>

</div>
<?php if($_GET['code'] == '' || $_GET['state'] == '') : else : ?>
<pre>
    <?php print_r(FaceBookModel::getUser());?>
</pre>
<?php endif;?>    