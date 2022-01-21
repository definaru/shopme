<?php
use yii\helpers\Html;
use yii\helpers\Url;
use budyaga_cust\users\models\Mail;
use budyaga_cust\users\models\Menudefina;
use budyaga_cust\users\models\Scripts;
use budyaga_cust\users\models\Defina;
$mailcount = Mail::find()->where(['pub' => 0])->count();
$mail = Mail::find()->where(['pub' => 0])->orderBy(['id' => SORT_DESC])->all();
$menus = Menudefina::find()->where(['access' => 0])->all();
$params = Yii::$app->user->identity;
$user_atr = Yii::$app->user->identity->attributes;
//имя
$user_name = $user_atr['nickname'];
if ($user_name == '') $user_name = $user_atr['email'];
//статус
if (Yii::$app->user->can('partner')) {
    if ($user_atr['status_pay'] == 1) {
        $status_account = ($params->position !== '') ? $params->position : 'Стандартный&nbsp;партнёр';
    } else if ($user_atr['status_pay'] == 2) {
        $status_account = 'Золотой&nbsp;партнёр';
    } else {
        $status_account = 'Свой&nbsp;партнёр';
    }
} else if (Yii::$app->user->can('administrator')) {
    $status_account = 'Администратор';
} else if (Yii::$app->user->can('loader')) {
    $status_account = 'Менеджер Склада';
} else if (Yii::$app->user->can('sellerConsultant')) {
    $status_account = 'Продавец Консультант';  
}
$cookies = Yii::$app->request->cookies;
if (isset($cookies['sidebar-collapse'])) {
    $lan = $cookies['sidebar-collapse']->value;
}

//формируем верхнее меню
$top_menu = Array(
    Array(
        'url' => '/',
        'tar' => 'target="_blank"',
        'anchor' => '<i class="ionicons ion-android-share"></i> Перейти на сайт',
    ),
    Array(
        'url' => '/user/index/update?id=1',
        'tar' => '',
        'anchor' => '<i class="ionicons ion-android-options"></i> Настройки',
    ),
    Array(
        'url' => '/code',
        'tar' => '',
        'anchor' => '<i class="ionicons ion-fork-repo"></i> Редактор кода',
    ),
);
?>

<header class="main-header fixed">

    <?=Html::a('
        <span class="logo-mini">
            <img src="/favicon/logo.svg" style="width:40px;padding:5px;" alt="logotyp"/>
        </span>
        <span class="logo-lg">
            <img src="/favicon/logo.svg" style="width: 40px;float: left;margin-top: 5px;" alt="logotyp"/> '.Yii::$app->site->name.'
        </span>', 
        '/defina', ['class' => 'logo']); ?>

    <nav class="navbar navbar-static-top" role="navigation">
        <a href="#" id="new_sidebar_collapse" class="sidebar-toggle" data-toggle="offcanvas" role="button" onclick="sidebar_switch()" sidebar-collapse="<?=($_COOKIE['sidebar-collapse'] == 1) ? 1 : 0;?>">
            <span class="sr-only">Toggle navigation</span>
        </a>

        <div class="navbar-custom-menu">
            <ul class="nav navbar-nav">
                <li class="dropdown messages-menu">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                        <i class="fa fa-envelope-o"></i>
                        <?=($mailcount == 0) ? '' : Html::tag('span', $mailcount, ['class' => 'label label-success']);?>
                    </a>
                    <ul class="dropdown-menu">
                        <?php if ($mailcount == 0) : echo '<li class="user-header-cust text-center" style="color: #000;padding: 10px;">новых писем нет</li>'; else : ?>
                        <li class="user-header user-header-cust text-center" style="color: #fff;padding: 10px;">
                            <small>У вас <?=Scripts::sklonen( $mailcount, 'сообщение', 'сообщения', 'сообщений');?></small>
                        </li>                        
                        <li>
                            <ul class="menu">
                                <?php foreach ($mail as $model) { ?>
                                <li>
                                    <a href="/user/mail/view?id=<?=$model->id;?>">
                                        <div class="pull-left">
                                            <img src="/img/male.png" class="img-circle" alt="<?=$model->name;?>"/>
                                        </div>
                                        <h4>
                                            <?=$model->name;?>
                                            <small><i class="fa fa-clock-o"></i> <?=Yii::$app->formatter->asDate($model->date, 'php: H:i')?></small>
                                        </h4>
                                        <p><?=$model->body;?></p>
                                    </a>
                                </li>
                                <?php } ?>
                            </ul>
                        </li>
                        <li class="footer"><a href="/mail">Все сообщения</a></li>
                        <?php endif ; ?>
                    </ul>
                </li>
                <li class="dropdown notifications-menu">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                        <i class="fa fa-object-group"></i>
                    </a>
                    <ul class="dropdown-menu">
                        <li class="user-header user-header-cust text-center" style="color: #fff;padding: 10px;">Редактор сайта</li>
                        <li>
                            <ul class="menu">
                                <?php foreach ($menus as $model) { ?>
                                    <?=Html::tag('li', Html::a('<span style="color:#d13a7a;">'.$model->icon.'</span> '.$model->name, $model->href));?>
                                <?php } ?>
                            </ul>
                        </li>
                        <?=Html::tag('li', Html::a('<i class="ionicons ion-edit"></i> Редактировать настройки', '/user/index/update?id=1'), ['class' => 'footer']);?>
                    </ul>
                </li>
                <li class="dropdown notifications-menu">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                        <i class="fa fa-bell-o"></i>
                        <?=(Scripts::countNotify() == 0) ? '' : Html::tag('span', Scripts::countNotify(), ['class' => 'label label-danger']);?>
                    </a>
                    <ul class="dropdown-menu">
                        <?php if(Scripts::countNotify() == 0) : ?>
                            <li class="user-header-cust text-center" style="color: #000;padding: 10px;">Оповещений нет</li>
                        <?php else : ?>
                            <li class="user-header user-header-cust text-center" style="color: #fff;padding: 10px;">Оповещения</li>
                            <li>
                                <ul class="menu">
                                    <?=Scripts::noFile().Scripts::noPhotoUser().Scripts::alertEmailDefault();?>                               
                                </ul>
                            </li>
                            <?=Html::tag('li', Html::a('Смотреть все', '#'), ['class' => 'footer']);?>                            
                        <?php endif ; ?>
                    </ul>
                </li>
<?php /*
                <li class="dropdown tasks-menu">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                        <i class="fa fa-flag-o"></i>
                        <span class="label label-danger">9</span>
                    </a>
                    <ul class="dropdown-menu">
                        <li class="header">You have 9 tasks</li>
                        <li>
                            <ul class="menu">
                                <li>
                                    <a href="#">
                                        <h3>
                                            Design some buttons
                                            <small class="pull-right">20%</small>
                                        </h3>
                                        <div class="progress xs">
                                            <div class="progress-bar progress-bar-aqua" style="width: 20%"
                                                 role="progressbar" aria-valuenow="20" aria-valuemin="0"
                                                 aria-valuemax="100">
                                                <span class="sr-only">20% Complete</span>
                                            </div>
                                        </div>
                                    </a>
                                </li>
                                <li>
                                    <a href="#">
                                        <h3>
                                            Create a nice theme
                                            <small class="pull-right">40%</small>
                                        </h3>
                                        <div class="progress xs">
                                            <div class="progress-bar progress-bar-green" style="width: 40%"
                                                 role="progressbar" aria-valuenow="20" aria-valuemin="0"
                                                 aria-valuemax="100">
                                                <span class="sr-only">40% Complete</span>
                                            </div>
                                        </div>
                                    </a>
                                </li>
                                <li>
                                    <a href="#">
                                        <h3>
                                            Some task I need to do
                                            <small class="pull-right">60%</small>
                                        </h3>
                                        <div class="progress xs">
                                            <div class="progress-bar progress-bar-red" style="width: 60%"
                                                 role="progressbar" aria-valuenow="20" aria-valuemin="0"
                                                 aria-valuemax="100">
                                                <span class="sr-only">60% Complete</span>
                                            </div>
                                        </div>
                                    </a>
                                </li>
                                <li>
                                    <a href="#">
                                        <h3>
                                            Make beautiful transitions
                                            <small class="pull-right">80%</small>
                                        </h3>
                                        <div class="progress xs">
                                            <div class="progress-bar progress-bar-yellow" style="width: 80%"
                                                 role="progressbar" aria-valuenow="20" aria-valuemin="0"
                                                 aria-valuemax="100">
                                                <span class="sr-only">80% Complete</span>
                                            </div>
                                        </div>
                                    </a>
                                </li>
                            </ul>
                        </li>
                        <li class="footer">
                            <a href="#">View all tasks</a>
                        </li>
                    </ul>
                </li>
*/ ?>                

		
                <?php foreach($top_menu as $item) { ?>
                    <li class="dropdown hidden-xs hidden-sm">
                        <a href="<?=$item['url']?>" <?=$item['tar']?>>
                            <span><?=$item['anchor']?></span>
                        </a>
                    </li>
                <?php } ?>
				
				
                <?php if (Yii::$app->user->can('partner')) { ?>
                <li class="dropdown user user-menu">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                        <span class="visible-xs visible-sm"><?=(Defina::CurrentWallet == '') ? '<i class="fa fa-rub"></i>' : Defina::CurrentWallet;?></span>
                        <span class="hidden-xs hidden-sm">
                            Баланс: <?=number_format($params->balance);?> <?=(Defina::CurrentWallet == '') ? '<i class="fa fa-rub"></i>' : Defina::CurrentWallet;?>
                        </span>
                    </a>
                    <ul class="dropdown-menu">
                        <li class="user-header-cust text-center" style="color: #fff;padding: 10px;">
                            <a href="#"><i class="fa fa-usd"></i> Пополнить </a>
                        </li>                    
                    </ul>
                </li>
                <?php }; ?>
				
				
                <li class="dropdown notifications-menu visible-xs visible-sm">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                        <span><i class="fa fa-book"></i></span>
                    </a>
                    <ul class="dropdown-menu dropdown-menu-info">
                        <li>
                            <ul class="menu">
                                <?php foreach($top_menu as $item) { ?>
                                    <li>
                                        <a href="<?=$item['url']?>" <?=$item['tar']?>>
                                            <span><?=$item['anchor']?></span>
                                        </a>
                                    </li>
                                <?php } ?>
                            </ul>
                        </li>
                    </ul>
                </li>
                
                
                <li class="dropdown user user-menu">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                        <span class="visible-xs visible-sm"><i class="fa fa-user"></i></span>
                        <span class="hidden-xs hidden-sm"><i class="ionicons ion-android-person"></i> <?=$user_name?></span>
                    </a>
                    <?php if (Yii::$app->user->can('partner')) { ?>
                    <ul class="dropdown-menu dropdown-menu-user">
                        <li class="user-header user-header-cust">
                            <center>
                                <?=($params->photo == '' || $params->photo == NULL) ? 
                                    Scripts::genderPhoto('ваше фото отсутствует', 'img-circle', 'width:25%;') : 
                                    Html::img(str_replace("img/avatar/", "/img/avatar/thumbs/", $params->photo), ['style' => 'width:25%;', 'alt' => 'User Image', 'class' => 'img-circle']);
                                ?>
                            </center>
                            <h3 style="color:#fff;margin: 0;"><?=$params->nickname.' '.$params->lastname;?></h3>
                            <small class="text-right text-gray" style="margin: 0;"><?=$status_account?></small>
                        </li>
                        <!-- Menu Body -->
                        <li class="user-body">
                            <div class="pull-left">
                                <?= Html::a(
                                    'Настройки цен и магаз.',
                                    Url::toRoute('/pricepartner/index'),
                                    ['data-method' => 'post', 'class' => '']
                                ) ?>
                            </div>
                            <div class="pull-right">
                                <?= Html::a(
                                    'Выплаты',
                                    Url::toRoute('/payments'),
                                    ['data-method' => 'post', 'class' => '']
                                ) ?>
                            </div>
                        </li>
                        <!-- Menu Footer-->
                        <li class="user-footer">
                            <div class="pull-left">
                                <?= Html::a(
                                    'Профиль и реквизиты',
                                    Url::toRoute('/user/user/profile'),
                                    ['data-method' => 'post', 'class' => 'btn btn-default btn-flat']
                                ) ?>
                            </div>
                            <div class="pull-right">
                                <?= Html::a(
                                    'Выход',
                                    Url::toRoute('/user/user/logout'),
                                    ['data-method' => 'post', 'class' => 'btn btn-default btn-flat']
                                ) ?>
                            </div>
                        </li>
                    </ul>
                    <?php } else { ?>
                    <ul class="dropdown-menu dropdown-menu-user">
                        <li class="user-header user-header-cust">
                            <center>
                                <?=($params->photo == '' || $params->photo == NULL) ? 
                                    Scripts::genderPhoto('ваше фото отсутствует', 'img-circle', 'width:25%;') : 
                                    Html::img(str_replace("img/avatar/", "/img/avatar/thumbs/", $params->photo), ['style' => 'width:25%;', 'alt' => 'User Image', 'class' => 'img-circle']);
                                ?>
                            </center>
                            <h3 style="color:#fff;margin: 0;"><?=$status_account?></h3>
                            <small class="text-right text-gray" style="margin: 0;">Сегодня: <?=Scripts::moontag(date('d F Y | H:i'));?></small>
                        </li>
                        <li class="user-footer">
                            <div class="pull-left">
                                <?=Html::a('<i class="ionicons ion-edit"></i>', '/user/admin/update?id='.$params->id,
                                    [
                                        'data-toggle' => 'tooltip', 
                                        'title' => 'редактировать профиль',
                                        'class' => 'btn btn-default btn-flat'
                                    ]   
                                )?>                                
                                <?=Html::a('&#9993; сообщения', '/mail',
                                    [
                                        'data-toggle' => 'tooltip', 
                                        'title' => 'прочесть входящие',
                                        'class' => 'btn btn-default btn-flat'
                                    ]   
                                )?>                                
                            </div>
                            <div class="pull-right">
                                <?= Html::a('<i class="fa fa-power-off"></i> Выход',
                                    Url::toRoute('/user/user/logout'),
                                    ['data-method' => 'post', 'class' => 'btn btn-default btn-flat']
                                ) ?>                                
                            </div>
                        </li>
                    </ul>
                    <?php } ?>
                </li>
                <li>
                    <a href="#" data-toggle="control-sidebar"><i class="fa fa-gears"></i></a>
                </li>                 
                <?php /*  */ ?>
            </ul>
        </div>
    </nav>
</header>