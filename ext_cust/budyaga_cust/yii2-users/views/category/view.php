<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

    $this->registerCss('
        th {
            width: 17%;
        }            
    ');

$this->title = $model->title;
$this->params['breadcrumbs'][] = ['label' => 'Категории', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="box box-info">
    <div class="box-header with-border">
        <h3 class="box-title"><small>Просмотр категории</small></h3>
        <div class="box-tools pull-right">
            <div class="btn-group">
                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                <button type="button" class="btn btn-box-tool dropdown-toggle" data-toggle="dropdown"><?=Yii::t('users', 'SET');?></button>
                <ul class="dropdown-menu" role="menu">
                    <li><?=Html::a(Yii::t('yii', 'Update'), ['update', 'id' => $model->id]);?></li>
                    <li class="divider"></li>
                    <li><?=Html::a(Yii::t('users', 'CREATE'), ['create']);?></li>
                    <li class="divider"></li>
                    <li><?=Html::a(Yii::t('yii', 'Delete'), ['delete', 'id' => $model->id], ['data' => ['confirm' => 'Вы действительно хотите удалить эту страницу?','method' => 'post',],]);?></li> 
                    <li class="divider"></li>
                    <li><a href="javascript:history.back(1)"><i class="ionicons ion-reply"></i> назад</a></li>
                </ul>
            </div>
        </div>
    </div>
    <div class="box-body">
        <?= DetailView::widget([
            'model' => $model,
            'attributes' => [
                //'id',
                'title',
                [
                    'attribute' => 'img',
                    'format' => 'raw',
                    'value' => ($model->img === '') ? Yii::t('users', 'NOPHOTOFORM') : '<img src="'.$model->img.'" style="width:100%;"/>',
                ],
                [
                    'attribute' => 'header', 
                    'format' => 'raw',
                    'value' => '<h2 class="text-primary" style="margin:0;">'.$model->header.'</h2>',
                ],
                'text:ntext',
                'time:datetime',
                [
                    'attribute' => 'link',
                    'format' => 'raw',
                    'value' => ($model->link === '') ? Yii::t('users', 'NOTADD') : Html::a($model->link, '/site/section/'.$model->link, ['target' => '_blank']),
                ],
            ],
        ]) ?>
    </div>
    <div class="box-footer with-border">
        <?= Html::a(Yii::t('users', 'BACK'), 'javascript:history.back(1)', ['class' => 'btn btn-default btn-flat pull-left']) ?>
        <?= Html::a(Yii::t('users', 'CREATE'), ['create'], ['class' => 'btn btn-success btn-flat pull-right']) ?>
    </div> 
</div>