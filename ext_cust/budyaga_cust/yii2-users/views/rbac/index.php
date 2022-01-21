<?php

use yii\helpers\Url;
use yii\grid\GridView;
use yii\rbac\Item;
use yii\helpers\Html;
$this->registerLinkTag(['rel' => 'shortcut icon','type' => 'image/x-icon','href' => '/favicon/favicon.png',]);
$this->title = 'RBAC';
$this->params['breadcrumbs'][] = $this->title;
?>

<div class="rbac_index">



    <div class="row">
        <div class="col-md-6">
            <div class="box">
                <div class="box-header with-border">
                    <h3 class="box-title"><?= Yii::t('users', 'ROLES')?></h3>
                    <div class="box-tools pull-right">
                        <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                        <div class="btn-group">
                            <button type="button" class="btn btn-box-tool dropdown-toggle" data-toggle="dropdown"><?=Yii::t('users', 'SET')?></button>
                            <ul class="dropdown-menu" role="menu">
                                  <li><a href="<?= Url::toRoute(['/user/rbac/create', 'type' => Item::TYPE_ROLE])?>" role="button"><?= Yii::t('users', 'CREATE')?></a></li>
                            </ul>
                        </div>
                    </div>
                </div>
    
                <div class="box-body table-responsive no-padding">
                    <?= GridView::widget([
                        'dataProvider' => $rolesSearchModel->search(Yii::$app->request->queryParams),
                        //'filterModel' => $rolesSearchModel,
                        'layout'=>"{items}",
                        'columns' => [
                            [
                                'attribute'=>'name',
                                //'header' => 'Иконка',
                                'format' => 'raw',
                                'content'=>function($data){
                                    return '<b><i class="fa fa-usb"></i> '.$data->name.'</b>';
                                }
                            ],
                            'description',
                                    
                            [
                                'class' => 'yii\grid\ActionColumn',
                                'header'=>'Управление', 
                                'headerOptions' => ['width' => '100'],
                                'template' => '{update} {children} {delete}',
                                'buttons' => [
                                    'update' => function($url, $model, $key) {
                                        $options = [
                                            'title' => Yii::t('yii', 'Update'),
                                            'aria-label' => Yii::t('yii', 'Update'),
                                            'data-pjax' => '0',
                                            'data-toggle' => 'tooltip',
                                            'title' => 'редактировать',                                        
                                        ];
                                        return Html::a('<span class="glyphicon glyphicon-pencil"></span>', $url . '&type=' . $model->type, $options);
                                    },
                                    'children' => function($url, $model, $key) {
                                        $options = [
                                            'title' => Yii::t('users', 'CHILDREN'),
                                            'aria-label' => Yii::t('users', 'CHILDREN'),
                                            'data-pjax' => '0',
                                            'data-toggle' => 'tooltip',
                                            'title' => 'связки',                                         
                                        ];
                                        return Html::a('<span class="glyphicon glyphicon-link"></span>', $url . '&type=' . $model->type, $options);
                                    },
                                    'delete' => function($url, $model, $key) {
                                        $options = [
                                            'title' => Yii::t('yii', 'Delete'),
                                            'aria-label' => Yii::t('yii', 'Delete'),
                                            'data-confirm' => Yii::t('yii', 'Are you sure you want to delete this item?'),
                                            'data-method' => 'post',
                                            'data-pjax' => '0',
                                            'data-toggle' => 'tooltip',
                                            'title' => 'удалить?',
                                        ];
                                        return Html::a('<span class="glyphicon glyphicon-trash"></span>', $url . '&type=' . $model->type, $options);
                                    }
                                ]
                            ],
                        ],
                    ]); ?>
                </div>
                <div class="box-footer">
                    <div class="row">
                        <div class="col-sm-12">
                            <a class="btn btn-success" href="<?= Url::toRoute(['/user/rbac/create', 'type' => Item::TYPE_ROLE])?>" role="button"><?= Yii::t('users', 'CREATE')?></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    
        <div class="col-md-6">
            <div class="box">
                <div class="box-header with-border">
                    <h3 class="box-title"><?= Yii::t('users', 'RULES')?></h3>
    
                    <div class="box-tools pull-right">
                        <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                        <div class="btn-group">
                            <button type="button" class="btn btn-box-tool dropdown-toggle" data-toggle="dropdown"><?=Yii::t('users', 'SET')?></button>
                            <ul class="dropdown-menu" role="menu">
                		        <li><a href="<?= Url::toRoute(['/user/rbac/create'])?>" role="button"><?= Yii::t('users', 'CREATE')?></a></li>                
                            </ul>
                        </div>
                    </div>
                </div>
    
                <div class="box-body table-responsive no-padding">
                    <?= GridView::widget([
                        'dataProvider' => $rulesSearchModel->search(Yii::$app->request->queryParams),
                        //'filterModel' => $rulesSearchModel,
                        'layout'=>"{items}",
                        'columns' => [
                                [
                                    'attribute'=>'name',
                                    //'header' => 'Иконка',
                                    'format' => 'raw',
                                    'content'=>function($data){
                                        return '<b><i class="fa fa-usb"></i> '.$data->name.'</b>';
                                    }
                                ],                             
                                [
                                    'header' => Yii::t('users', 'PHP_CLASS'),
                                    'value' => function($data) {
                                        return unserialize($data->data)->className();
                                    }
                                ],
                                [
                                    'class' => 'yii\grid\ActionColumn',
                                    'headerOptions' => ['width' => '100'],
                                    'header'=>'Управление',
                                    'template' => '{delete}',
                                    'buttons' => [
                                        'delete' => function($url) {
                                            $options = [
                                                'title' => Yii::t('yii', 'Delete'),
                                                'aria-label' => Yii::t('yii', 'Delete'),
                                                'data-confirm' => Yii::t('yii', 'Вы действительно хотите удали выбранный класс?'),
                                                'data-method' => 'post',
                                                'data-pjax' => '0',
                                                'data-toggle' => 'tooltip',
                                                'title' => 'удалить?',
                                            ];
                                            return Html::a('<span class="glyphicon glyphicon-trash"></span>', $url, $options);
                                        }    
                                    ]
                                ],
                            ],
                    ]); ?>
                </div>
                <div class="box-footer">
                    <div class="row">
                        <div class="col-sm-12">
                            <a class="btn btn-success" href="<?= Url::toRoute(['/user/rbac/create'])?>" role="button"><?= Yii::t('users', 'CREATE')?></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
        
    <div class="box">
        <div class="box-header with-border">
            <h3 class="box-title"><?= Yii::t('users', 'PERMISSIONS')?></h3>
            <div class="box-tools pull-right">
    		    <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                <div class="btn-group">
                    <button type="button" class="btn btn-box-tool dropdown-toggle" data-toggle="dropdown"><?=Yii::t('users', 'SET')?></button>
                    <ul class="dropdown-menu" role="menu">
    		            <li><a href="<?= Url::toRoute(['/user/rbac/create', 'type' => Item::TYPE_PERMISSION])?>" role="button"><?= Yii::t('users', 'CREATE')?></a></li>
                    </ul>
                </div>
            </div>
        </div>
        
        
        <div class="box-body table-responsive no-padding">
            <?= GridView::widget([
            	'dataProvider' => $permissionsSearchModel->search(Yii::$app->request->queryParams),
            	//'filterModel' => $permissionsSearchModel,
                'layout'=>"{items}",
            	'columns' => [
                    [
                        'attribute'=>'name',
                        //'header' => 'Иконка',
                        'format' => 'raw',
                        'content'=>function($data){
                            return '<b><i class="fa fa-usb"></i> '.$data->name.'</b>';
                        }
                    ], 
                    'description',     
                [
                    'class' => 'yii\grid\ActionColumn',
                    'template' => '{update} {children} {delete}',
                    'headerOptions' => ['width' => '100'],
                    'header'=>'Управление',
                    'buttons' => [
                            'update' => function($url, $model, $key) {
                                $options = [
                                    'title' => Yii::t('yii', 'Update'),
                                    'aria-label' => Yii::t('yii', 'Update'),
                                    'data-pjax' => '0',
                                    'data-toggle' => 'tooltip',
                                    'title' => 'редактировать',                                            
                                ];
                                return Html::a('<span class="glyphicon glyphicon-pencil"></span>', $url . '&type=' . $model->type, $options);
                            },
                            'delete' => function($url, $model, $key) {
                                $options = [
                                        'title' => Yii::t('yii', 'Delete'),
                                        'aria-label' => Yii::t('yii', 'Delete'),
                                        'data-confirm' => Yii::t('yii', 'Вы действительно хотите удали выбранное разрешение?'),
                                        'data-method' => 'post',
                                        'data-pjax' => '0',
                                        'data-toggle' => 'tooltip',
                                        'title' => 'удалить?',
                                ];
                                return Html::a('<span class="glyphicon glyphicon-trash"></span>', $url . '&type=' . $model->type, $options);
                            },
                            'children' => function($url, $model, $key) {
                                    $options = [
                                        'title' => Yii::t('users', 'CHILDREN'),
                                        'aria-label' => Yii::t('users', 'CHILDREN'),
                                        'data-pjax' => '0',
                                        'data-toggle' => 'tooltip',
                                        'title' => 'связки',                                            
                                    ];
                                    return Html::a('<span class="glyphicon glyphicon-link"></span>', $url . '&type=' . $model->type, $options);
                            }                                
                        ]
                    ],
                ],
            ]); ?>
        </div>
        <div class="box-footer">
            <a class="btn btn-success" href="<?= Url::toRoute(['/user/rbac/create', 'type' => Item::TYPE_PERMISSION])?>" role="button"><?= Yii::t('users', 'CREATE')?></a>
        </div>
    </div>


</div>