<?php
    use yii\helpers\Html;
    use budyaga_cust\users\models\Scripts;
    use budyaga_cust\users\models\Top;
    $zakaz = Scripts::getPageAction('zakaz');
    $this->title = Yii::$app->params['name'];
    $this->registerMetaTag(['name' => 'keywords', 'content' => $page->keywords]);
    $this->registerMetaTag(['name' => 'description', 'content' => $page->description], 'description');
    $this->registerCss("
        @import url('https://fonts.googleapis.com/css2?family=Open+Sans:wght@300;400;600;700;800&display=swap');
        .parent {
            display: flex;
            align-content: center;
            justify-content: center;
            align-items: center;
            height: 500px;
            text-align: center;
            font-family: sans-serif;
        } 
        body, html {
            margin: 0;
            padding:0;
            background: #181b20;
            font-family: 'Open Sans', sans-serif;
        }
        h1 {color:#fff;margin-bottom:100px;}
    ");
?>

<div class="parent">
    <div>
        <img src="/uploads/2019/12/favicon-32x32.png" style="width:100px;" alt="ShopMe" />
        <div style="margin-bottom:30px;">
            <img src="/task/img/logo.svg" style="width:200px;" alt="ShopMe" />
        </div>
        <h1>Ведутся технические работы</h1>    
        <script src="//megatimer.ru/get/c4f24269de9af09b8e697c7dcb8f598a.js"></script>
    </div>
<div>
<?php 
/*
            <div id="rev_slider_35_1_wrapper" class="rev_slider_wrapper fullwidthbanner-container" data-alias="slider9"
                 data-source="gallery"
                 style="margin:0px auto;background:transparent;padding:0px;margin-top:0px;margin-bottom:0px;">

                <div id="rev_slider_35_1" class="rev_slider without_overlay fullwidthabanner" style="display:none;" data-version="5.4.8.1">
                    <ul>
                        <li data-index="rs-72" data-transition="fade" data-slotamount="default" data-hideafterloop="0"
                            data-hideslideonmobile="off" data-easein="default" data-easeout="default" data-masterspeed="300"
                            data-delay="8970" data-rotate="0" data-saveperformance="off" data-title="Slide" data-param1=""
                            data-param2="" data-param3="" data-param4="" data-param5="" data-param6="" data-param7=""
                            data-param8=""
                            data-param9="" data-param10="" data-description="">

                            <img src="/task/img/transparent.png" data-bgcolor='' alt="" data-bgposition="center center" data-bgfit="cover" data-bgrepeat="no-repeat" data-bgparallax="off" class="rev-slidebg" data-no-retina>

                            <div id="rrzm_72" class="rev_row_zone rev_row_zone_middle" style="z-index: 5;">

                                <div class="tp-caption" id="slide-72-layer-1" data-x=""
                                     data-y="center" data-voffset="" data-width="['auto']" data-height="['auto']"
                                     data-type="row" data-columnbreak="3" data-responsive_offset="on" data-responsive="off"
                                     data-frames='[{"delay":10,"speed":300,"frame":"0","from":"opacity:0;","to":"o:1;","ease":"Power3.easeInOut"},{"delay":"wait","speed":300,"frame":"999","to":"opacity:0;","ease":"Power3.easeInOut"}]'
                                     data-margintop="[0,0,0,0]" data-marginright="[0,0,0,0]" data-marginbottom="[0,0,0,0]" data-marginleft="[0,0,0,0]"
                                     data-textAlign="['inherit','inherit','inherit','inherit']"
                                     data-paddingtop="[0,0,0,0]" data-paddingright="[0,0,0,0]" data-paddingbottom="[0,0,0,0]" data-paddingleft="[0,0,0,0]"
                                     style="z-index: 5; white-space: nowrap; font-size: 17px; line-height: 22px; font-weight: 400; color: #ffffff; letter-spacing: 0px;">

                                    <div class="tp-caption" id="slide-72-layer-2" data-x="100" data-y="100" data-width="['auto']"
                                         data-height="['auto']" data-type="column" data-responsive_offset="on" data-responsive="off"
                                         data-frames='[{"delay":"+0","speed":300,"frame":"0","from":"opacity:0;","to":"o:1;","ease":"Power3.easeInOut"},{"delay":"wait","speed":300,"frame":"999","to":"opacity:0;","ease":"Power3.easeInOut"}]'
                                         data-columnwidth="50%" data-verticalalign="top" data-margintop="[0,0,0,0]" data-marginright="[0,0,0,0]"
                                         data-marginbottom="[0,0,0,0]" data-marginleft="[0,0,0,0]" data-textAlign="['inherit','inherit','inherit','inherit']"
                                         data-paddingtop="[0,0,0,0]" data-paddingright="[0,0,0,0]" data-paddingbottom="[0,0,0,0]"
                                         data-paddingleft="[0,0,0,0]" style="z-index: 6; width: 100%;">

                                        <hr class="pr__hr__secondary"/>
                                        <h1 class="tp-caption tp-resizeme title" id="slide-72-layer-4" data-x="" data-y=""
                                            data-width="['auto']" data-height="['auto']" data-type="text"
                                            data-responsive_offset="on" data-fontsize="['68', '64', '60', '58']"
                                            data-lineheight="['72', '62', '60', '56']"
                                            data-frames='[{"delay":"+10","split":"chars","splitdelay":0.05,"speed":1040,"split_direction":"forward","frame":"0","from":"x:[105%];z:0;rX:45deg;rY:0deg;rZ:90deg;sX:1;sY:1;skX:0;skY:0;","mask":"x:0px;y:0px;s:inherit;e:inherit;","to":"o:1;","ease":"Power4.easeInOut"},{"delay":"wait","speed":300,"frame":"999","to":"auto:auto;","mask":"x:0;y:0;s:inherit;e:inherit;","ease":"Power3.easeInOut"}]'
                                            data-margintop="[0,0,0,0]" data-marginright="[0,0,0,0]"
                                            data-marginbottom="[0,0,0,0]" data-marginleft="[0,0,0,0]"
                                            data-textAlign="['inherit','inherit','inherit','inherit']"
                                            data-paddingtop="[0,0,0,0]" data-paddingright="[0,0,0,0]"
                                            data-paddingbottom="[0,0,0,0]" data-paddingleft="[0,0,0,0]"
                                            style="z-index: 7; white-space: normal; font-size: 68px; line-height: 72px;font-family: 'Poppins', sans-serif; font-weight: 900; color: #202428; letter-spacing: 0px; display: block;">
                                            <?=$page->header;?>
                                        </h1>

                                        <div class="tp-caption tp-resizeme"
                                             id="slide-72-layer-5" data-x="" data-y=""
                                             data-width="['auto']" data-height="['auto']" data-type="text"
                                             data-responsive_offset="on" data-fontsize="['28', '28', '28', '26']" data-lineheight="['32', '32', '32', '22']"
                                             data-frames='[{"delay":"+1550","speed":1420,"sfxcolor":"#ffffff","sfx_effect":"blockfromtop","frame":"0","from":"z:0;","to":"o:1;","ease":"Power4.easeInOut"},{"delay":"wait","speed":300,"frame":"999","to":"opacity:0;","ease":"Power3.easeInOut"}]'
                                             data-margintop="[35,35,35,35]" data-marginright="[0,0,0,0]" data-marginbottom="[35,35,35,35]" data-marginleft="[0,0,0,0]"
                                             data-textAlign="['inherit','inherit','inherit','inherit']"
                                             data-paddingtop="[0,0,0,0]" data-paddingright="[0,0,0,0]" data-paddingbottom="[0,0,0,0]" data-paddingleft="[0,0,0,0]"
                                             style="z-index: 8; white-space: normal; font-size: 28px; line-height: 32px; font-weight: 400; color: #202428; letter-spacing: 0px; display: block;">
                                            <?=$page->text?>
                                        </div>

                                        <div class="tp-caption" id="slide-72-layer-6" data-x="" data-y=""
                                             data-width="['auto']" data-height="['auto']" data-type="text" data-responsive_offset="on"
                                             data-frames='[{"delay":"+3520","speed":560,"frame":"0","from":"x:200px;skX:-85px;opacity:0;","to":"o:1;","ease":"Power3.easeInOut"},{"delay":"wait","speed":300,"frame":"999","to":"opacity:0;","ease":"Power3.easeInOut"}]'
                                             data-margintop="[0,0,0,0]" data-marginright="[0,0,0,0]" data-marginbottom="[0,0,0,0]" data-marginleft="[0,0,0,0]"
                                             data-textAlign="['inherit','inherit','inherit','inherit']"
                                             data-paddingtop="[0,0,0,0]" data-paddingright="[0,0,0,0]" data-paddingbottom="[0,0,0,0]" data-paddingleft="[0,0,0,0]"
                                             style="z-index: 9; display: inline-block;">
                                            <a id="brony" href="/register" class="pr-button pr-button-lg pr-button-style1-right">
                                                <div class="pr-button-text-icon-wrapper">
                                                    <span><?=Yii::t('yii', 'Become a partner')?></span>
                                                </div>
                                            </a>
                                            <?= Scripts::Edit('page', $page->id);?>
                                        </div>
                                    </div>

                                    <div class="tp-caption" id="slide-72-layer-3" data-x="100" data-y="100"
                                         data-width="['auto']" data-height="['auto']" data-visibility="['on', 'off', 'off', 'off']" data-type="column"
                                         data-responsive_offset="on" data-responsive="off"
                                         data-frames='[{"delay":"+0","speed":300,"frame":"0","from":"opacity:0;","to":"o:1;","ease":"Power3.easeInOut"},{"delay":"wait","speed":300,"frame":"999","to":"opacity:0;","ease":"Power3.easeInOut"}]'
                                         data-columnwidth="50%" data-verticalalign="top"
                                         data-margintop="[0,0,0,0]" data-marginright="[0,0,0,0]" data-marginbottom="[0,0,0,0]" data-marginleft="[0,0,0,0]"
                                         data-textAlign="['inherit','inherit','inherit','inherit']"
                                         data-paddingtop="[0,0,0,0]" data-paddingright="[0,0,0,0]" data-paddingbottom="[0,0,0,0]" data-paddingleft="[0,0,0,0]"
                                         style="z-index: 7; width: 100%;"></div>
                                </div>
                            </div>

                            <div class="tp-caption tp-resizeme rs-parallaxlevel-1" id="slide-72-layer-7"
                                 data-x="right" data-hoffset="-180" data-y="center" data-voffset="0"
                                 data-width="['none','none','none','none']" data-height="['none','none','none','none']"
                                 data-visibility="['on','on','on','off']" data-type="image"
                                 data-responsive_offset="on"
                                 data-frames='[{"delay":4230,"speed":1500,"frame":"0","from":"x:[175%];y:0px;z:0;rX:0;rY:0;rZ:0;sX:1;sY:1;skX:0;skY:0;opacity:1;","mask":"x:[-100%];y:0;s:inherit;e:inherit;","to":"o:1;","ease":"Power3.easeOut"},{"delay":"wait","speed":300,"frame":"999","to":"auto:auto;","mask":"x:0;y:0;s:inherit;e:inherit;","ease":"Power3.easeInOut"}]'
                                 data-textAlign="['inherit','inherit','inherit','inherit']"
                                 data-paddingtop="[0,0,0,0]" data-paddingright="[0,0,0,0]" data-paddingbottom="[0,0,0,0]" data-paddingleft="[0,0,0,0]" style="z-index: 1;">
                            <img src="<?=$page->slider;?>" alt="" data-ww="900px" data-hh="585px" data-no-retina></div>

                        </li>
                    </ul>
                    <div class="tp-bannertimer tp-bottom" style="visibility: hidden !important;"></div>

                </div>
            </div>
        </div>

    </div>
</section>
    
<?=$this->render('_dataservicecolumn');?>
    
<?php /*    <section class="p-top-70 p-bottom-70 border-bottom clients-logo-area">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="logo-carousel-four owl-carousel">
                        <div class="carousel-single">
                            <img src="/task/img/cl14.png" alt="">
                        </div>
                        <div class="carousel-single">
                            <img src="/task/img/cl15.png" alt="">
                        </div>
                        <div class="carousel-single">
                            <img src="/task/img/cl16.png" alt="">
                        </div>
                        <div class="carousel-single">
                            <img src="/task/img/cl17.png" alt="">
                        </div>
                        <div class="carousel-single">
                            <img src="/task/img/cl18.png" alt="">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    

    <section class="features-area">
        <div class="icon-boxes">
            <div class="container">
                <div class="row">
                    <div class="col-md-12 text-left pb-5">
                        <hr class="pr__hr__secondary"/>
                        <?=Html::tag('h2', $service->header, ['class' => 'title']);?>
                        <?=Html::tag('p', $service->text.'<br/>'.Html::a(Yii::t('yii', 'see all', ['icon' => '']), '/service').Scripts::Edit('page', $service->id), ['class' => 'text-muted']);?>
                    </div>
                </div>

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
                </div>
            </div>
        </div>
    </section>
    
    <section class="pr__section"></section>

    <section class="content-block content-block--15">
        <div class="container">
            <div class="row">
                <div class="col-md-12 text-left pb-5">
                    <hr class="pr__hr__secondary"/>
                    <?=Html::tag('h2', $portfolio->header.Scripts::Edit('catalog'), ['class' => 'title']);?>
                    <?=Html::tag('p', Html::a($portfolio->text, '/portfolio').Scripts::Edit('page', $portfolio->id), ['class' => 'text-danger']);?>
                </div>
            </div>
        </div>
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12 p-0">
                    <div class="swiper-container">
                        <div id="portfolio" class="swiper-wrapper">
                            <?php foreach ($portfolios as $imstep) { ?>
                            <div class="swiper-slide">
                                <?=$this->render('_portfolio', ['imstep' => $imstep]);?>
                            </div>
                            <?php } ?>
                        </div>
                        <div class="swiper-button-prev"></div>
                        <div class="swiper-button-next"></div>                           
                        <div class="brblock mt-5 pt-5"></div>
                    </div>
                </div>
            </div>            
        </div>
    </section>

    <section class="pr__section"></section>
  
    <section style="padding:100px 0;">
        <div class="container">
            <div class="row">
                <div class="col-md-8">
                    <div class="grid__item grid__item--bg theme-22">
                        <div class="grid__item-img" data-displacement="/task/distortion-effect/img/displacement/8.jpg" data-intensity="-0.65" data-speedIn="1.2" data-speedOut="1.2">
                            <img src="/task/distortion-effect/img/about_02.jpg" alt="Image" style="display:none;"/>
                            <img src="/task/distortion-effect/img/about_01.jpg" alt="Image Alt" style="display:none;"/>
                        </div>
                        <div class="grid__item-content">
                            <span class="grid__item-meta">Ждешь</span>
                            <h2 class="grid__item-title">Хорошую Идею?</h2>
                            <h3 class="grid__item-subtitle">
                                <span>Наша команда всегда готова прийти на помощь!</span>
                                <a class="grid__item-link" href="/about">Подробнее</a>
                            </h3>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div style="background: #232323; width: 100%; height: 50%; margin-bottom: 31px; padding: 20px;">
                        <div class="">
                            <div class="back__feature__texts">
                                <h4 class="m-0 text-white">Разработайте</h4>
                                <p class="text-light">Бизнес модель</p>    
                                <i class="ionicons ion-clipboard" style="font-size: 80px;"></i>
                            </div>
                        </div>
                    </div>
                    <div style="background: #e9204f; width: 100%; height: 45%; margin-bottom: 31px; padding: 20px;">
                        <div class="">
                            <div class="back__feature__text">
                                <i class="ionicons ion-person-stalker" style="font-size: 80px;color: #232323;"></i>
                                <h4 class="m-0 text-white">Получите</h4>
                                <p class="text-light">Консультацию и готовое решение</p>                                 
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row pt-4 mt-4">
                <div class="col-md-12">
                    <div class="d-flex justify-content-center"><hr class="pr__hr__secondary"/></div>
                </div>
                <?php Top::viewTop();?>
            </div>
        </div>
    </section>
  

    <section class="pr__section"></section>
    

    <section class="content-block content-block--15">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 offset-lg-2 section-title">
                    <h2>Amazing Business Solution <br> Whatever Your Needs</h2>
                    <p>Deserunt dolore voluptatem assumenda quae possimus sunt dignissimos tempora officia. Lorem ipsum dolor sit amet consectetur adipisicing dolore.</p>
                </div><!-- ends: .section-title -->
                <div class="col-lg-12 m-bottom-20">
                    <div class="row align-items-center">
                        <div class="col-lg-5 order-lg-0 order-1">
                            <div class="content-desc">
                                <hr class="pr__hr__secondary"/>
                                <h4>Кто мы<br/>И КАКИЕ УСЛУГИ ПРЕДОСТАВЛЯЕМ</h4>
                                <p>Мы предприниматели и программисты. У нас есть бесценный опыт по открытию бизнеса и ведению сайтов. 
                                Новички в этих двух сферах очень часто допускают одни и те же банальные ошибки, которые приводят 
                                к разочарованию, потере времени и денег. Если вы нацелены получить результат, и добится успеха, 
                                мы те, кто вам нужен для решения ваших задач.
                                <br><br> 
                                Мы помогли более 200 брендам и компаниям по всему миру и гордимся тем, что нас рекомендуют, как 
                                эффективного бизнес-партнера. Наша задача — вывод качественных продуктов и услуг на рынок веб-индустрии. 
                                Наша команда работает быстро и слажено, учитывая желания клиентов и сроки.
                                </p>
                            </div>
                        </div>
                        <div class="col-lg-6 offset-lg-1 order-lg-1 order-0">
                            <img src="/task/img/service1.png" alt="" class="img-fluid">
                        </div>
                    </div>
                </div>
                <div class="col-lg-12 m-bottom-20">
                    <div class="row align-items-center">
                        <div class="col-lg-6">
                            <img src="/task/img/service2.png" alt="" class="img-fluid">
                        </div>
                        <div class="col-lg-5 offset-lg-1">
                            <div class="content-desc">
                                <hr class="pr__hr__secondary"/>
                                <h4>Разработайте Бизнес модель</h4>
                                <p>Наша основная цель – это решение любых бизнес-задач клиента, связанных с digital. 
                                Мы повышаем результативность и раскрываем нереализованный потенциал Вашего бизнеса. 
                                Если мастера Shop me взялись, за проект, будьте уверены, что он будет сделан по максимуму!</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-12">
                    <div class="row align-items-center">
                        <div class="col-lg-5 order-lg-0 order-1">
                            <div class="content-desc">
                                <hr class="pr__hr__secondary"/>
                                <h4>Наймите<br/>Группу профессионалов</h4>
                                <p>Shop me – веб-сервис, организованный командой профессионалов в области разработки сайтов, 
                                рекламы и WEB-аналитики. Главное преимущество нашей студии в том, что мы ценим наших специалистов 
                                и постоянно обучаем их новинкам в сфере веб-разработки, а так же имеем гибкий подход к любому клиенту.</p>
                            </div>
                        </div>
                        <div class="col-lg-6 offset-lg-1 order-lg-1 order-0 margin-md-60">
                            <img src="/task/img/service3.png" alt="" class="img-fluid">
                        </div>
                    </div>
                </div>
                <div class="col-lg-12">
                    <div class="row align-items-center">
                        <div class="col-lg-6">
                            <img src="/task/img/service2.png" alt="" class="img-fluid">
                        </div>
                        <div class="col-lg-5 offset-lg-1">
                            <div class="content-desc">
                                <hr class="pr__hr__secondary"/>
                                <h4>Получите<br/> Консультацию и готовое решение</h4>
                                <p>Мы разработали и используем в нашей работе ряд проверенных методик. 
                                Системно выстроенные процессы и алгоритмы в комплексе с инновационными 
                                технологиями, позволяют создавать качественные продукты, что нравится 
                                Вам и Вашим пользователям, позволяет эффективно решать любые бизнес-задачи.</p>
                            </div>
                        </div>
                    </div>
                    <div class="row pt-4 mt-4">
                        <div class="col-md-12">
                            <div class="d-flex justify-content-center"><hr class="pr__hr__secondary"/></div>
                        </div>
                        <div class="col-md-4 mt-4 text-center">
                            <h4>Мы предоставляем</h4>
                            <p>Партнёрскую программу для лёгкого старта. Данная программа позволит вам сэкономить расходы для публикации вашего сайта в сети интернет.</p>
                        </div>
                        <div class="col-md-4 mt-4 text-center">
                            <h4>Мы поможем</h4>
                            <p>Разработать для вас логотип, дизайн, шрифт, фирменный стиль и брендбук. Подробности по e-mail или по телефону.</p>
                        </div>
                        <div class="col-md-4 mt-4 text-center">
                            <h4>У нас есть</h4>
                            <p>Все необходимые инструменты для настройки и продвижения вашего бизнеса. Хотите больше и лучше продавать, мы составим для вас бизнес-план.</p>
                        </div>
                    </div>
                </div>
                
                
            </div>
        </div>
    </section>


<section class="bg-dark" style="background: url(<?=$zakaz->slider;?>);background-size: cover;background-position: center center;">
    <div style="background: #000000b8;padding: 150px 0;">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12 text-center">
                    <?= Scripts::Edit('page', $zakaz->id);?>
                    <h2 class="text-white">
                        <?=Html::tag('small', $zakaz->header);?>
                        <br> 
                        <hr class="pr__hr__secondary" style="position: relative;top: 0;">
                        <?=Html::tag('span', $zakaz->text);?>
                    </h2>
                    <?=Html::a(Yii::t('yii', 'To order a site'), '/'.$zakaz->href, ['class' => 'btn btn-danger btn-lg'])?>
                </div>
            </div>
        </div>            
    </div>
</section>

    
    
<div class="testimonial-carousel-six-wrapper" style="padding-top:100px;">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="testimonial-carousel-six owl-carousel">
                    <?php Scripts::getReviewAll();?>
                </div>
            </div>
        </div>
    </div>
</div>


<!--    <section class="news-area p-top-100 p-bottom-60">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 offset-lg-2 section-title">
                    <h2>Check Our Latest News</h2>
                    <p>Deserunt dolore voluptatem assumenda quae possimus sunt dignissimos tempora officia. Lorem ipsum dolor sit amet consectetur adipisicing dolore.</p>
                </div>
                
                <div class="post--card-four col-lg-12">
                    <div class="row">
                        <div class="col-lg-4 col-sm-6">
                            <div class="card post--card post--card4">
                                <figure>
                                    <img src="/task/img/blog-1.jpg" alt="">
                                </figure>
                                <div class="card-body">
                                    <h6><a href="">How to Run a Successful Business Meeting</a></h6>
                                    <p>Investig ationes demons trave runt lec tores legere liusry quod ii legunt saepius claritas Investig ationes.</p>
                                    <ul class="post-meta d-flex m-top-20">
                                        <li>Aug 12, 2019</li>
                                        <li>in <a href="">Industry</a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4 col-sm-6">
                            <div class="card post--card post--card4">
                                <figure>
                                    <img src="/task/img/blog-2.jpg" alt="">
                                </figure>
                                <div class="card-body">
                                    <h6><a href="">Gold Prices Soar, but Many People don’t Believe it</a></h6>
                                    <p>Investig ationes demons trave runt lec tores legere liusry quod ii legunt saepius claritas Investig ationes.</p>
                                    <ul class="post-meta d-flex m-top-20">
                                        <li>Aug 12, 2019</li>
                                        <li>in <a href="">Industry</a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>

                        <div class="col-lg-4 col-sm-6">
                            <div class="card post--card post--card4">
                                <figure>
                                    <img src="/task/img/blog-3.jpg" alt="">
                                </figure>
                                <div class="card-body">
                                    <h6><a href="">Global Automative Market Grows to $600 Billion</a></h6>
                                    <p>Investig ationes demons trave runt lec tores legere liusry quod ii legunt saepius claritas Investig ationes.</p>
                                    <ul class="post-meta d-flex m-top-20">
                                        <li>Aug 12, 2019</li>
                                        <li>in <a href="">Industry</a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

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
    </section>-->
*/
?>
