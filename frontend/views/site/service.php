<?php
    use yii\helpers\Html;
    use yii\bootstrap\ActiveForm;
    use budyaga_cust\users\models\Scripts;
    use yii\widgets\MaskedInput;
    $input = Scripts::input();
    $x = $get ? $list->id : $page->id;
    $y = $get ? 'service' : 'page';
    $z = $get ? $list->title : Yii::t('yii', 'Services');
    $image = $get ? $list->background : $page->slider;
    $this->title = (!$page->title) ? $z : $page->title;
    $color = $image ? '#fff' : '#000';
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
        .back {background: #000000bd;padding: 20px 0;}
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
        .pr__secondary {
            width: 40px;
            border-top: 2px solid #E9204F !important;
            position: relative;
            top: -12px;      
        }
        .breadcrumb-item.active {
            color: #dfdfdf;
        }
        .breadcrumb li a {
            color: #e9204f;
            font-weight: 500;
            text-transform: uppercase;
        }
        .breadcrumb-item+.breadcrumb-item::before {
            color: #eae9e9;
        }
        .help-block.help-block-error {
            margin: 0;
            font-size: 12px;
            color: red;
        }
    ');
?>
<section style="<?=$image ? 'padding: 0;background: url('.$image.') no-repeat;background-size: cover;background-position: center center' : 'padding:100px 0;';?>">
    <div<?=$image ? ' class="back"' : '';?>>
        <div class="container">
            <div class="row">
                <div class="col-md-12 text-left" style="padding-top:120px;">
                    <?=Html::tag('h1', $get ? $list->header : $page->header, ['class' => $image ? 'line text-white' : 'line text-dark']);?>

                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="/">Home</a></li>
                            <?=$get ? Html::tag('li', Html::a(Yii::t('yii', 'Services'), '/service'), ['class' => 'breadcrumb-item']) : ''?>
                            <li class="breadcrumb-item active" aria-current="page"><?=$this->title;?></li>
                        </ol>
                    </nav>
                    
                    <?=Scripts::Edit($y, $x)?>
                    <br/>
                    <br/>
                </div>
            </div>
        </div>
    </div>    
</section>



<?php if(!$page->fulltext || $get) : else : ?>
<section id="send" style="padding:100px 0;">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 offset-lg-2">
                <?=Html::tag('p', $page->fulltext, ['class' => 'no-padding xs-justify sm-justify md-left lg-left']);?>
            </div>
        </div>
    </div>
</section>
<?php endif; ?>

<?php if(!$list->fulltexts) : else : ?>
<section id="send" style="padding:100px 0;">
    <div class="container">
        <div class="row">
            <div id="content" class="col-lg-12">
                <blockquote class="blockquote">
                    <?=Html::tag('h5', $get ? $list->text : $page->text, ['class' => 'text-muted']);?>

                    <?=Html::tag('button', Yii::t('yii', 'Checkout'), ['class' => 'btn btn-danger sea cp', 'id' => 'buy'])?> 
                    <?=Html::a(Yii::t('yii', 'More details'), '#more', ['class' => 'btn btn-outline-danger sea cp hex'])?> 
                </blockquote>
                <div id="more" style="padding-top:100px;"></div>
                <?=Html::tag('p', $list->fulltexts, ['class' => 'no-padding xs-justify sm-justify md-left lg-left']);?>
            </div>
            <div class="col-lg-12 mt-4">
                <?=Scripts::Edit($y, $x)?>
            </div>
        </div>
    </div>
</section>
<?php endif; ?>


<section<?=(!$page->fulltext) ? ' id="send"' : '';?> class="features-area">
    <div class="container">
        <div class="row">
            <?php if (Yii::$app->session->hasFlash('contactFormSubmitted')) : ?>
                <div class="alert alert-success fade in alert-dismissible show text-center">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true" style="font-size:20px">×</span>
                    </button>    
                    <strong>Success!</strong> Your application is accepted. Please wait, we will contact you.
                </div>
            <?php else: endif; ?>
        </div>
    </div>
    <div class="container">   
        <div id="data-creative-colomn" class="row p-bottom-75">
            <?php foreach ($models as $items) { ?>
            <div class="col-md-4 pb-4">
                <div class="card rounded-0">
                    <div class="card-body inner" onclick="getStartLink('/service-<?=$items->link?>.html')">
                        <span class="float-left">
                            <span class="pip_n">
                                <?=$items->icon;?> 
                            </span>
                            <strong><?=$items->header;?></strong>
                        </span>
                        <span class="pip_z">
                            <i class="ionicons ion-ios-arrow-thin-right"></i>
                        </span>
                    </div>
                </div>
            </div>
            <?php } ?>
            <?=Scripts::Edit('service');?>
        </div>
    </div>
</section>


</div>
</div>
</section>

    <section class="subscribe-seven">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 offset-lg-2">
                    <div class="subscribe-contents text-center">
                        <h2>Get Started Instantly! <br> <span>Request a Call Back Now</span></h2>
                        <form action="#" class="subscribe-form-two p-left-50 p-right-50">
                            <div>
                                <input type="text" class="form-control" placeholder="Enter your email address" aria-label="Username">
                                <button class="btn btn-primary">Request Now</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>

<?php if(!$get) : else : ?>
<div class="modal fade" id="OrderSite">
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content">
            <div class="modal-header border-0">
                <h4 class="modal-title">Бланк заказа</h4>
                <button type="button" class="close" data-dismiss="modal">×</button>
            </div>
            <div class="modal-body">
                <?php $form = ActiveForm::begin(['options' => ['id' => 'zakaz', 'data-pjax' => true, 'enctype' => 'multipart/form-data']]) ?>
                    <?= $form->field($model, 'fio')->textInput(['placeholder' => 'Как вас зовут? (Ф.И.О.) '])->label(false);?>
                    <?= $form->field($model, 'analitics')->textArea(['id' => 'full', 'style' => 'display:none;'])->label(false);?>
                    <?= $form->field($model, 'phone')->widget(MaskedInput::className(), ['mask' => Scripts::phoneLangFormat(Yii::$app->language)])->textInput(['placeholder' => Yii::t('yii', 'Your phone number'), 'value' => $params->contact_tel])->label(false);?>
                    <?= $form->field($model, 'email')->widget(MaskedInput::className(), ['clientOptions' => ['alias' => 'email'],])->textInput(['placeholder' => Yii::t('yii', 'Your Email'), 'value' => $params->email])->label(false);?>
                    <?= Html::submitButton(Yii::t('yii', 'Send', ['icon' => '<i class="ionicons ion-paper-airplane"></i>']), ['class' => 'btn btn-color btn-danger btn-block btn-lg', 'name' => 'contact-button']) ?>
                <?php ActiveForm::end(); ?>
            </div>
        </div>
    </div>
</div>
<?php endif; ?>