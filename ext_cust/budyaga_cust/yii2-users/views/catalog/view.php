<?php
    use yii\helpers\Html;
    use yii\widgets\DetailView;
    use budyaga_cust\users\models\Scripts;
    $this->header = 'Просмотр каталога';
    $this->title = $model->title;
    $this->params['breadcrumbs'][] = ['label' => 'Каталог', 'url' => ['index']];
    $this->params['breadcrumbs'][] = $this->title;
?>
<div class="box box-default">
    <div class="box-header with-border">
        <h3 class="box-title"><i class="fa fa-eye"></i> Просмотр: <small><?= Html::encode($this->title) ?></small></h3>
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
                'attribute' => 'img',
                'format' => 'raw',
                'value' => ($model->img == '') ? Yii::t('users', 'NOPHOTOFORM') 
                : Html::img($model->img, ['style' => 'width:100%;', 'alt' => 'картинка']),
            ],
            [
                'attribute' => 'pdf',
                'format' => 'raw',
                'value' => ($model->pdf == '') ? Yii::t('users', 'NOPHOTOFORM') 
                : Html::img($model->pdf, ['style' => 'width:100%;', 'alt' => 'картинка']),
            ],
            //'fullimg',
            [
                'attribute' => 'name',
                'format' => 'raw',  
                'value' => ($model->name == '') ? '( Название не указано )' : Html::tag('h3', $model->name, ['class' => 'text-primary no-margin']),
            ],   
            //'nalog',
            // 'manufacture',
            'header',
            [
                'attribute' => 'sort',
                'format' => 'raw',  
                'value' => ($model->sort == '') ? '(Сортировка не указана)' : $model->sort,
            ],
            [
                'attribute' => 'price',
                'format' => 'raw',  
                'value' => ($model->price == '') ? '(Цена не указана)' : Scripts::priceFormat($model->price),
            ],
            [
                'attribute' => 'time',
                'format' => 'raw',  
                'value' => ($model->time == '') ? '(Дата публикации не указана)' : Scripts::getTimeChat($model->time),
            ],
            // 'doza',
            // 'type',
            // 'reception',
            'descs:html',
            //'shelf_life',
            //'map',
            //'baths', 
            //'beds',
            [
                'attribute' => 'link',
                'format' => 'raw',
                'value' => ($model->link == '') ? '(не указано)' : Html::a($model->link, '/object/'.$model->link,['target' => '_blank']),
            ],            
        ],
    ]) ?>
    </div>
    <div class="box-footer with-border">
        <?= Html::a(  Yii::t('users', 'BACK'), 'javascript:history.back(1)',   ['class' => 'btn btn-default btn-flat pull-left'  ]);?>
        <?= Html::a(  Yii::t('yii', 'Update'), ['update', 'id' => $model->id], ['class' => 'btn btn-primary btn-flat pull-right']);?>
        <?= Html::a(Yii::t('users', 'CREATE'), ['create'],                     ['class' => 'btn btn-success btn-flat pull-right' ]);?>
    </div> 
</div>