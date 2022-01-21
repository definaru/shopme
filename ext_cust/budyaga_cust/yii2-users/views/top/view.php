<?php
    use yii\helpers\Html;
    use yii\widgets\DetailView;
    $this->registerLinkTag(['rel' => 'shortcut icon','type' => 'image/x-icon','href' => '/favicon/favicon.png',]);
    $this->registerCss('
        @media screen and (max-width:767px) {
            th{width:10%;display:none;}
        }
        @media screen and (min-width:768px) and (max-width:991px) {
            th{width:10%;display:table-cell;}   
        }
        @media screen and (min-width:992px) and (max-width:1199px) {
            th{width:15%;display:table-cell;}    
        }
        @media screen and (min-width: 1200px) {
            th{width:20%;display:table-cell;}    
        }        
    ');

    $this->header = 'Просмотр страницы';
    $this->title = $model->header;
    $this->params['breadcrumbs'][] = ['label' => 'Преимущества', 'url' => ['index']];
    $this->params['breadcrumbs'][] = $this->title;
?>
<div class="box box-default">
    <div class="box-header with-border">
        <h3 class="box-title"><i class="fa fa-eye"></i> <?=Html::encode($this->header);?></h3>
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
                [
                    'attribute'=>'icon',
                    'format' => 'raw',
                    //''=>$model->icon,
                    'value'=> '<div style="font-size:40px;" class="red">'.$model->icon.'</div>', 
                ], 					
                'header',
                'text:ntext',
            ],
        ]) ?>         
    </div>
    <div class="box-footer with-border">
        <?= Html::a(Yii::t('users', 'BACK'), 'javascript:history.back(1)', ['class' => 'btn btn-default btn-flat pull-left']) ?>
        <?= Html::a(Yii::t('users', 'CREATE'), ['create'], ['class' => 'btn btn-success btn-flat pull-right']) ?>
    </div> 
</div>