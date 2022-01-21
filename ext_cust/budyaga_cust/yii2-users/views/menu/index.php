<?php
    use yii\helpers\Html;
    use yii\grid\GridView;
    use yii\widgets\ListView;
    use budyaga_cust\users\models\Menu;
    $this->header = 'Пункты меню';
    $this->title = 'Верхнее меню';
    $this->registerJsFile('assets/theme/js/jquery-3.2.1.min.js',  ['position' => yii\web\View::POS_HEAD]);
    $this->registerJsFile('assets/theme/js/jquery-ui.min.js',  ['position' => yii\web\View::POS_HEAD]);
    $this->params['breadcrumbs'][] = $this->title;
    $cookies = Yii::$app->request->cookies;
?>
<div id="message"></div>
<div class="row">
<?=$cookies['sidebar-collapse'];?>
<div class="col-xm-12 col-lg-12">
    <div class="box box-widget">
        <div class="box-header with-border">
            <h3 class="box-title"><?=Html::encode($this->header);?></h3>
            <div class="box-tools pull-right">
                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                <div class="btn-group">
                  <button type="button" class="btn btn-box-tool dropdown-toggle" data-toggle="dropdown"><?=Yii::t('users', 'SET')?></button>
                  <ul class="dropdown-menu" role="menu">
                    <li><?= Html::a(Yii::t('users', 'CREATE'), ['create']) ?></li>
<!--                <li><a href="#">Another action</a></li>
                    <li><a href="#">Something else here</a></li>
                    <li class="divider"></li>
                    <li><a href="#">Separated link</a></li>-->
                  </ul>
                </div>
            </div>
        </div>
        <div class="box-body no-padding">
<?php /*             
<ul class="todo-list ui-sortable">     
    <li>
        <span class="handle ui-sortable-handle">
            <i class="fa fa-ellipsis-v"></i>
            <i class="fa fa-ellipsis-v"></i>
        </span>
        <span class="text">Make the theme responsive</span>
        <div class="tools">
            <i class="fa fa-edit"></i>
            <i class="fa fa-trash-o"></i>
        </div>
    </li>
                
    <li>
        <span class="handle ui-sortable-handle">
            <i class="fa fa-ellipsis-v"></i>
            <i class="fa fa-ellipsis-v"></i>
        </span>
        <span class="text">Let theme shine like a star</span>
        <div class="tools">
            <i class="fa fa-edit"></i>
            <i class="fa fa-trash-o"></i>
        </div>
    </li>
</ul>
      
    <table class="table table-condensed">
        <tr id="edit_menu">
        <?php foreach ($dataProvider as $model) { ?>
            <td class="menu_item" id="<?=$model->id;?>">
                <div class="frr"><u><?=$model->name;?></u></div>
            </td>
        <?php } ?>
        </tr>
    </table>            
*/ ?>              
            
            

            <?= GridView::widget([
                'dataProvider' => $dataProvider,
                //'filterModel' => $searchModel,
                'layout'=>"{items}",
                'columns' => [
                    [
                        'class' => 'yii\grid\SerialColumn', 
                        'headerOptions' => ['width' => '40'],
                    ],
                    //'id',
                    [
                        'attribute' => 'name',
                        'format' => 'raw',
                        
                        'value' => function($data) {
                            return '<i class="fa fa-link"></i> <a href="'.$data->href.'" target="_blank">'.$data->name.'</a>';
                        }
                    ],
                    [
                        'attribute' => 'sort',
                        'format' => 'raw',
                        'value' => function($data) {
                            return '<i class="fa fa-sort-amount-desc"></i> '.$data->sort.' ';
                        }
                    ],   
                [
                    'class' => 'yii\grid\ActionColumn',
                    'header' => Yii::t('users', 'SETTING'),
                    'headerOptions' => ['width' => '80'],
                    //'template' => '{view} {update} {delete}',
                    'template' => '{update} {delete}',
                    'buttons' => [
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
            <?=Html::a(Yii::t('users', 'BACK'), 'javascript:history.back(1)', ['class' => 'btn btn-default btn-flat pull-left'])?>
            <?= Html::a(Yii::t('users', 'CREATE'), ['create'], ['class' => 'btn btn-sm btn-primary btn-flat pull-right']) ?>
        </div>        
    </div>
</div>
<?php // echo $this->render('_search', ['model' => $searchModel]); ?>
</div>
