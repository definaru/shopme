<?php
    use yii\helpers\Html;
    use yii\grid\GridView;
    use yii\widgets\Pjax;
    $this->header = 'Список услуг';
    $this->title = Yii::t('yii', 'Services');
    $this->params['breadcrumbs'][] = $this->title;
?>
<?php Pjax::begin(); ?>
<div class="box box-widget">
    <div class="box-header with-border">
        <h3 class="box-title"><span style="color:#d13a7a;"><i class="ionicons ion-ios-copy"></i></span> <?=$this->header;?></h3>
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
        <?=$this->render('_search', ['model' => $searchModel]); ?>
            <?= GridView::widget([
                'dataProvider' => $dataProvider,
                //'filterModel' => $searchModel,
                'layout' => '{items}<div class="col-lg-4 col-lg-offset-4 center">{pager}</div>',
                'emptyTextOptions' => ['tag' => 'p', 'class' => 'text-center text-danger'],
                'emptyText' => 'По вашему запросу ничего не найдено', 
                'pager' => [       
                    'maxButtonCount' => 5,
                ], 
                'columns' => [
                    ['class' => 'yii\grid\SerialColumn', 'headerOptions' => ['width' => '40'],],

                    //'id',
                    //'title',
                    //'keywords',
                    //'description:ntext',
                    [
                        'attribute' => 'background',
                        'header' => 'Картинка',
                        'format' => 'raw',
                        'headerOptions' => ['width' => '50'],
                        'content' => function($data){ return
                            ($data->background == '') ?  Yii::t('users', 'NOPHOTO') : Html::img(str_replace('.', '-small.', $data->background),['class' => 'no-margin no-padding thumbnail', 'style' => 'width:100%']);
                        }
                    ],
                    [
                        'attribute'=>'header',
                        'format' => 'raw',
                        'value' => function($data){
                            return Html::a($data->header, ['view', 'id' => $data->id], ['data-toggle' => 'tooltip', 'title' => 'посмотреть', 'target' => '_blank']);
                        }
                    ],
                    //'text:ntext',
                    //'fulltexts:ntext',
                    'land',
                    //'link',
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
                                    'data-confirm' => Yii::t('yii', 'Вы уверены что хотите удалить эту страницу?'),
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
    <div class="box-footer with-border">
        <?= Html::a(Yii::t('users', 'BACK'), 'javascript:history.back(1)', ['class' => 'btn btn-default btn-flat pull-left']) ?>
        <?= Html::a(Yii::t('users', 'CREATE'), ['create'], ['class' => 'btn btn-success btn-flat pull-right']) ?>
    </div> 
</div>
<?php Pjax::end(); ?> 