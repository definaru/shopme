<?php
    use yii\helpers\Html;
    use yii\widgets\DetailView;
    use budyaga_cust\users\models\Scripts;
    $this->registerCss('  
        @media screen and (max-width:767px) {
            th{width:10%;display:none;}
            .thumbnail{width:100%;}
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
    $this->header = 'Просмотр записи';
    $this->title = $model->title;
    $this->params['breadcrumbs'][] = ['label' => Yii::t('yii', 'Blogs'), 'url' => ['index']];
    $this->params['breadcrumbs'][] = $this->title;
?>
<div class="box box-widget">
    <div class="box-header with-border">
        <h3 class="box-title"><i class="ionicons ion-images" style="color:#d13a7a;"></i> <small><?=Html::encode($this->header);?></small></h3>
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
    <div class="box-body no-padding">

            <?= DetailView::widget([
                'model' => $model,
                'attributes' => [
                    //'id',
            [
                'attribute' => 'title',
                'attribute' => 'keywords',
                'attribute' => 'description',
                'label' => 'SEO',
                'format' => 'raw',
                'value' => '<div class="box box-widget collapsed-box">
<div class="box-header with-border">
        <h3 class="box-title text-muted"><small>SEO-оптимизация <sup class="text-warning">new</sup></small></h3>
        <div class="box-tools pull-right">
            <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-plus"></i></button>		
        </div>
    </div>
    <div class="box-body">
        <dl class="dl-horizontal text-muted">
            <dt>title:</dt><dd>'.$model->title.'</dd>
            <dt>keywords:</dt><dd>'.$model->keywords.'</dd>
            <dt>description:</dt><dd>'.$model->description.'</dd>
        </dl>
    </div>
</div> ',
            ],
                    [
                        'attribute' => 'show_photo',
                        'format' => 'raw',
                        'value' => ($model->show_photo === '') ? Yii::t('users', 'NOPHOTOFORM') : '<img src="'.$model->show_photo.'" style="width:100%;"/>',
                    ],            
//                    [
//                        'attribute' => 'show_icon',
//                        'format' => 'raw',
//                        'value' => ($model->show_icon === '') ? Yii::t('users', 'NOPHOTOFORM') : '<img src="'.$model->show_icon.'" style="width:50%;"/>',
//                    ],                     
                    [
                        'attribute' => 'show_header',
                        'format' => 'raw',
                        'value' => ($model->show_header === '') ? Yii::t('users', 'NOTADD') : '<h2 class="text-primary" style="margin:0;">'.$model->show_header.'</h2>',
                    ],
                    'show_text:ntext',
                    'show_texter:html', 
                    'show_icon',
                    [
                        'attribute' => 'show_news',
                        'format' => 'raw', 
                        'value' => Html::a($model->show_news, '/user/slider', ['class' => 'btn btn-md btn-default btn-flat']),
                    ],
                    [
                        'attribute' => 'show_time',
                        'format' => 'raw',
                        'value' => Scripts::getTimeName($model->show_time),
                    ],
                    [
                        'attribute' => 'link',
                        'format' => 'raw',
                        'label' => 'Гиперссылка',
                        'value' => ($model->link === '') ? Yii::t('users', 'NOTADD') : Html::a($model->link, '/blog/'.$model->link, ['target' => '_blank']),
                    ],
                ],
            ]) ?>  
    </div>
    <div class="box-footer with-border">
        <?= Html::a(Yii::t('users', 'BACK'), 'javascript:history.back(1)', ['class' => 'btn btn-default btn-flat pull-left']) ?>
        <?= Html::a(Yii::t('users', 'CREATE'), ['create'], ['class' => 'btn btn-success btn-flat pull-right']) ?>
    </div> 
</div>