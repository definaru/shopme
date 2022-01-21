<?php

use yii\helpers\Html;
use yii\grid\GridView;
$this->registerCss('
    .summary{
        display:none;
    }    
');
require(__DIR__ . '/../lib/query.php');
$this->registerLinkTag(['rel' => 'shortcut icon','type' => 'image/x-icon','href' => '/favicon/favicon.png',]);
$this->header = 'Иконки <a href="http://ionicons.com/" target="_blank">"Ionicons"</a>';
$this->title = 'Список Иконок';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="row">
<div class="col-md-12">
  <div class="box">
	<div class="box-header with-border">
	  <h3 class="box-title"><?=$this->header;?></h3>
<!--	  <h3 class="box-title"><?//=Html::encode($this->header);?></h3>-->

	  <div class="box-tools pull-right">
		<button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
		<div class="btn-group">
		  <button type="button" class="btn btn-box-tool dropdown-toggle" data-toggle="dropdown"><?=Yii::t('users', 'SET');?></button>
		  <ul class="dropdown-menu" role="menu">
			<li><?= Html::a('<i class="ionicons ion-android-add"></i> Добавить иконку', ['create']) ?></li>
		  </ul>
		</div>
	  </div>
	</div>
	<div class="box-body no-padding">
	  <div class="row">
		<div class="col-md-12">
<?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        //'layout'=>"{items}",
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
            //'id',      
            [
                'attribute'=>'icons',
                'format' => 'raw',
                'content'=>function($data){
                    return '<table style="width: 100%;">'
    . '<tr><td style="width:10%;"><h1>'.$data->icons.'</h1></td>'
                            . '<td style="width:90%;">'
                            . '<input type="text" class="form-control" style="color:blue;" value="'.Html::encode($data->icons).'"><td/></tr>'
                            . '</table>';
                }                    
            ],                    
            //'icons',
            [
                'class' => 'yii\grid\ActionColumn',
                'header'=>'Управление', 
                'headerOptions' => ['width' => '120'],
                'template' => '{update} {delete}',
                //'template' => '{view} {update} {delete} {link}',
                'buttons' => [
//                    'view' => function ($url, $model) {
//                        return Html::a(
//                        '<i class="fa fa-eye actURL"></i>', 
//                        $url);
//                    },                                   
//                    'update' => function ($url,$model) {
//                        return Html::a(
//                        '<i class="fa fa-pencil-square actURL"></i>', 
//                        $url);
//                    },
                    //'delete' => function ($url,$model) {
                    //    return Html::a(
                    //    '<i class="fa fa-trash actURL"></i>', 
                    //   $url);
                    //},
                ],
            ],
        ],
    ]); ?>
		</div>
	  </div>
	</div>
	<div class="box-footer">
            <?=Html::a('<i class="ionicons ion-android-arrow-back"></i> назад к списку', '/defina', ['class' => 'btn btn-default btn-flat']);?>
	</div>
  </div>
</div>
</div>