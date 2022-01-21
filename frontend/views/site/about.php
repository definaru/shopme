<?php
    use yii\helpers\Html;
    use budyaga_cust\users\models\Scripts;
    use budyaga_cust\users\models\Top;
    $color = $page->slider ? '#fff' : '#000';
    $this->title = (!$page->title) ? 'About Us' : $page->title;
    $this->registerMetaTag(['name' => 'keywords', 'content' => $page->keywords]);
    $this->registerMetaTag(['name' => 'description', 'content' => $page->description], 'description');
    //style="background: url( $page->slider ) no-repeat fixed;"
    $this->registerCss('
        hr {
            margin-top: 1rem;
            margin-bottom: 1rem;
            border-top: 1px solid rgb(239, 239, 239);
            width: 100%;
        }   
        h4 small {
            color: #e9204f;
        }
        .contrast {
            font-size:100px;
            color: #e9204f
        }
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
    ');
?>
<section style="<?=$page->slider ? 'padding: 0;background: url('.$page->slider.') no-repeat;background-size: cover;background-position: center center' : 'padding:100px 0;';?>">
    <div<?=$page->slider ? ' class="back"' : '';?>>
        <div class="container">
            <div class="row">
                <div class="col-md-12 text-left">
                    <?=Html::tag('h1', $this->title.Scripts::Edit('page', $page->id), ['class' => $page->slider ? 'line text-white' : 'line text-dark']);?>
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="/">Home</a></li>
                            <li class="breadcrumb-item active" aria-current="page"><?=$this->title;?></li>
                        </ol>
                    </nav>
                </div>

            </div>
        </div>
    </div>    
</section>




<div id="argument" class="managment-area-2 content-area-8" style="padding:100px 0;">
    <div class="container">
        <div class="row">
            <div class="col-lg-5 col-md-5 pt-5">
                <div class="managment-info">

                    <?=Html::tag('h4', $page->header)?>
                    <div class="managment-border-"></div>
                    <?=Html::tag('p', $page->text, ['class' => 'text-justify']);?>
                    
                </div>
            </div>
            <div class="col-lg-6 col-md-7 offset-lg-1 pt-5">
                <?=Html::img('/task/img/hero_01.png');?>
            </div>
        </div>
        
        <div class="row mt-5"><hr/></div>
        
        <div class="row">
            <div class="col-md-12">
                <?=Html::tag('p', $page->fulltext.Scripts::Edit('page', $page->id), ['class' => '']);?>
            </div>
        </div>
        
        <div class="row mt-5"><hr/></div>
        
        <div class="row mt-5">
            <?php Top::viewTop();?>
            <div class="col-md-4 offset-md-4 text-center pt-3">
                <?=Html::a(Yii::t('yii', 'Help Support'), '/contact', ['class' => 'btn btn-danger'])?>
            </div>
        </div>
    </div>
</div>

<?php /*
<section class="home bg-img-1" id="home" style="background: url(<?=$page->slider?>) no-repeat fixed;">
    <div style="background: linear-gradient(to right bottom, rgba(167, 79, 1, 0.75), rgba(103, 86, 5, 0.64), rgb(1, 5, 6)); text-shadow: rgb(0, 0, 0) 0px 1px 2px;text-shadow: 0 0 2px #000;">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <div class="home-fullscreen" id="home-fullscreen">
                        <div class="full-screen" style="color:#fff;">
                            <div class="home-wrapper home-wrapper-alt">
                                <?=Html::tag('p', 'About us', ['class' => 'text-light']);?>
                                <?=Html::tag('h1', Defina::my.''.Scripts::Edit('page', $page->id), ['class' => 'text-white']);?>
                                <div class="bar mb-4"></div>
                                <?=Html::tag('h4', $page->text);?>
                                <a class="hex text-white" href="#doc" style="font-size:55px;"><i class="fa fa-angle-down"></i></a>
                            </div>
                        </div>
                    </div>
                    
                </div>
            </div>
        </div>	
    </div>
</section>

<section id="doc">
    <div class="container">
        <div class="row">
            <div class="col-md-10 offset-md-1 text-center">
                <?=Html::tag('h1', $page->header.Scripts::Edit('page', $page->id), ['class' => 'text-dark']);?>
                <div class="bar"></div>
                <div class="brblock"></div>
            </div>
            <div class="col-md-8 offset-md-2 lg-justify md-justify sm-justify xs-justify">
                <?=$page->fulltext.Html::tag('p', Scripts::Edit('page', $page->id), ['class' => 'text-center']);?>	
            </div>
        </div>	
    </div>
</section>

<?php if($history->fulltext == '') : else : ?>

<section class="bg-light bg-img-1" id="clients">
    <div style="padding: 100px 0;margin-bottom: -1px;">
        <div class="container">
            <div class="row">
                <div class="col-md-6 offset-md-3 lg-justify md-justify sm-justify xs-justify text-white">
                    <div class="card bg-default">
                        <div class="card-body bg-light text-center border-0">
                            <div class="col-lg-12 text-center">
                                <?=Html::tag('h2', $history->header, ['class' => 'text-dark']);?>
                                <div class="bar"></div>
                                <div class="brblock"></div>
                            </div>
                            <?=Html::tag('h3', $history->text, ['class' => 'text-dark']);?>                             
                            <div class="card-text text-secondary text-left">
                                <?=$history->fulltext.Html::tag('div', Scripts::Edit('page', $history->id), ['class' => 'text-center']);?>
                            </div>                            
                        </div>
                    </div>                    	
                </div>
            </div>
        </div>        
    </div>
</section>

<section class="bg-dark bg-img-1" style="background: url(https://verarealty.github.io/assets/images/join-hero.jpg);">
    <div style="background: rgba(0, 0, 0, 0.75);padding: 100px 0;margin-bottom: -1px;">
        <div class="container">
            <div class="row">
                <div class="col-md-12 text-center pt-5 pb-5">
                    <?=Html::img('https://verarealty.github.io/assets/images/Logo-white.png', ['alt' => 'logotype', 'style' => 'height: 54px;opacity: 0.4;']);?>
                    <a data-fancybox="" href="https://www.youtube.com/watch?v=gZWXmSM5Rfg" class="brblock p-5">
                        <button class="btn btn-default startplayeer">
                            <i class="fa fa-play playeer"></i>
                        </button> 
                    </a>
                    <?=Html::tag('h4', (Yii::$app->language == 'ru') ? 
                        'Видео Презентация Нашей компании' : 'Video Presentation Of Our Company', 
                        ['class' => 'text-white font-weight-light', 'style' => 'opacity: 0.4;'])
                    ;?>                   
                    <?=Html::tag('p', '<i class="ionicons ion-android-time"></i> 02:13');?>                   
                </div>
            </div>
        </div>
    </div>
</section>
<?php endif; ?>
*/ ?>

</div>
</div>
</section>