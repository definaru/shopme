<?php
    use yii\helpers\Html;
    use yii\grid\GridView;
    use yii\widgets\Pjax;
    $this->header = 'Весь Список ';
    $this->title = Yii::t('yii', 'Folliws');
    $this->params['breadcrumbs'][] = $this->title;
?>
<?php Pjax::begin(); ?> 
<?php // echo $this->render('_search', ['model' => $searchModel]); ?>
    <div class="box box-widget">
	<div class="box-header with-border">
            <h3 class="box-title"><small><?= Html::encode($this->header);?></small></h3>
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
                    <button type="button" class="btn btn-box-tool dropdown-toggle" data-toggle="dropdown"><?=Yii::t('users', 'SET')?></button>
                    <ul class="dropdown-menu" role="menu">
                        <li><?= Html::a(Yii::t('yii', 'Create'), ['create'] ) ?></li>
                    </ul>
                </div>
            </div>
	</div>
	<div class="box-body table-responsive no-padding">
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        //'filterModel' => $searchModel,
        'emptyTextOptions' => ['class' => 'text-center text-danger'],
        'emptyText' => 'К сожалению ничего не найдено',        
        'layout' => '{items} <div class="col-md-4 col-md-offset-4 text-center">{pager}</div>',
        'pager' => [
            'maxButtonCount' => 5,
        ],        
        'columns' => [
            ['class' => 'yii\grid\SerialColumn', 'headerOptions' => ['width' => '40'],],

            //'id',
            [
                'attribute' => 'icon',
                'format' => 'raw',
                'headerOptions' => ['width' => '40'],
                'content' => function($data){return Html::a($data->icon, ['update', 'id' => $data->id], ['class' => 'btn bg-navy btn-block']);}
            ],            
            [
                'attribute' => 'link',
                'format' => 'raw',
                'content' => function($data){return Html::a('<u>'.$data->link.'</u>', $data->link,['target' => '_blank']);}
            ],            
            //'target',
            [
                'class' => 'yii\grid\ActionColumn',
                'header' => Yii::t('users', 'SETTING'),
                'headerOptions' => ['width' => '80'],
                'template' => '{update} {delete}',
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
<?php Pjax::end(); ?>
