<?php
    use yii\helpers\Html;
    use yii\grid\GridView;
    use budyaga_cust\users\models\Scripts;
    $this->title = 'Список пользователей';
    $this->params['breadcrumbs'][] = ['label' => Yii::t('users', 'USERS'), 'url' => ['index']];
    $this->params['breadcrumbs'][] = $this->title;
?>
<div class="user-index">
    <div class="box box-widget">
      <div class="box-header with-border">
        <h3 class="box-title"><span style="color:#d13a7a;"><i class="ionicons ion-ios-people"></i></span> Список пользователей</h3>

        <div class="box-tools pull-right">
            <div class="box-tools pull-right">
                <div class="btn-group">
                    <button type="button" class="btn btn-box-tool">
                        <?= GridView::widget([
                            'dataProvider' => $dataProvider,
                            'layout' => '{summary}',
                            'summary' => 'Найдено: {totalCount} | {page} из {pageCount}'
                        ]);?>
                    </button>
                    <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                    <?php /*
                    <button type="button" class="btn btn-box-tool" data-toggle="collapse" data-target="#searth"><i class="fa fa-search"></i></button>
                    <button type="button" class="btn btn-box-tool dropdown-toggle" data-toggle="dropdown"><?=Yii::t('users', 'SET')?></button>
                    <ul class="dropdown-menu" role="menu">
                        <li><?= Html::a(Yii::t('users', 'CREATE'), ['create'] ) ?></li>
                    </ul>
                    */ ?>
                </div>
            </div>
        </div>
      </div>
        <div class="box-body table-responsive no-padding">
            <div class="dataTables_wrapper form-inline dt-bootstrap">
            <?= GridView::widget([
                'dataProvider' => $dataProvider,
                'layout' => '{items}<div class="col-md-4 col-md-offset-4 center">{pager}</div>',
                'emptyTextOptions' => ['tag' => 'p', 'class' => 'text-center text-danger'],
                'emptyText' => 'По вашему запросу ничего не найдено',                
                //'filterModel' => $searchModel,
                'pager' => [       
                    'maxButtonCount' => 5,
                ], 
                'columns' => [
                    ['class' => 'yii\grid\SerialColumn', 'headerOptions' => ['width' => '40'],],


                    [
                        'attribute' => 'photo',
                        'headerOptions' => ['width' => '80'],
                        'format' => 'raw',
                        'content' => function($data){ return
                            ($data->photo === '' || $data->photo === NULL) ?  Yii::t('users', 'NOPHOTO') : '<img src="'.str_replace("img/avatar/", "/img/avatar/thumbs/", $data->photo).'" class="thumbnail no-margin no-padding" style="width:100%;"/>';
                        }                        
                    ],
                    'email:email',
                    //'status_pay',
                    //'api_key',
                    'position',
                    'nickname',
                    'lastname',
                    'balance',
                    //'nik',
                    'contact_tel',
                    //'contact_skype',
                    'contact_icq',
                    //'pay_wm',
                    //'pay_yad',
                    //'pay_qiwi',
                    //'pay_other',
                    //'act',

                    [
                        'attribute' => 'status',
                        'format' => 'raw',
                        'value' => function($data) {
                            return Scripts::access($data->status);
                        }
                    ], 
                    [
                        'attribute' => 'created_at',
                        'format' => 'raw',
                        'value' => function($data) {
                            return Scripts::formTimeChat($data->created_at);
                        }
                    ], 
                    [
                        'attribute' => 'updated_at',
                        'format' => 'raw',
                        'value' => function($data) {
                            return Scripts::formTimeChat($data->updated_at);
                        }
                    ],
                            
//                    [
//                        'class' => 'yii\grid\ActionColumn',
//                        'header' => Yii::t('users', 'SETTING'),
//                        'headerOptions' => ['width' => '80'],
//                        'template' => '{view} {update} {delete} {permissions}',
//                        'buttons' => [
//                            'view' => function ($url, $model, $key) {
//                                if (!Yii::$app->user->can('userView', ['user' => $model])) {
//                                    return '';
//                                }
//                                $options = [
//                                    'title' => Yii::t('yii', 'View'),
//                                    'aria-label' => Yii::t('yii', 'View'),
//                                    'data-pjax' => '0',
//                                    'data-toggle' => 'tooltip',
//                                    'title' => 'посмотреть',                                             
//                                ];
//                                return Html::a('<span class="glyphicon glyphicon-eye-open"></span>', $url, $options);
//                            },
//                            'update' => function ($url, $model, $key) {
//                                if (!Yii::$app->user->can('userUpdate', ['user' => $model])) {
//                                    return '';
//                                }
//                                $options = [
//                                    'title' => Yii::t('yii', 'Update'),
//                                    'aria-label' => Yii::t('yii', 'Update'),
//                                    'data-pjax' => '0',
//                                    'data-toggle' => 'tooltip',
//                                    'title' => 'редактировать',                                         
//                                ];
//                                return Html::a('<span class="glyphicon glyphicon-pencil"></span>', $url, $options);
//                            },
//                            'permissions' => function ($url, $model, $key) {
//                                if (!Yii::$app->user->can('userPermissions', ['user' => $model])) {
//                                    return '';
//                                }
//                                $options = [
//                                    'title' => Yii::t('users', 'PERMISSIONS'),
//                                    'aria-label' => Yii::t('users', 'PERMISSIONS'),
//                                    'data-pjax' => '0',
//                                    'data-toggle' => 'tooltip',
//                                    'title' => 'разрешения',                                        
//                                ];
//                                return Html::a('<span class="glyphicon glyphicon-cog"></span>', $url, $options);
//                            },
//                            'delete' => function($url, $model, $key) {
//                                if (!Yii::$app->user->can('userDelete', ['user' => $model])) {
//                                    return '';
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
//                        ]
//                    ],
                ],
        ]); ?>
            </div>
        </div>
        <?php /*
        <div class="box-footer">
            <?=(Yii::$app->user->can('userCreate')) ? Html::a(Yii::t('users', 'CREATE'), ['create'], ['class' => 'btn btn-success btn-flat pull-left']) : ''?>
        </div>
*/ ?>
    </div>
</div>