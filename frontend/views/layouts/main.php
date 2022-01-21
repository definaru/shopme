<?php // шаблон страницы
    use yii\helpers\Html;
    use frontend\assets\AppFrontAssets;
    use common\widgets\Alert;
    //use yii\widgets\Menu;
    use budyaga_cust\users\models\Scripts;
    //use budyaga_cust\users\models\Defina;
    AppFrontAssets::register($this);
    //use budyaga_cust\users\models\Menu;
    //$link = Menu::find()->orderBy(['sort' => SORT_ASC])->limit(10)->all();
    $index = Scripts::getViewHeader();
    $adress = (Yii::$app->language == 'ru') ? $index->adress : $index->adress2;
    $params = Yii::$app->user->identity;
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?=Yii::$app->params['lang'];?>">
<head>
<meta charset="<?=Yii::$app->params['charset'];?>">
<meta name="viewport" content="<?=Yii::$app->params['viewport'];?>">
<meta http-equiv="X-UA-Compatible" content="<?=Yii::$app->params['compatible'];?>">
<meta name="author" content="CMS Defina">
<meta name="robots" content="<?=Yii::$app->params['robots'];?>">
<?=$index->meta;?>
<?= Html::csrfMetaTags() ?>
<title><?= Html::encode($this->title) ?></title>
<?=Scripts::csrfIconTags($index);?>
<?php $this->head() ?>

<?=$index->google_analitiks;?>

</head>
<body itemscope itemtype="http://schema.org/Organization">
<?php $this->beginBody() ?>
<?php /*
    <?php if (
        (Yii::$app->controller->action->id === 'error') ||
        (Yii::$app->controller->action->id === 'login') ||
        (Yii::$app->controller->action->id === 'signup') ||
        (Yii::$app->controller->action->id === 'reset-password') ||
        (Yii::$app->controller->action->id === 'request-password-reset')
    ) : ?>    
    <?php else :?> 
<section class="intro-area">
    <div class="">
            
        <div class="intro-area-11">

            <section class="header header--8">
                <div class="menu_area menu8">
                    
                    <nav id="navbar" class="navbar navbar-expand-lg navbar-dark bg-trans fixed-top pt-4 pb-4">
                        <div class="container">
                            <a class="navbar-brand order-sm-1 order-1" href="/">
                                <?=Scripts::viewLogo('/task/img/logo.svg', 'logo');?>
                            </a>
                            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent22" aria-controls="navbarSupportedContent22" aria-expanded="false" aria-label="Toggle navigation">
                                <span class="la la-bars"></span>
                            </button>

                            <div class="collapse navbar-collapse order-md-1 justify-content-end" id="navbarSupportedContent22">
                                <div class="m-right-15">
                                    <ul class="navbar-nav">
                                        <li class="nav-item">
                                            <a class="nav-link" href="/about"><?=Yii::t('yii', 'About us')?></a>
                                        </li>                                        
                                        <li class="nav-item">
                                            <a class="nav-link" href="/template"><?=Yii::t('yii', 'Template')?></a>
                                        </li>                                        
                                        <li class="nav-item">
                                            <a class="nav-link" href="/service"><?=Yii::t('yii', 'Services')?></a>
                                        </li>                                        
                                        <li class="nav-item">
                                            <a class="nav-link" href="/partners"><?=Yii::t('yii', 'For Partners')?></a>
                                        </li>                                        
                                        <li class="nav-item">
                                            <a class="nav-link" href="/contact"><?=Yii::t('yii', 'Contacts')?></a>
                                        </li>
                                        <?php if(Yii::$app->user->isGuest) : else : ?>
                                        <li class="dropdown">
                                            <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown">
                                                <i class="ionicons ion-android-person"></i> <?=$params->nickname;?>
                                            </a>
                                            <div class="dropdown-menu dropdown-menu-right" style="margin-top: 38px;min-width: 138px;">
                                                <ul>
                                                    <li><?=Html::a('<i class="ionicons ion-cube text-dark"></i> &#160;'.Yii::t('yii', 'Dashboard'), '/dashboard', ['class'=> 'dropdown-item']);?></li>
                                                    <li><?=Html::a('<i class="ionicons ion-power text-dark"></i> &#160;'.Yii::t('yii', 'Exit'), '/logout', ['data-method' => 'post', 'class'=> 'dropdown-item']);?></li>
                                                </ul>                                                
                                            </div>
                                        </li>
                                        <?php endif;?>
                                        <li class="dropdown">
                                            <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown">
                                                <?=Html::img('/panel/fonts/flag-icon-css/flags/4x3/'.Yii::$app->language.'.svg', ['style' => 'width:20px;border: 1px solid #333;']);?>
                                            </a>
                                            <div class="dropdown-menu dropdown-menu-right" style="margin-top: 38px;min-width: 138px;">
                                                <ul>
                                                    <?=Scripts::getCurrentTabLand('ru', '&#160; Русский');?>
                                                    <?=Scripts::getCurrentTabLand('en', '&#160; English');?>
                                                </ul>
                                            </div>
                                        </li>
                                    </ul>
                                </div>
                            </div>

                        <div class="nav_right_content m-left-30 d-flex align-items-center order-2 order-sm-2">
                            <div class="nav_right_module cart_module">
                                <div class="cart__icon">
                                    <span class="la la-shopping-cart"></span>
                                    <span class="cart_count">2</span>
                                </div>
                                <div class="cart__items shadow-lg-2">
                                    <div class="items">
                                        <div class="item_thumb">
                                            <img src="/img/ci1.jpg" alt="hukka miyan">
                                        </div>
                                        <div class="item_info">
                                            <a href="single-product.html">Business Marketing Presentation</a>
                                            <span class="color-primary">$250.00</span>
                                        </div>
                                        <a href="#" class="item_remove">
                                            <span class="la la-close"></span></a>
                                    </div>
                                    <div class="items">
                                        <div class="item_thumb">
                                            <img src="/img/ci2.jpg" alt="hukka miyan">
                                        </div>
                                        <div class="item_info">
                                            <a href="single-product.html">Business Marketing Presentation</a>
                                            <span class="color-primary">$75.00</span>
                                        </div>
                                        <a href="#" class="item_remove">
                                            <span class="la la-close"></span></a>
                                    </div>
                                    <div class="cart_info text-md-right">
                                        <p>Subtotal:
                                            <span class="color-primary">$325.00</span></p>
                                        <a class="btn btn-outline-secondary btn-sm" href="shopping-cart.html">View Cart</a>
                                        <a class="btn btn-primary btn-sm" href="checkout.html">Checkout</a>
                                    </div>
                                </div>
                            </div>
                            <div class="nav_right_module search_module">
                                <span class="la la-search search_trigger"></span>

                                <div class="search_area">
                                    <form action="/">
                                        <div class="input-group input-group-light">
                                            <span class="icon-left" id="basic-addon78">
                                                <i class="la la-search"></i>
                                            </span>
                                            <input type="text" class="form-control search_field" placeholder="Type words and hit enter...">
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>

                        </div>
                    </nav>
                    
                </div>
            </section>
    <?php endif; ?> 
*/ ?>
    <?=Scripts::setting(), Alert::widget(), $content ?>        

<?php /*
<?php if (Yii::$app->controller->action->id === 'error') : else : ?>   
    <footer class="footer5 d-print-none">
        <div class="footer__big">
            <div class="container">
                <div class="row">
                    <div class="col-lg-3 col-md-6 col-sm-6">
                        <div class="widget text_widget">
                            <?=Scripts::viewLogo('/task/img/logo.svg', 'footer_logo');?>
                            <p>
                                <?= Scripts::phone('<i class="ionicons ion-android-call"></i> '.Yii::$app->params['phoneRu'], ['class' =>'tel']);?>
                                <?= Scripts::phone('<i class="ionicons ion-android-call"></i> '.Yii::$app->params['phoneIt'], ['class' =>'tel']);?>
                                <?= Html::a('<i class="ionicons ion-email"></i> '.Yii::$app->params['supportEmail'], '/contact#send', ['class' =>'tel']);?>
                            </p>
                        </div>
                    </div>

                    <div class="col-lg-3 col-md-6 col-sm-6 d-flex justify-content-lg-center">
                        <div class="widget widget--links">
                            <?=Html::tag('h4', Yii::t('yii', 'Company'), ['class' => 'widget__title2'])?>
                            <ul class="links">
                                <li><a href="/about"><?=Yii::t('yii', 'About us')?></a></li>
                                <li><a href="/contact"><?=Yii::t('yii', 'Contacts')?></a></li>
                                <li><a href="/career"><?=Yii::t('yii', 'Career')?></a></li>
                                <li><a href="/doc/police_config"><?=Yii::t('yii', 'Privacy Policy');?></a></li>
                            </ul>
                        </div>
                    </div>

                    <div class="col-lg-3 col-md-6 col-sm-6 d-flex justify-content-lg-center">
                        <div class="widget widget--links">
                            <?=Html::tag('h4', Yii::t('yii', 'Services'), ['class' => 'widget__title2'])?>
                            <ul class="links">
                                <?=Html::tag('li', Html::a(Yii::t('yii', 'Development'), '/service-web_developer.html'))?>
                                <?=Html::tag('li', Html::a(Yii::t('yii', 'Promotion'), '/service-promotion.html'))?>
                                <?=Html::tag('li', Html::a(Yii::t('yii', 'Design'), '/service-ux_design.html'))?>
                                <?=Html::tag('li', Html::a(Yii::t('yii', 'Accompany'), '/service-seopt.html'))?>
                            </ul>
                        </div>
                    </div>

                    <div class="col-lg-3 col-md-6 col-sm-6">
                        <div class="widget widget--links">
                            <?=Html::tag('h4', Yii::t('yii', 'Useful Links'), ['class' => 'widget__title2'])?>
                            <ul class="links">
                                <?=Html::tag('li', Html::a(Yii::t('yii', 'Support'), '#!'))?>
                                <?=Html::tag('li', Html::a(Yii::t('yii', 'FAQ'), '/faq'))?>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
        <div class="footer__bottom">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="footer__bottom-content">
                            <p>
                                &copy; <?=date('Y').' '.Yii::$app->params['name']?>. 
                                All rights reserved. 
                                Created by 
                                <?=Html::a('Defina LLC', 'https://defina.ru', ['target' => '_blank'])?>
                                <div class="social-basic ">
                                    <ul class="d-flex justify-content-end ">
                                        <?php Scripts::getFolliw();?>
                                    </ul>
                                </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </footer>

<div class="go_top">
    <span class="la la-angle-up"></span>
</div>  
<?php endif ; ?>



<?php $this->endBody()?>
            
<script>
    function getStartLink(url)
    {
        window.location.assign(url);
    };
    
    var swiper = new Swiper('.swiper-container', {
        slidesPerView: 3,
        spaceBetween: 0,
        loop: true,
        autoplay: true,
        speed: 800,
        breakpoints: {
            320: {
              slidesPerView: 1,
              spaceBetween: 2
            },
            480: {
              slidesPerView: 1,
              spaceBetween: 3
            },
            640: {
                slidesPerView: 3,
                spaceBetween: 4
            },
            1920: {
                slidesPerView: 3,
                spaceBetween: 4
            }
        },
        navigation: {
            nextEl: '.swiper-button-next',
            prevEl: '.swiper-button-prev',
        },
        //pagination: {
        //    el: '.swiper-pagination',
        //    clickable: true,
        //},
    });
    

    
    $(document).ready(function() {
        
        $("#buy").click(function(){
            $("#OrderSite").modal({backdrop: "static"});
        });
        
        $('#accordion').each(function(){
            $('div.card div.collapse:first').addClass('show');
        });
        
        $('#data-service-column').each(function(){
            $('#orders:first').addClass('active');
            $('div.col-md-4.pt-4:last').addClass('r__shape');
        });
        
        $('#data-creative-colomn').each(function(){
            $('.card-body.inner:first').addClass('active');
        });
        
        $('[data-toggle="tooltip"]').tooltip();
        
        window.onscroll = function() {scrollFunction();};

        function scrollFunction() {
            if (document.body.scrollTop > 57 || document.documentElement.scrollTop > 57) 
            {
                $('#tel').addClass('text-dark');
                $('#toggler').addClass('text-dark');
                $('#navbar').addClass('bg-white navbar-light pt-2 pb-2');
                $('#navbar').removeClass('navbar-dark pt-4 pb-4');
            } else {
                $('#navbar').addClass('navbar-dark pt-4 pb-4');
                $('#navbar').removeClass('bg-white navbar-light pt-2 pb-2');
                $('#tel').removeClass('text-dark');
                $('#toggler').removeClass('text-dark');
            }
        }

        $('#toggler').click(function() {
            $('#navbar').toggleClass("bg-dark");
            $('#navbar').toggleClass("bg-trans");
        }); 
        
        
        $('[data-fancybox = "site"]').fancybox({
            protect: true,
            buttons: [
                'fullScreen',
                'close'
            ] 
         });
        
        
        $('[data-fancybox = "gallery"]').fancybox({
        protect: true,
          slideClass: 'watermark',
          //toolbar: false,
          //smallBtn: true,
            buttons: [
                'zoom',
                'thumbs',
                'fullScreen',
                'close'
            ] 
         });
        // new Image().src = "/img/GJbkSPU.png"; 
        
        $('form#zakaz').on('change keydown paste input', function(){
            // alert('work');
            localStorage.setItem('header', $('select#zakaz-header option').filter(":selected").val());
            localStorage.setItem('fio', $('input[name="Zakaz[fio]"]').val());
            localStorage.setItem('phone', $('input[name="Zakaz[phone]"]').val());
            localStorage.setItem('email', $('input[name="Zakaz[email]"]').val());
        });
        if(localStorage.getItem('fio') !== null) {
            $('input[name="Zakaz[fio]"]').val(localStorage.getItem('fio'));
//            $('#zakaz-b_day :selected').text(localStorage.getItem('b_day')).val(localStorage.getItem('b_day'));
//            $('#zakaz-b_mon :selected').text(localStorage.getItem('b_mon')).val(localStorage.getItem('b_mon'));
//            $('#zakaz-b_year :selected').text(localStorage.getItem('b_year')).val(localStorage.getItem('b_year'));
            $('#zakaz-header :selected').text(localStorage.getItem('header')).val(localStorage.getItem('header'));
            $('input[name="Zakaz[phone]"]').val(localStorage.getItem('phone'));
            $('input[name="Zakaz[email]"]').val(localStorage.getItem('email')); 
            
        }
        
        
        $('#brony').click(function(){
            localStorage.clear();
        });

    });
</script>
<script>
			imagesLoaded( document.querySelectorAll('img'), () => {
				document.body.classList.remove('loading');
			});

			Array.from(document.querySelectorAll('.grid__item-img')).forEach((el) => {
				const imgs = Array.from(el.querySelectorAll('img'));
				new hoverEffect({
					parent: el,
					intensity: el.dataset.intensity || undefined,
					speedIn: el.dataset.speedin || undefined,
					speedOut: el.dataset.speedout || undefined,
					easing: el.dataset.easing || undefined,
					hover: el.dataset.hover || undefined,
					image1: imgs[0].getAttribute('src'),
					image2: imgs[1].getAttribute('src'),
					displacementImage: el.dataset.displacement
				});
			});
		</script>
            
<?=($index->block == 0) ? '' : Html::script('', ['src' => '/css3/js/defina.ultra.min.js']);?>

<?=$index->yandex_direct;?>  
*/ ?>
      

    </body>
</html>
<?php $this->endPage() ?>