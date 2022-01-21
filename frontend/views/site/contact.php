<?php
    use yii\helpers\Html;
    use yii\bootstrap\ActiveForm;
    use yii\captcha\Captcha;
    use yii\widgets\MaskedInput;
    use budyaga_cust\users\models\Scripts;
    use budyaga_cust\users\models\Defina;
    $color = $page->slider ? '#fff' : '#000';
    $customField = [
        'options' => ['class' => 'custom-file'],
        'inputTemplate' => '{input}<label class="custom-file-label">'.Yii::t('yii', 'Browse').'</label>'
    ];
    $input = Scripts::input();
    $name = (Yii::$app->user->isGuest) ? '' : $params->nickname.' '.$params->lastname;
    (Yii::$app->session->hasFlash('contactFormSubmitted')) ? $this->registerJs('swal(" '.Yii::t('yii', 'Congratulations').' ", " '.Yii::t('yii', 'Your message has been successfully delivered').' ", "success")') : '';
    (Yii::$app->session->hasFlash('errorMessag'))          ? $this->registerJs('swal(" '.Yii::t('yii', 'Error').' ",           " '.Yii::t('yii', 'Your data has not been sent').' ",                  "error")'  ) : '';
    // $page->header
    $this->title = (!$page->title) ? Yii::t('yii', 'Contacts') : $page->title;
    $this->registerMetaTag(['name' => 'keywords', 'content' => $page->keywords]);
    $this->registerMetaTag(['name' => 'description', 'content' => $page->description], 'description');
    $this->registerCss('
        h1 span {color:#E9204F}
        h1 {
            font-family: "Poppins", sans-serif;
            font-weight: 900;
        }
        p {font-family: "Poppins", sans-serif;}
        .navbar-dark .navbar-nav .nav-link {
            color: '.$color.';
        }
        .back {background: #00000070;padding: 150px 0;}
        .text_two {
            font-family: "Poppins", sans-serif;
            font-weight: 300;
        }
        .icon_contact {
            font-size: 70px;
            margin-top: 0;
            margin-right: 15px;
            color: #e9204f;
        }
    ');
?>
<section style="<?=$page->slider ? 'padding: 0;background: url('.$page->slider.') no-repeat;background-size: cover;background-position: center center' : 'padding:100px 0;';?>">
    <div<?=$page->slider ? ' class="back"' : '';?>>
        <div class="container">
            <div class="row">
                <div class="col-md-12 text-left" style="padding-top:100px;">
                    
                    <h1 class="line<?=$page->slider ? ' text-white' : ' text-dark'?>"><?=$page->header;?><?=Scripts::Edit('page', $page->id)?></h1>
                    
                    <?=Html::tag('h5', $page->text, ['class' => $page->slider ? 'text-light text_two' : 'text-muted text_two']);?>
                    <br/>
                    <br/>
                    <?=Html::a(Yii::t('yii', 'Help Support'), '#send', ['class' => 'hex btn btn-lg btn-danger']);?>                
                </div>
            </div>
        </div>
    </div>    
</section>





    
<section class="bg-light" style="padding:50px 0;">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-4 pt-5 pb-5">
                <div class="d-flex justify-content-center">
                    <div class="media">
                        <i class="ionicons ion-social-whatsapp-outline icon_contact"></i>
                        <div class="media-body">
                            <?=Html::tag('h4', Yii::t('yii', 'Calls in Russia'), ['class' => 'mb-1'])?>
                            <?= Scripts::phone(Yii::$app->params['phoneRu'], ['class' =>'tel text-dark']);?>
                        </div>
                    </div>                    
                </div>
            </div>
            
            <div class="col-md-4 pt-5 pb-5">
                <div class="d-flex justify-content-center">
                    <div class="media">
                        <i class="ionicons ion-android-call icon_contact"></i>
                        <div class="media-body">
                            <?=Html::tag('h4', Yii::t('yii', 'Calls in Italy'), ['class' => 'mb-1'])?>
                            <?= Scripts::phone(Yii::$app->params['phoneIt'], ['class' =>'tel text-dark']);?>
                        </div>
                    </div>
                </div>
            </div>
            
            <div class="col-md-4 pt-5 pb-5">
                <div class="d-flex justify-content-center">
                    <div class="media">
                        <i class="ionicons ion-social-skype icon_contact"></i>
                        <div class="media-body">
                            <?=Html::tag('h4', Yii::t('yii', 'Skype Calls'), ['class' => 'mb-1'])?>
                            <?= Scripts::skype('definaru', ['class' =>'tel text-dark']);?>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
</section>

<section id="send" class="subscribe-seven">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 offset-lg-2">
                <?=(!$page->fulltext) ? '' : Html::tag('p', $page->fulltext, ['class' => 'no-padding xs-justify sm-justify md-left lg-left']);?>
                
                <?php if (Yii::$app->session->hasFlash('contactFormSubmitted')) : ?>
                    <div class="alert alert-success fade in alert-dismissible show text-center">
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true" style="font-size:20px">×</span>
                        </button>    
                        <strong>Success!</strong> Your application is accepted. Please wait, we will contact you.
                    </div>
                <?php else: ?>
                    <?php $form = ActiveForm::begin(['options' => ['data-pjax' => true, 'enctype' => 'multipart/form-data']]) ?>
                        <div>
                            <div class="row">
                                <div class="col-md-4">
                                    <?= $form->field($model, 'name')->$input(['placeholder' => Yii::t('yii', 'Your name'), 'value' => $name])->label(false);?>
                                </div>
                                <div class="col-md-4">
                                    <?= $form->field($model, 'email')->widget(MaskedInput::className(), ['clientOptions' => ['alias' => 'email'],])->$input(['placeholder' => Yii::t('yii', 'Your Email'), 'value' => $params->email])->label(false);?>
                                </div>
                                <div class="col-md-4">
                                    <?= $form->field($model, 'phone')->widget(MaskedInput::className(), ['mask' => Scripts::phoneLangFormat(Yii::$app->language)])->$input(['placeholder' => Yii::t('yii', 'Your phone number'), 'value' => $params->contact_tel])->label(false);?>
                                </div>
                            </div>
                        <?php // = $form->field($model, 'city')->dropDownList(ArrayHelper::map(Scripts::getViewCity(), 'c_header', 'c_header'),['prompt' => 'укажите ваш город', 'class' => 'form-control'])->label(false) ?>
                        <?= $form->field($model, 'city')->hiddenInput(['value' => '(пусто)'])->label(false) ?>
                        <?= $form->field($model, 'img')->hiddenInput(['value' => '/img/img_avatar3.png'])->label(false) ?>
                        <?= $form->field($model, 'slug')->hiddenInput(['value' => Yii::t('yii', 'Feedback')])->label(false) ?>
                        <?= $form->field($model, 'body')->textArea(['rows' => 6, 'placeholder' => Yii::t('yii', 'Write your message here')])->label(false) ?>
                        <?= $form->field($model, 'file', $customField)->fileInput(['class' => 'custom-file-input'])->label(false) ?>
                        <?= $form->field($model, 'date')->hiddenInput(['value' => Scripts::getTime()])->label(false) ?>
                        <?= $form->field($model, 'ip')->hiddenInput(['value' => Scripts::getIp()])->label(false) ?>
                        <?= $form->field($model, 'pub')->hiddenInput(['value' => Defina::RIGHT])->label(false) ?> 
                        <?php if(Yii::$app->user->isGuest) : ?>
                        <?= $form->field($model, 'verifyCode')->widget(Captcha::className(), [
                            'template' => '
                                <div class="row">
                                        <div class="col-md-4 capt-text cp">{image}</div>
                                        <div class="col-md-8">{input}</div>
                                </div>', 
                            'options' => ['class' => 'form-control st-non-br', 'placeholder' => Yii::t('yii', 'Code from the picture'), 'autocomplete' => 'off']])->label(false);?> 
                        <?php else : ?>
                            <?=$form->field($model, 'verifyCode')->hiddenInput(['value' => 'yes'])->label(false);?>
                        <?php endif;?>                             
                        </div>
                        
                        <div class="brblock"></div>
                        <div class="col-md-4 offset-md-4 text-center">
                            <?= Html::submitButton(Yii::t('yii', 'Send', ['icon' => '<i class="ionicons ion-paper-airplane"></i>']), ['class' => 'btn btn-color btn-danger btn-block btn-lg', 'name' => 'contact-button']) ?>
                        </div>
                    <?php ActiveForm::end(); ?> 
                <?php endif;?>

                
                
                
            </div>
        </div>
    </div>
</section>

</div>
</div>
</section>