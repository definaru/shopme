<?php 
    use yii\helpers\Html;
    use yii\bootstrap\ActiveForm;
    use yii\widgets\MaskedInput;
    use budyaga_cust\users\models\Scripts;
    $x = $link ? 'catalog' : 'page';
    $y = $link ? $models->id : $page->id;
    $color = $page->slider ? '#fff' : '#000';
    $this->title = $page->title;
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
            <div class="row" style="padding-top:100px;">
                <div class="col-md-6 text-left mb-4">
                    <h1 class="<?=$page->slider ? 'line text-white' : 'line text-dark'?>">
                        <?=$link ? $models->name : $page->header;?><?=Scripts::Edit($x, $y)?>
                    </h1>
                    <?php if(!$link) : else : ?>
                        <?php if (Yii::$app->session->hasFlash('okZakaz')) : ?> 
                            <div class="alert alert-success fade in alert-dismissible show" style="margin-top:18px;">
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true" style="font-size:20px">×</span>
                                </button>    
                                <strong style="font-weight: bold;">Success!</strong>
                                <br/>Ваша заявка принята. <br/>
                                Пожалуйста, запишите номер вашего заказа, он вам ещё пригодится.<br/>
                                <a href="/ticket/<?=$get['s']?>">№<?=$get['s']?></a>
                            </div>
                        <?php else: ?>
                    
                    
                    
                            
                            <div class="card bg-white shadow">
                                <div class="card-header text-center">
                                    <h6 class="mt-3">Форма заказа</h6>
                                </div>
                                <div class="card-body">
                                    
                            <?php $form = ActiveForm::begin(['options' => ['id' => 'zakaz', 'data-pjax' => true, 'enctype' => 'multipart/form-data']]) ?>
                                <div class="row">
                                    <div class="col-md-12 mb-2">
                                        <?= $form->field($model, 'fio')->textInput(['placeholder' => 'Ваше Ф.И.О.'])->label(false);?>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-12 mb-2">
                                        <?= $form->field($model, 'phone')->widget(
                                            MaskedInput::className(), 
                                            ['mask' => '+7(999) 999-99-99']
                                        )->textInput(['placeholder' => 'Телефон мобильный'])->label(false);?>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12 mb-2">
                                        <?= $form->field($model, 'email')->widget(
                                            MaskedInput::className(), 
                                            ['clientOptions' => ['alias' => 'email']]
                                        )->textInput(['placeholder' => 'Ваш Email'])->label(false);?>                                        
                                    </div>
                                </div>    
                                <div class="row">
                                    <div class="col-md-12">
                                        <?= $form->field($model, 'analitics')->textArea(['id' => 'full', 'style' => 'display:none;'])->label(false);?>
                                    </div>
                                </div>
                                <?= $form->field($model, 'date')->hiddenInput()->label(false);?>
                        
                                <?= Html::submitButton(Yii::t('yii', 'Send', ['icon' => '<i class="fa fa-paper-plane-o"></i>']), ['class' => 'btn btn-danger btn-block btn-lg', 'name' => 'contact-button']) ?>
                            <?php ActiveForm::end(); ?>  
                                    
                                </div>
                            </div>
                        <?php endif; ?>

                    <?php endif; ?> 
                </div>                    
                <div class="col-md-6 text-right">
                    <?=$link ? Html::img($models->img, [
                        'class' => 'img-fluid img-thumbnail p-0 border border-secondary rounded-0', 
                        'alt' => 'Work #'.$models->id
                    ]) : '';?>
                </div>
            </div>
        </div>
    </div>    
</section>
        </div>
    </div>    
</section>

<?php if(!$link) : else : ?>
<section class="bg-light" style="padding:100px 0;">
    <div class="container">
        <div class="row">
            <div class="col-md-12 text-left pb-5">
                <hr class="pr__hr__secondary">
                <h2 class="title">Пакеты услуг</h2>                    
                <p class="text-danger">
                    Выберите наиболее подходящий вам.
                </p>                
            </div>
        </div>
    </div>
    <div class="container mb-4 pb-4">
        <div class="row">
            <div class="col-md-4 mt-4 mb-4">
                <div class="card shadow">
                    <div class="card-header text-center text-dark border-0">
                        <hr class="pr__hr__secondary" style="position: relative;top: 10px;">
                        <h4 class="mt-4">Тариф Light</h4>
                    </div>
                    <div class="card-body text-center">
                        <p>Минимальный заказ на создание одного сайта</p><br/>
                        <strong>от 15.000 ₽</strong><br/>
                        <?=Html::a(
                            Yii::t('yii', 'More details'),
                            'javascript:;', 
                            ['data-fancybox' => '', 'data-animation-duration' => '700', 'data-src' => '#animatedModalOne'])
                        ;?>
                            <div style="display: none;" id="animatedModalOne" class="animated-modal">
                                <div class="row">
                                    <div class="col-md-12">
                                        ...
                                    </div>
                                </div>
                            </div>
                    </div>
                    <div class="card-footer">
                        <button class="btn btn-danger btn-block">Выбрать</button>
                    </div>
                </div>
            </div>            
            <div class="col-md-4 mt-4 mb-4">
                <div class="card shadow">
                    <div class="card-header text-center text-dark border-0">
                        <hr class="pr__hr__secondary" style="position: relative;top: 10px;">
                        <h4 class="mt-4">Тариф Affiliate</h4>
                    </div>
                    <div class="card-body text-center">
                        <p>Минимальный заказ на создание одного сайта</p><br/>
                        <strong>от 35.000 ₽</strong><br/>
                        <?=Html::tag('u', Yii::t('yii', 'More details'));?>
                    </div>
                    <div class="card-footer">
                        <button class="btn btn-danger btn-block">Выбрать</button>
                    </div>
                </div>
            </div>            
            <div class="col-md-4 mt-4 mb-4">
                <div class="card shadow">
                    <div class="card-header text-center text-dark border-0">
                        <hr class="pr__hr__secondary" style="position: relative;top: 10px;">
                        <h4 class="mt-4">Тариф Business</h4>
                    </div>
                    <div class="card-body text-center">
                        <p>Минимальный заказ на создание одного сайта</p><br/>
                        <strong>от 100.000 ₽</strong><br/>
                        <?=Html::tag('u', Yii::t('yii', 'More details'));?>
                    </div>
                    <div class="card-footer">
                        <button class="btn btn-danger btn-block">Выбрать</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<?php endif; ?>

<section class="pr__section"></section>
<section id="send" class="content-block content-block--15 mt-5">

    <div class="container-fluid">
        <div id="portfolio" class="row">
            <?php foreach ($portfolios as $imstep) { ?>
            <div class="col-md-4 mb-4">
		<?=$this->render('_portfolio', ['imstep' => $imstep, 'size' => 1]);?>
            </div>
            <?php } ?>
        </div>
    </div>
</section>



