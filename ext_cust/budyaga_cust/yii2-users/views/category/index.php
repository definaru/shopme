<?php
    use yii\helpers\Html;
    use yii\grid\GridView;
    use yii\widgets\Pjax;
    $this->header = 'Список категорий';
    $this->title = 'Категории';
    $this->params['breadcrumbs'][] = $this->title;
?>
<?php Pjax::begin(); ?> 
<div class="box box-widget">
    <div class="box-header with-border">
        <h3 class="box-title"><i class="ionicons ion-android-archive" style="color:#d13a7a;"></i> <?=Html::tag('small', $this->header);?></h3>
        <div class="box-tools pull-right">
            <div class="btn-group">
                <button type="button" class="btn btn-box-tool">
                    <?= GridView::widget([
                        'dataProvider' => $dataProvider,
                        'layout' => '{summary}',
                        'summary' => 'Найдено: {count} | {page} из {pageCount}'
                    ]);?>
                </button>
                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                <button type="button" class="btn btn-box-tool dropdown-toggle" data-toggle="dropdown">
                    <?=Yii::t('users', 'SET')?>
                </button>
                <ul class="dropdown-menu" role="menu">
                    <li><?= Html::a(Yii::t('users', 'CREATE'), ['create']);?></li>
                </ul>
            </div>            
        </div>
    </div>
    <div class="box-body no-padding">
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'layout' => '{items}<div class="col-md-4 col-md-offset-4 center">{pager}</div>',
        'emptyTextOptions' => ['tag' => 'p', 'class' => 'text-center text-danger'],
        'emptyText' => 'По вашему запросу ничего не найдено',                
        //'filterModel' => $searchModel,
        'pager' => [       
            'maxButtonCount' => 5,
        ],  
        //'summary' => Yii::t('users', '<p class="text-center">Показано {count} из {totalCount}</p>'),
        //'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn', 'headerOptions' => ['width' => '40'],],
            //'id',
            //'title',
//            [
//                'attribute' =>'img',
//                'header' => 'Картинка',
//                'format' => 'raw',
//                'headerOptions' => ['width' => '40'],
//                'content' => function($data){ return
//                    ($data->img === '') ?  Yii::t('users', 'NOPHOTO') : '<img src="'.$data->img.'" class="thumbnail" style="width:100%;"/>';
//                }
//            ],  
            [
                'attribute' =>'header',
                'header' => 'Название категории',
                'format' => 'raw',
                'headerOptions' => ['width' => '90%'],
                'content' => function($data){ return '<b class="text-primary">'.$data->header.'</b>';
                }
            ], 
            //'text:ntext',
            // 'time:datetime',
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
                            'data-confirm' => 'Вы уверены что хотите удалить данную категорию?',
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
        <?= Html::a(Yii::t('users', 'CREATE'), ['create'], ['class' => 'btn btn-success btn-flat pull-right']) ?>
        <?= Html::a(Yii::t('users', 'BACK'), 'javascript:history.back(1)', ['class' => 'btn btn-default btn-flat pull-left']) ?>
    </div>	
</div>
<?php Pjax::end(); ?>