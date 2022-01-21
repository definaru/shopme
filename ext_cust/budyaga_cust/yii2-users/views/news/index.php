<?php
    use yii\helpers\Html;
    use yii\grid\GridView;
    $this->registerLinkTag(['rel' => 'shortcut icon','type' => 'image/x-icon','href' => '/favicon/favicon.png',]);
    $this->header = 'Список новостей';
    $this->title = 'Новости';
    $this->params['breadcrumbs'][] = $this->header;
?>

<div class="box">
	<div class="box-header with-border">
            <h3 class="box-title"><?= Html::encode($this->header) ?></h3>
            <div class="box-tools pull-right">
                <div class="btn-group">
                    <button type="button" class="btn btn-box-tool dropdown-toggle" data-toggle="dropdown"><?=Yii::t('users', 'SET')?></button>
                    <ul class="dropdown-menu" role="menu">
                        <li><?= Html::a(Yii::t('users', 'CREATE'), ['create'] ) ?></li>
                    </ul>
                </div>
            </div>
	</div>
	<div class="box-body table-responsive no-padding">
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'summary' => '',
        //'filterModel' => $searchModel,
        'columns' => [
            
            ['class' => 'yii\grid\SerialColumn', 'headerOptions' => ['width' => '40'],],
            //'id',
            //'new_post',
            //'img',
            [
                'attribute' =>'images',
                'header' => 'Картинка',
                'format' => 'raw',
                'headerOptions' => ['width' => '50'],
                'content' => function($data){ return
                    ($data->images == '') ?  Yii::t('users', 'NOPHOTO') : '<img src="'.str_replace('.', '-small.', $data->images).'" class="thumbnail no-padding no-margin" style="width:100%;"/>';
                }
            ],
            [
                'attribute' =>'title',
                'attribute' =>'link',
                'attribute' =>'new_post',
                'header' => 'Заголовок',
                'content' => function($data){ 
                    return Html::a(($data->new_post == 0) ? $new = $data->title : $new = $data->title.' <sup class="text-danger">new</sup>', ['view', 'id' => $data->id], ['data-toggle' => 'tooltip','title' => 'посмотреть']);
                }                
            ],        

            // 'intro_text:ntext',
            // 'full_text:ntext',
            // 'video:ntext',
            //'time',
                    [
                        'class' => 'yii\grid\ActionColumn',
                        'header' => Yii::t('users', 'SETTING'),
                        'headerOptions' => ['width' => '80'],
                        'template' => '{view} {update} {delete}',
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
                            'delete' => function($url, $model, $key) {
                                if (!Yii::$app->user->can('userDelete', ['user' => $model])) {
                                        return '';
                                }
                                $options = [
                                    'title' => Yii::t('yii', 'Delete'),
                                    'aria-label' => Yii::t('yii', 'Delete'),
                                    'data-confirm' => Yii::t('yii', 'Вы уверены что хотите удалить данного пользователя?'),
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
    <div class="box-footer clearfix">
        <?=Html::a(Yii::t('users', 'BACK'), 'javascript:history.back(1)', ['class' => 'btn btn-default btn-flat pull-left'])?> 
        <?=Html::a(Yii::t('users', 'CREATE'), ['create'], ['class' => 'btn btn-success btn-flat pull-right']) ?>
    </div>  
</div>




