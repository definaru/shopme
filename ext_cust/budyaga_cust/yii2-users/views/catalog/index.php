<?php
    use yii\helpers\Html;
    use yii\grid\GridView;
    use yii\widgets\Pjax;
    $this->header = 'Каталог';
    $this->title = 'Каталог';
    $this->params['breadcrumbs'][] = $this->title;
?>
<?php Pjax::begin(); ?> 
<div class="box box-widget">
    <div class="box-header with-border">
        <h3 class="box-title"><i class="fa fa-inbox" style="color:#d13a7a;"></i> <?=Html::tag('small', $this->header);?></h3>
        <div class="box-tools pull-right">
            <div class="btn-group">
                <button type="button" class="btn btn-box-tool">
                    <?= GridView::widget([
                        'dataProvider' => $dataProvider,
                        'layout' => '{summary}',
                        'summary' => 'Найдено: {totalCount} | {page} из {pageCount}'
                    ]);?>
                </button>
                <button type="button" class="btn btn-box-tool" data-toggle="collapse" data-target="#searth"><i class="fa fa-search"></i></button>
                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                <button type="button" class="btn btn-box-tool dropdown-toggle" data-toggle="dropdown"><?=Yii::t('users', 'SET')?></button>
                <ul class="dropdown-menu" role="menu">
                    <li><?= Html::a(Yii::t('users', 'CREATE'), ['create'] ) ?></li>
                </ul>
            </div>
        </div>
    </div>
    <div class="box-body no-padding">
        <?=GridView::widget([
                'dataProvider' => $dataProvider,
                'layout' => '{items}<div class="col-lg-4 col-lg-offset-4 center">{pager}</div>',
                'emptyTextOptions' => ['tag' => 'p', 'class' => 'text-center text-danger'],
                'emptyText' => 'По вашему запросу ничего не найдено',                
                //'filterModel' => $searchModel,
                'pager' => [       
                    'maxButtonCount' => 5,
                ], 
                    'columns' => [
                    ['class' => 'yii\grid\SerialColumn', 'headerOptions' => ['width' => '40'],],
                        //'id','title','keywords','description',
                    [
                        'attribute' => 'img',
                        'headerOptions' => ['width' => '40'],
                        'format' => 'raw',
                        'value' => function($data) {
                            return ($data->img == '') ? Yii::t('users', 'NOPHOTO') : '<img src="'.$data->img.'" style="width: 100%;" class="no-padding no-margin thumbnail"/>';
                        }
                    ],                         
                    [
                        'attribute' => 'name',
                        'format' => 'raw',
                        'value' => function($data) {
                            return '<b class="text-primary">'.$data->name.'</b>';
                        }
                    ],                         
                        //'header','manufacture','shelf_life','doza','type','time','reception','alhogole','descs',
                    [
                        'attribute' => 'sort',
                        'format' => 'raw',
                        'value' => function($data) {
                            return '<i class="fa fa-sort-amount-desc"></i> '.$data->sort.' ';
                        }
                    ],                         
                    [
                        'attribute' => 'price',
                        'format' => 'raw',
                        'value' => function($data) {
                            return ($data->price == '') ? Yii::t('users', 'NOTADD') : '<small class="label pull-left bg-green">'.$data->price.' <i class="fa fa-rub"></i></small>';
                        }
                    ],
                    [
                        'attribute' => 'link',
                        'format' => 'raw',
                        'value' => function($data) {
                            return '<i class="fa fa-link"></i> '. Html::a(
                                    'Посмотреть объект', 
                                    '/object/'.$data->link,
                                    ['title' => 'перейти на страницу?','data-toggle' => 'tooltip','target' => '_blank', 'data-pjax' => '0']);
                        }
                    ],
                        // 'fulltext:ntext',
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
            ]);
        ?>
    </div>
    <div class="box-footer">
        <?= Html::a(Yii::t('users', 'CREATE'), ['create'], ['class' => 'btn btn-success btn-flat pull-right']) ?>
        <?= Html::a(Yii::t('users', 'BACK'), 'javascript:history.back(1)', ['class' => 'btn btn-default btn-flat pull-left']) ?>
    </div>	
</div>
<?php Pjax::end(); ?> 