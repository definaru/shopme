<?php
    use yii\helpers\Html;
    //use yii\widgets\Breadcrumbs;
    use frontend\assets\AppBackAssets;
    use common\widgets\Alert;
    use budyaga_cust\users\models\Scripts;
    use budyaga_cust\users\models\Affise;
    $params = Yii::$app->user->identity;
    $result = Affise::getPartnersID($params->position); // Yii::$app->user->identity->position
    $news = Affise::getNews($result->partner->api_key); // News
    AppBackAssets::register($this);
?>
<?php $this->beginPage() ?>
    <!DOCTYPE html>
    <html class="loading" lang="<?= Yii::$app->language ?>" data-textdirection="ltr">
    <head>
        <meta charset="<?= Yii::$app->charset ?>">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
        <?php $this->registerCsrfMetaTags() ?>
        <title><?= Html::encode($this->title) ?></title>
        <?php $this->head() ?>
    </head>

    <?php if($params->position == '') : ?>
    <body class="vertical-layout 1-column navbar-floating footer-static pace-done menu-expanded vertical-menu-modern" data-open="click" data-menu="vertical-menu-modern" data-col="1-column" style="overflow: auto;">
    <?php else : ?>
    <body class="vertical-layout vertical-menu-modern 2-columns  navbar-floating footer-static" data-open="click" data-menu="vertical-menu-modern" data-col="2-columns">
    <?php endif;?>
        
        <?php $this->beginBody() ?>
                <?php if($params->position == '') : else : ?>
                <div class="main-menu menu-fixed menu-light menu-accordion menu-shadow" data-scroll-to-active="true">
                    <div class="navbar-header">
                        <ul class="nav navbar-nav flex-row">
                            <li class="nav-item mr-auto">
                                <a class="navbar-brand" href="/">
                                    <div class="brand-logo">
                                        <span style="position: relative;top: -7px;right: -8px;">S</span>
                                    </div>
                                    <h2 class="brand-text mb-0">
                                        <small style="position: relative;left: -8px;letter-spacing: -2px;font-weight: 900;"><?=Yii::$app->params['name'];?></small>
                                    </h2>
                                </a>
                            </li>
                            <li class="nav-item nav-toggle">
                                <a class="nav-link modern-nav-toggle pr-0" data-toggle="collapse">
                                    <i class="feather icon-x d-block d-xl-none font-medium-4 primary toggle-icon"></i>
                                    <i class="toggle-icon feather icon-disc font-medium-4 d-none d-xl-block collapse-toggle-icon primary" data-ticon="icon-disc"></i>
                                </a>
                            </li>
                        </ul>
                    </div>
                    <div class="shadow-bottom"></div>
                    <div class="main-menu-content">
                        <ul class="navigation navigation-main" id="main-menu-navigation" data-menu="menu-navigation">
                            <li class=" nav-item">
                                <a href="/dashboard">
                                    <i class="feather icon-home"></i>
                                    <span class="menu-title">Dashboard</span>
                                    <span class="badge badge badge-warning badge-pill float-right mr-2">2</span>
                                </a>
                            </li>
                            <li class="nav-item has-sub">
                                <a href="#">
                                    <i class="feather icon-trending-up"></i>
                                    <span class="menu-title" data-i18n="Data List">Statistics</span>
                                </a>
                                <ul class="menu-content">
                                    <li><a href="/stats/daily"><i class="feather icon-circle"></i> Daily</a></li>
                                    <li><a href="/stats/conversions"><i class="feather icon-circle"></i> Conversions</a></li>
                                    <li><a href="/stats/offers"><i class="feather icon-circle"></i> Offers</a></li>
                                    <li><a href="/stats/smartlinks"><i class="feather icon-circle"></i> SmartLinks</a></li>
                                    <li><a href="/stats/browsers"><i class="feather icon-circle"></i> Browsers</a></li>
                                    <li><a href="/stats/os"><i class="feather icon-circle"></i> OS</a></li>
                                    <li><a href="/stats/device"><i class="feather icon-circle"></i> Devices</a></li>
                                    <li><a href="/stats/country"><i class="feather icon-circle"></i> Countries</a></li>
                                    <li><a href="/stats/city"><i class="feather icon-circle"></i> Cities</a></li>
                                    <li><a href="/stats/subs?sub_name=sub"><i class="feather icon-circle"></i> SubId #1</a></li>
                                    <li><a href="/stats/subs?sub_name=sub2"><i class="feather icon-circle"></i> SubId #2</a></li>
                                    <li><a href="/stats/subs?sub_name=sub3"><i class="feather icon-circle"></i> SubId #3</a></li>
                                    <li><a href="/stats/subs?sub_name=sub4"><i class="feather icon-circle"></i> SubId #4</a></li>
                                    <li><a href="/stats/subs?sub_name=sub5"><i class="feather icon-circle"></i> SubId #5</a></li>
                                    <li><a href="/stats/goals"><i class="feather icon-circle"></i> Goals</a></li>
                                    <li><a href="/stats/referrals"><i class="feather icon-circle"></i> Referrals</a></li>
                                    <li><a href="/stats/mobile_carrier"><i class="feather icon-circle"></i> Mobile ISP</a></li>
                                </ul>
                            </li>
                            <li class="nav-item has-sub">
                                <a href="#">
                                    <i class="feather icon-triangle"></i>
                                    <span class="menu-title" data-i18n="Data List">Offers</span>
                                </a>
                                <ul class="menu-content">
                                    <li><a href="/offers"><i class="feather icon-circle"></i> All offers</a></li>
                                    <li><a href="/offer/list/available"><i class="feather icon-circle"></i> Available offers</a></li>
                                    <li><a href="/offer/list/live"><i class="feather icon-circle"></i> Live offers</a></li>
                                    <li><a href="/smartlinks"><i class="feather icon-circle"></i> SmartLinks</a></li>
                                </ul>
                            </li>
                            <li class="nav-item">
                                <a href="/payments">
                                    <i class="feather icon-credit-card"></i>
                                    <span class="menu-title" data-i18n="Data List">Payments</span>
                                </a>
                            </li>
                            <li class=" navigation-header"><span>Apps</span>
                            </li>

                            <li class="nav-item">
                                <a href="/calender">
                                    <i class="feather icon-calendar"></i>
                                    <span class="menu-title">Calender</span>
                                </a>
                            </li>
                            <li class=" navigation-header"><span>pages</span>
                            </li>
                            <li class="nav-item">
                                <a href="/profile">
                                    <i class="feather icon-user"></i>
                                    <span class="menu-title">Profile</span>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="/invoice">
                                    <i class="feather icon-file"></i>
                                    <span class="menu-title">Invoice</span>
                                </a>
                            </li>
                            <li class=" navigation-header">
                                <span>Support</span>
                            </li>
                            <li class="nav-item">
                                <a href="/support/chat">
                                    <i class="feather icon-message-square"></i>
                                    <span class="menu-title" data-i18n="Chat">Chat</span> 
                                    <span class="badge badge badge-pill badge-danger float-right">12</span>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="/support/faq">
                                    <i class="feather icon-help-circle"></i>
                                    <span class="menu-title">FAQ</span>
                                    <span class="badge badge badge-pill badge-danger float-right">30</span>
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
                <?php endif;?>
        
        
        
                <div class="app-content content">
                    <div class="content-overlay"></div>
                    <div class="header-navbar-shadow"></div>
                    
                    <?php if($params->position == '') : ?>
                    <nav class="header-navbar navbar-expand-lg navbar navbar-with-menu floating-nav navbar-light navbar-shadow">
                        <div class="navbar-wrapper">
                            <div class="navbar-container content">
                                <div class="navbar-collapse" id="navbar-mobile">
                                    <div class="mr-auto float-left bookmark-wrapper d-flex align-items-center">
                                        <ul class="nav navbar-nav nav-back">
                                            <li class="nav-item mobile-menu d-xl-none mr-auto">
                                                <a class="nav-link nav-menu-main hidden-xs font-small-3" href="/"><i class="feather icon-arrow-left"></i>Back</a>
                                            </li>
                                        </ul>
                                        <ul class="nav navbar-nav bookmark-icons">
                                            <li class="nav-item d-none d-lg-block"><a class="nav-link" href="/"><i class="ficon feather icon-file-text"></i></a></li>
                                            <li class="nav-item d-none d-lg-block"></li>
                                            <li class="nav-item d-none d-lg-block"></li>
                                        </ul>
                                        <ul class="nav navbar-nav">
                                            <li class="nav-item d-none d-lg-block"><a href="/" class="nav-link text-primary font-weight-bold">AffiliateHub PRO</a>
                                                <div class="bookmark-input search-input">
                                                    <div class="bookmark-input-icon"><i class="feather icon-search primary"></i></div>
                                                    <input class="form-control input" type="text" placeholder="General search..." tabindex="0">
                                                    <ul class="search-list"></ul>
                                                </div>
                                            </li>
                                        </ul>
                                    </div>
                                    <ul class="nav navbar-nav float-right">
                                        <li class="dropdown dropdown-language nav-item">
                                            <a class="dropdown-toggle nav-link" id="dropdown-flag" href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                <i class="flag-icon flag-icon-<?=(Yii::$app->language == 'en') ? 'us' : Yii::$app->language;?>"></i>
                                                <span class="selected-language"><?=Yii::$app->language;?></span>
                                            </a>
                                            <div class="dropdown-menu" aria-labelledby="dropdown-flag">
                                                <?=Scripts::getCurrentTabLand('en', 'English');?>
                                                <?=Scripts::getCurrentTabLand('de', 'Deutsch');?>
                                                <?=Scripts::getCurrentTabLand('it', 'Italian');?>
                                                <?=Scripts::getCurrentTabLand('es', 'Spanish');?>
                                            </div>
                                        </li>
                                        <li class="nav-item d-none d-lg-block"><a class="nav-link nav-link-expand nav-link pr-2"><i class="ficon feather icon-maximize"></i></a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </nav>
                    <?php else : ?>
                    <nav class="header-navbar navbar-expand-lg navbar navbar-with-menu floating-nav navbar-light navbar-shadow">
                        <div class="navbar-wrapper">
                            <div class="navbar-container content">
                                <div class="navbar-collapse" id="navbar-mobile">
                                    <div class="mr-auto float-left bookmark-wrapper d-flex align-items-center">
                                        <ul class="nav navbar-nav">
                                            <li class="nav-item mobile-menu d-xl-none mr-auto">
                                                <a class="nav-link nav-menu-main menu-toggle hidden-xs" href="#">
                                                    <i class="ficon feather icon-menu"></i>
                                                </a>
                                            </li>
                                        </ul>
                                        <ul class="nav navbar-nav bookmark-icons">
                                            <li class="nav-item d-none d-lg-block">
                                                <a class="nav-link" href="/support/chat" data-toggle="tooltip" data-placement="top" title="Chat">
                                                    <i class="ficon feather icon-message-square"></i>
                                                </a>
                                            </li>
                                            <li class="nav-item d-none d-lg-block">
                                                <a class="nav-link" href="/calender" data-toggle="tooltip" data-placement="top" title="Calendar">
                                                    <i class="ficon feather icon-calendar"></i>
                                                </a>
                                            </li>
                                        </ul>
                                        <ul class="nav navbar-nav">
                                            <li class="nav-item d-none d-lg-block"><a class="nav-link bookmark-star"><i class="ficon feather icon-star warning"></i></a>
                                                <div class="bookmark-input search-input">
                                                    <div class="bookmark-input-icon"><i class="feather icon-search primary"></i></div>
                                                    <input class="form-control input" type="text" placeholder="General search..." tabindex="0" data-search="template-list" />
                                                    <ul class="search-list"></ul>
                                                </div>
                                            </li>
                                        </ul>
                                    </div>
                                    <ul class="nav navbar-nav float-right">
                                        <li class="dropdown dropdown-language nav-item">
                                            <a class="dropdown-toggle nav-link" id="dropdown-flag" href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                <i class="flag-icon flag-icon-<?=(Yii::$app->language == 'en') ? 'us' : Yii::$app->language;?>"></i>
                                                <span class="selected-language"><?=Yii::$app->language;?></span>
                                            </a>
                                            <div class="dropdown-menu" aria-labelledby="dropdown-flag">
                                                <?=Scripts::getCurrentTabLand('en', 'English');?>
                                                <?=Scripts::getCurrentTabLand('de', 'Deutsch');?>
                                                <?=Scripts::getCurrentTabLand('it', 'Italian');?>
                                                <?=Scripts::getCurrentTabLand('es', 'Spanish');?>
<!-- <a class="dropdown-item" href="#" data-method="post" data-language="en"><i class="flag-icon flag-icon-us"></i> English</a> -->
                                            </div>
                                        </li>
                                        <li class="nav-item d-none d-lg-block"><a class="nav-link nav-link-expand"><i class="ficon feather icon-maximize"></i></a></li>
                                        <li class="nav-item nav-search"><a class="nav-link nav-link-search"><i class="ficon feather icon-search"></i></a>
                                            <div class="search-input">
                                                <div class="search-input-icon"><i class="feather icon-search primary"></i></div>
                                                <input class="input" type="text" placeholder="General search..." tabindex="-1" data-search="template-list" />
                                                <div class="search-input-close"><i class="feather icon-x"></i></div>
                                                <ul class="search-list"></ul>
                                            </div>
                                        </li>
                                        <li class="dropdown dropdown-notification nav-item">
                                            <a class="nav-link nav-link-label" href="#" data-toggle="dropdown">
                                                <i class="ficon feather icon-bell"></i>
                                                <span class="badge badge-pill badge-primary badge-up">
                                                    <?php //=($news['all_items'] == '') ? '' : $news['all_items'];?>0
                                                </span>
                                            </a>
                                            <ul class="dropdown-menu dropdown-menu-media dropdown-menu-right">
                                                <li class="dropdown-menu-header">
                                                    <div class="dropdown-header m-0 p-2">
                                                        <h3 class="white">Only <?php // =($news['all_items'] == '') ? '' : $news['all_items'];?> news</h3>
                                                    </div>
                                                </li>
                                                <li class="scrollable-container media-list">
                                                <?php /*
                                                <?php foreach ($news['items'] as $key => $moo) { ?>
                                                    <a class="d-flex flex-column" href="/new/<?=$key;?>.html" style="color:black;">
                                                        <div class="media d-flex align-items-start">
                                                            <div class="media-left">
                                                                <i class="feather icon-alert-circle font-medium-5 primary"></i>
                                                            </div>
                                                            <div class="media-body">
                                                                <h6 data-toggle="tooltip" title="<?=$moo['title'];?>" class="primary media-heading">
                                                                    <?=Scripts::strCuts($moo['title'], 20).'...';?>
                                                                </h6>
                                                                <div class="notification-text text-dark">
                                                                    <?=Scripts::strCuts(strip_tags($moo['small_desc']), 25).'...';?>
                                                                </div>
                                                            </div>
                                                            <small>
                                                                <time class="media-meta">
                                                                    <?=Html::tag('small', '<i class="feather icon-clock"></i> '.Scripts::formTime($moo['created_at']['sec']), ['class' => 'text-muted', 'style' => 'z-index:2;']);?>
                                                                </time>
                                                            </small>
                                                        </div>
                                                    </a>
                                                <?php } ?>
                                                */ ?>

                                                </li>
                                                <li class="dropdown-menu-footer"><a class="dropdown-item p-1 text-center" onclick="getStartLink('/news')">Read all notifications</a></li>
                                            </ul>
                                        </li>
                                        <li class="dropdown dropdown-user nav-item">
                                            <a class="dropdown-toggle nav-link dropdown-user-link" href="#" data-toggle="dropdown">
                                                <div class="user-nav d-sm-flex d-none">
                                                    <span class="user-name text-bold-600"><?=$result->partner->login;?></span>
                                                    <span class="user-status">Partner</span>
                                                </div>
                                                <span>
                                                    <?=Html::img(
                                                        //Scripts::getGravatarImage($result->partner->email), 
                                                        (!$params->photo) ? Scripts::site().'/img/img_avatar3.png' : $params->photo,
                                                        ['class' => 'round', 'alt' => 'avatar', 'height' => '40', 'width' => '40'])
                                                    ;?>
<!--                                                    <img class="round" src="/panel/images/portrait/small/avatar-s-11.png" alt="avatar" height="40" width="40"/>-->
                                                </span>
                                            </a>
                                            <div class="dropdown-menu dropdown-menu-right">
                                                <a class="dropdown-item" href="/profile"><i class="feather icon-user"></i> Edit Profile</a>
                                                <a class="dropdown-item" href="/settings"><i class="feather icon-settings"></i> Settings</a>
                                                <!--                                                -->
<!--                                                <a class="dropdown-item" href="app-email.html"><i class="feather icon-mail"></i> My Inbox</a>
                                                <a class="dropdown-item" href="app-todo.html"><i class="feather icon-check-square"></i> Task</a>
                                                <a class="dropdown-item" href="app-chat.html"><i class="feather icon-message-square"></i> Chats</a>-->
                                                <div class="dropdown-divider"></div>
                                                <?=Html::a('<i class="feather icon-power"></i> '.Yii::t('yii', 'Exit'), '/logout', ['data-method' => 'post', 'class'=> 'dropdown-item']);?>
                                            </div>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </nav>
                    <?php endif;?>
                    
                    <?php /*
                        <?= Breadcrumbs::widget([
                            'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
                        ]) ?>
                    */ ?>
                    <?= Alert::widget(), $content ?>
                </div>

                <div class="sidenav-overlay"></div>
                <div class="drag-target"></div>

                <footer class="footer footer-static footer-light">
                    <p class="clearfix blue-grey lighten-2 mb-0">
                        <span class="float-md-left d-block d-md-inline-block mt-25">
                            COPYRIGHT  &copy; <?=date('Y');?>
                            <a class="text-bold-800 grey darken-2" href="http://redmars.capital/" target="_blank">UP&GO COMPANY, LLC</a> All rights Reserved
                        </span>
                        <span class="float-md-right d-none d-md-block">
                            <small>
                                <a href="/doc/general_risk" data-pjax="0"><u>General Risk Disclosure</u></a> | 
                                <a href="/doc/privacy" data-pjax="0"><u>Terms &amp; Conditions</u></a>
                            </small>
                        </span>
                        <button class="btn btn-primary btn-icon scroll-top" type="button"><i class="feather icon-arrow-up"></i></button>
                    </p>
                </footer>

    <?php $this->endBody() ?>
                
<script>
    function getStartLink(url)
    {
        window.location.assign(url);
    };
    var userText=$("#copy-to-clipboard-input"),btnCopy=$("#btn-copy");btnCopy.on("click",function(){userText.select(),document.execCommand("copy")});
</script>
<script>
    $(document).ready(function() {
        
        $('#infocustom').click(function() {
            swal({     
                title: "Information", 
                text: "This but informations on click", 
                type: "info"
            });
        });
        
        $('#modernnavtoggle').click(function() {
            $('.navbar-header').removeClass('expanded');
            $('.menu-accordion').removeClass('expanded');
            
            localStorage.setItem('expanded', 'expanded');
        });
        
        $('#openexpanded').click(function() {
            //$('.navbar-header').addClass('expanded');
            //$('.menu-accordion').addClass('expanded');
            localStorage.removeItem('expanded');
        });

        
        if(localStorage.getItem('expanded') !== null) {
            $('.nav-link.modern-nav-toggle.pr-0').attr('id', 'openexpanded');
            $('.vertical-layout').removeClass('menu-expanded').addClass('menu-collapsed');
            $('.navbar-header').removeClass('expanded');
            $('.menu-accordion').removeClass('expanded');
        } else {
            $('.nav-link.modern-nav-toggle.pr-0').attr('id', 'modernnavtoggle');
            $('.vertical-layout').addClass('menu-expanded').removeClass('menu-collapsed');
            $('.navbar-header').addClass('expanded');
            $('.menu-accordion').addClass('expanded');            
        }
        
        $('#kpistrong').each(function(){
            $('table').addClass('table table-bordered table-hover').attr('border', 0);
            $( "tbody tr:first" ).attr('style', 'color: #7367f0;font-weight: bold;').addClass('table-active');
        });
        
        $('.log').click(function() {
            var ycc = $(this).attr('data-value');
            $.cookie("lang", ycc, { path: '/', expires: 365});
            console.log($(this).attr('data-value'));
        });
        
    });
</script>
    
</body>
</html>
<?php $this->endPage() ?>