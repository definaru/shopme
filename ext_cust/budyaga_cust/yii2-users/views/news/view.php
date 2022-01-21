<?php
    use yii\helpers\Html;
    use yii\widgets\DetailView;
    use budyaga_cust\users\models\Scripts;
    
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
    $this->header = 'Просмотр записи';
    $this->title = $model->title;
    $this->params['breadcrumbs'][] = ['label' => 'Новости', 'url' => ['index']];
    $this->params['breadcrumbs'][] = $this->title;
?>
<div class="box box-default">
    <div class="box-header with-border">
        <h3 class="box-title"><?=Html::encode($this->header);?></h3>
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
                'attribute' => 'new_post',
                'format' => 'raw',
                'label' => 'Тип записи',
                'value' => ($model->new_post == 1) ? '<span class="label label-danger">новинка</span>' : '<small class="text-muted">Обычная запись</small>',
            ], 
            [
                'attribute' => 'images',
                'format' => 'raw',
                'value' => ($model->images == '') ? Yii::t('users', 'NOPHOTOFORM') : '<img src="'.str_replace('.', '-medium.', $model->images).'" />',
            ],            
            [
                'attribute' => 'img',
                'format' => 'raw',
                'value' => ($model->img == '') ? '( нет глифа )' : '<h1 class="text-warning no-margin">'.$model->img.'</h1>',
            ], 
            [
                'attribute' => 'title',
                'format' => 'raw',
                'value' => ($model->title == '') ? Yii::t('users', 'NOTADD') : '<h2 class="text-primary no-margin">'.$model->title.'</h2>',
            ],   
            'intro_text:ntext', 
            [
                'attribute' => 'full_text',
                'format' => 'raw',
                'value' => ($model->full_text == '') ? '' : $model->full_text,
            ],    
            [
                'attribute' => 'video',
                'format' => 'raw',
                'value' => ($model->video == '') ? '<small class="text-muted">(Нет видеоролика)</small>' : $model->video,
            ],    
            'img_mini',
            [
                'attribute' => 'link',
                'format' => 'raw',
                'value' => ($model->link == '') ? Yii::t('users', 'NOTADD') : Html::a($model->link, '/new/'.$model->link, ['target' => '_blank']),
            ],
            [
                'attribute' => 'time',
                'format' => 'raw',
                'value' => Scripts::getTimeName($model->time),
            ],
        ],
    ]) ?>
    </div>
    <div class="box-footer with-border">
        <?= Html::a(Yii::t('users', 'BACK'), 'javascript:history.back(1)', ['class' => 'btn btn-default btn-flat pull-left']) ?>
        <?= Html::a(Yii::t('users', 'CREATE'), ['create'], ['class' => 'btn btn-success btn-flat pull-right']) ?>
    </div> 
</div>