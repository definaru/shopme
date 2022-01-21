<?php
    use yii\helpers\Html;
    use yii\grid\GridView;
    use yii\widgets\Pjax;
    use budyaga_cust\users\models\Scripts;
    use budyaga_cust\users\models\forms\ContactForm;
    use budyaga_cust\users\models\Mail;
    
    $this->header = 'Список сообщений';
    $this->title = 'Сообщения';
    $this->params['breadcrumbs'][] = $this->title;
?>
<?php Pjax::begin(); ?> 
<div class="box box-widget">
	<div class="box-header with-border">
            <h3 class="box-title"><span style="color:#d13a7a;"><i class="ionicons ion-email header-slim"></i></span> <?=Html::tag('small', $this->header);?></h3>
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
	<div class="box-body table-responsive no-padding">
            <?=$this->render('_search', ['model' => $searchModel]); ?>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'layout' => '{items}',
        //'filterModel' => $searchModel,
        'columns' => [
            [
                'class' => 'yii\grid\CheckboxColumn',
                'checkboxOptions' => function ($model, $key, $index, $column) {
                    return ['value' => $model->id];
                }
            ],            
            //'id',
            [
                'attribute' => 'name',
                'format' => 'raw',
                'content' => function($data) {return Html::a($data->name,['view', 'id' => $data->id], ['class' => 'btn btn-block', 'style' => 'text-align:left;']);}
            ],
            [
                'attribute' => 'email',
                'format' => 'raw',
                'content' => function($data){return '<u class="text-primary">'.Yii::$app->formatter->asEmail($data->email).'</u>
                                            &#160;&#160; '.Scripts::getTimeChat($data->date).Mail::getUrlAction($data->pub, $data->id);
                }
            ],
            [
                'attribute' => 'ip',
                'format' => 'raw',
                'content' => function($data){
                    return Html::a($data->ip, 'http://ru.smart-ip.net/geoip/'.$data->ip.'/auto', ['target' => '_blank']);
                }
            ],
                    [
                        'class' => 'yii\grid\ActionColumn',
                        'header' => Yii::t('users', 'SETTING'),
                        'headerOptions' => ['width' => '80'],
                        'template' => '{view} {delete}',
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
                                    'class' => 'text-danger',
                                    'aria-label' => Yii::t('yii', 'Delete'),
                                    'data-confirm' => Yii::t('yii', 'Вы уверены что хотите удалить это сообщение ?'),
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
            
        <div style="padding: 15px;">
            <div class="alert alert-info text-center">
                <strong><i class="fa fa-info-circle"></i> Information</strong> 
                У вас привязана почта, <a href="https://web.beget.email/" target="_blank" class="alert-link">support@shopme.su</a>.
            </div>                   
        </div>       
    </div>
    
    <div class="box-footer with-border">
        <div class="row">
            <div class="col-md-3">
                <?= Html::a(Yii::t('users', 'BACK'), 'javascript:history.back(1)', ['class' => 'btn btn-default btn-block btn-flat']) ?>
            </div>
            <div class="col-md-6">
                <?= GridView::widget([
                    'dataProvider' => $dataProvider,
                    'layout' => '<div class="col-md-12 text-center">{pager}</div>',
                    'showHeader' => false,
                    'pager' => [
                        'maxButtonCount' => 5, // максимум 5 кнопок
                        'options' => ['class' => 'pagination no-margin'], // прикручиваем свой id чтобы создать собственный дизайн не касаясь основного.
                        //'nextPageLabel' => '<i class="ionicons ion-arrow-right-c"></i>', // стрелочка в право
                        //'prevPageLabel' => '<i class="ionicons ion-arrow-left-c"></i>', // стрелочка влево
                    ], 
                ]); ?>
            </div>
            <div class="col-md-3">
                <botton class="btn btn-primary btn-block btn-flat"><i class="ionicons ion-android-arrow-forward"></i> написать письмо</botton>
            </div>
        </div>
        
        
    </div> 
</div>
<?php Pjax::end(); ?> 
<script>var keys = $('#my-grid').yiiGridView('getSelectedRows');</script>