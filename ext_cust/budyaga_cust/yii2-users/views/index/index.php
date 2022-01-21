<?php
    use yii\helpers\Html;
    use yii\grid\GridView;
    $this->header = 'Менеджер по сайту';
    $this->title = 'Настройки';
    $this->params['breadcrumbs'][] = $this->header;
?>
<div class="box box-widget">
      <div class="box-header with-border">
        <h3 class="box-title"><i class="fa fa-globe" style="color:#d13a7a;"></i> <?=$this->header;?></h3>

        <div class="box-tools pull-right">

          <div class="btn-group">
              <p class="text-muted">Настройки <i class="fa fa-sliders"></i></p>
          </div>
        </div>
      </div>
        <div class="box-body table-responsive no-padding">
            <div class="dataTables_wrapper form-inline dt-bootstrap">

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'layout' => '{items}',
        //'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            // 'id',
            //'title',
            // 'apple_touth',
            // 'charset',
            // 'lang',
            // 'favicon',
            // 'robots',
            // 'keywords:ntext',
            // 'description:ntext',
            // 'logo',
            'company',
            //'slogan',
            'phone',
            // 'phone2',
            // 'adress',
            // 'adress2',
            'email:email',
            // 'map:ntext',
            // 'google_analitiks:ntext',
            // 'yandex_direct:ntext',

                    [
                        'class' => 'yii\grid\ActionColumn',
                        'header' => Yii::t('users', 'SETTING'),
                        'headerOptions' => ['width' => '80'],
                        //'template' => '{view} {update} {delete} {permissions}',
                        'template' => '{view} {update}',
                        'buttons' => [
                            'view' => function ($url, $model, $key) {
                                    if (!Yii::$app->user->can('userView', ['user' => $model])) {
                                        return '';
                                    }
                                    $options = [
                                        'title' => Yii::t('yii', 'View'),
                                        'aria-label' => Yii::t('yii', 'View'),
                                        'data-pjax' => '0',
                                        'data-toggle' => 'tooltip',
                                        'title' => 'посмотреть',                                             
                                    ];
                                    return Html::a('<span class="glyphicon glyphicon-eye-open"></span>', $url, $options);
                            },
                            'update' => function ($url, $model, $key) {
                                if (!Yii::$app->user->can('userUpdate', ['user' => $model])) {
                                    return '';
                                }
                                $options = [
                                    'title' => Yii::t('yii', 'Update'),
                                    'aria-label' => Yii::t('yii', 'Update'),
                                    'data-pjax' => '0',
                                    'data-toggle' => 'tooltip',
                                    'title' => 'редактировать',                                         
                                ];
                                return Html::a('<span class="glyphicon glyphicon-pencil"></span>', $url, $options);
                            },
                            'permissions' => function ($url, $model, $key) {
                                if (!Yii::$app->user->can('userPermissions', ['user' => $model])) {
                                    return '';
                                }
                                $options = [
                                    'title' => Yii::t('users', 'PERMISSIONS'),
                                    'aria-label' => Yii::t('users', 'PERMISSIONS'),
                                    'data-pjax' => '0',
                                    'data-toggle' => 'tooltip',
                                    'title' => 'разрешения',                                        
                                ];
                                return Html::a('<span class="glyphicon glyphicon-cog"></span>', $url, $options);
                            },
//                            'delete' => function($url, $model, $key) {
//                                if (!Yii::$app->user->can('userDelete', ['user' => $model])) {
//                                        return '';
//                                }
//                                $options = [
//                                    'title' => Yii::t('yii', 'Delete'),
//                                    'aria-label' => Yii::t('yii', 'Delete'),
//                                    'data-confirm' => Yii::t('yii', 'Вы уверены что хотите удалить данного пользователя?'),
//                                    'data-method' => 'post',
//                                    'data-pjax' => '0',
//                                    'data-toggle' => 'tooltip',
//                                    'title' => 'удалить?',
//                                ];
//                                return Html::a('<span class="glyphicon glyphicon-trash"></span>', $url, $options);
//                            }
                        ]
                    ],
        ],
    ]); ?>
            </div>
        </div>
    <div class="box-footer no-padding">
        <div class="callout callout-info" style="margin-bottom: 0px;">
            <h4>Информация</h4>
            <p><b><?=$this->title;?></b> - Данный раздел можно только редактировать, это важный компонент сайта, который удалять нельзя. Всё
            что касается описания и ключевых слов, контактная информация, интерактивная карта, настройка метатегов, всё это находится здесь.</p>
        </div>    
    </div>     
</div>