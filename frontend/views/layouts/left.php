<?php
    use yii\helpers\Html;
    use budyaga_cust\users\models\Scripts;
    $params = Yii::$app->user->identity;
?>
<aside class="main-sidebar fixed">
    <section class="sidebar">
        <div class="user-panel">
            <div class="pull-left image">
                <?=($params->photo == '' || $params->photo == NULL) ? 
                    Scripts::genderPhoto('ваше фото отсутствует', 'img-circle', 'width:100%;') : 
                    Html::img(str_replace("img/avatar/", "/img/avatar/thumbs/", $params->photo), ['alt' => 'User Image', 'class' => 'img-circle']);
                ?>
            </div>
            <div class="pull-left info">
                <?=Html::tag('p', $params->nickname);?>
                <?=Html::a('<i class="fa fa-circle text-success"></i> Online', '/defina');?>
            </div>
        </div>
        <?= Html::beginForm(['/user/search/index'], 'get', ['class' => 'sidebar-form'])?>
            <div class="input-group">
                <?= Html::input('text', 'MenudefinaSearch[name]', '', ['class' => 'form-control', 'placeholder' => 'Поиск...']) ?>
                <span class="input-group-btn">
                    <?= Html::submitButton('<i class="fa fa-search"></i>', ['type' =>'submit', 'id' => 'search-btn', 'class' => 'btn btn-flat']) ?>
                </span>
            </div>
        <?= Html::endForm() ?>
        <?= dmstr_cust\widgets\Menu::widget(
            [
                'options' => ['class' => 'sidebar-menu'],
                'items' => [
                    [
                        'label' => 'Пользователи',
                        'icon' => 'fa fa-user',
                        'url' => '#',
                        'options' => (Yii::$app->request->url == '/user/admin' || Yii::$app->request->url == '/user/rbac') ? ['class' => 'active'] : [],
                        'items' => [
                            ['label' => 'Пользователи', 'icon' => 'fa fa-male', 'url' => ['/user/admin'], 'visible' => Yii::$app->user->can('userView'), ],
                            ['label' => 'RBAC',         'icon' => 'fa fa-lock', 'url' => ['/user/rbac'],   'visible' => Yii::$app->user->can('rbacManage'), ],
                        ],
                        'visible' => ( Yii::$app->user->can('userView') || Yii::$app->user->can('rbacManage')),
                    ],
                    [
                        'label' => 'Страницы сайта', 
                        'icon' => 'fa fa-clipboard', 
                        'url' => ['/user/page'], 
                        'options' => (Yii::$app->request->url == '/user/page') ? ['class' => 'active'] : [],
                        'visible' => Yii::$app->user->can('rbacManage')
                    ],
                    [
                        'label' => 'Меню',
                        'icon' => 'fa fa-link',
                        'url' => '#',
                        'options' => (Yii::$app->request->url == '/user/menu' || Yii::$app->request->url == '/user/submenu') ? ['class' => 'active'] : [],
                        'items' => [
                            ['label' => 'Верхнее меню', 'icon' => 'fa fa-list', 'url' => ['/user/menu']],
                            //['label' => 'Боковое меню', 'icon' => 'fa fa-list', 'url' => ['/user/submenu']],
                        ],
                        'visible' => (Yii::$app->user->can('orderCreate')|Yii::$app->user->can('rbacManage')),
                    ],
                    [
                        'label' => 'Менеджер по сайту', 
                        'icon' => 'fa fa-globe', 
                        'options' => (Yii::$app->request->url == '/index') ? ['class' => 'active'] : [],
                        'url' => ['/index'], 
                        'visible' => Yii::$app->user->can('viewCatalog'), 
                    ],
                    [
                        'label' => 'Каталог', 
                        'icon' => 'fa fa-th-list', 
                        'url' => '#', 
                        'options' => (Yii::$app->request->url == '/user/catalog' || Yii::$app->request->url == '/user/category') ? ['class' => 'active'] : [],
                        'items' => [
                            ['label' => 'Каталог сайта', 'icon' => 'fa fa-list', 'url' => ['/user/catalog']],
                            ['label' => 'Категории', 'icon' => 'fa fa-list-ul', 'url' => ['/user/category']],
                            //['label' => 'Типы услуг', 'icon' => 'fa fa-list-ul', 'url' => Url::toRoute('/user/type'), ],
                        ],                        
                        'visible' => Yii::$app->user->can('viewCatalog'), 
                    ],                    
                    [
                        'label' => 'SEO оптимизация',
                        'icon' => 'fa fa-line-chart', 
                        'url' => '/user/seo', 
                        'options' => (Yii::$app->request->url == '/user/seo') ? ['class' => 'active'] : [], 
                        'visible' => Yii::$app->user->can('rbacManage')
                    ],
                    [
                        'label' => 'Помощь', 
                        'icon' => 'fa fa-question-circle', 
                        'options' => (Yii::$app->request->url == '/user/help') ? ['class' => 'active'] : [], 
                        'url' => ['/user/help'], 
                        'visible' => Yii::$app->user->can('rbacManage')
                    ],
                ],
            ]);?>
    </section>
</aside>