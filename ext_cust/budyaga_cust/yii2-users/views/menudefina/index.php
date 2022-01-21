<?php
    use yii\helpers\Html;
    use yii\grid\GridView;
    use budyaga_cust\users\models\Scripts;
    $this->header = 'Меню Defina';
    $this->title = 'Список меню';
    $this->params['breadcrumbs'][] = $this->header;
?>
<div class="row">
<div class="col-md-12">
  <div class="box">
	<div class="box-header with-border">
	  <h3 class="box-title"><?=$this->header;?></h3>

	  <div class="box-tools pull-right">
		<button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
		<div class="btn-group">
		  <button type="button" class="btn btn-box-tool dropdown-toggle" data-toggle="dropdown"><?=Yii::t('users', 'SET');?></button>
		  <ul class="dropdown-menu" role="menu">
			<li><?= Html::a('Добавить кнопку', ['create']) ?></li>
		  </ul>
		</div>
	  </div>
	</div>
	<div class="box-body no-padding">
	  <div class="row">
		<div class="col-md-12">
<?= GridView::widget([
        'dataProvider' => $dataProvider,
        //'filterModel' => $searchModel,
    'layout'=>"{items}",
        'columns' => [
            //['class' => 'yii\grid\SerialColumn'],

            //'id',
            [
                'attribute'=>'icon',
                'format' => 'raw',
                'content'=>function($data){
                    return '<div style="font-size:30px;" class="red">'.$data->icon.'</div>';
                }
            ],            
            [
                'attribute'=>'href',
                'format' => 'raw',
                'content'=>function($data){
                    return '<a href="'.$data->href.'" target="_blank">'.$data->href.'</a>';
                }
            ],            
            
            'name',
                    
                [
                    'attribute' => 'access',
                    'format' => 'raw',
                    'content'=>function($data){
                        return Scripts::getAccess($data->access).' ';
                    }                    
                ],
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
	  </div>
	</div>
	<div class="box-footer">
            <a href="/defina" class="btn btn-default btn-flat">
                <i class="ionicons ion-android-arrow-back"></i> назад к списку
            </a>
	</div>
  </div>
</div>
</div>